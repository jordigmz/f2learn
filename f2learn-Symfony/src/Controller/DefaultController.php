<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Entity\Categories;
use App\Entity\Courses;
use App\Entity\Images;
use App\Entity\Inscriptions;
use App\Entity\Users;
use App\Form\PasswordsType;
use App\Form\UploadImagesType;
use App\Form\UsersType;
use App\Repository\CoursesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(CoursesRepository $coursesRepository): Response
    {
        $courses = $coursesRepository->findAll();
        $blog = $this->getDoctrine()->getRepository(Blog::class)->findAll();

        shuffle($courses);
        shuffle($blog);

        return $this->render('views/index.html.twig', [
            'controller_name' => 'DefaultController',
            'courses' => $courses,
            'blog' => $blog
        ]);
    }


    /**
     * @Route("/our-courses", name="our-courses", methods={"GET"})
     * @Route("/our-courses/search", name="our-courses-search", methods={"POST"})
     */
    public function ourCourses(Request $request, CoursesRepository $coursesRepository): Response
    {
        if ($request->isMethod('POST')) {
            $search = $request->request->get('search');
            $courses = $coursesRepository->findLikeTitle($search);
        } else {
            $courses = $coursesRepository->findAll();
        }

        return $this->render('views/courses/our-courses.html.twig', [
            'controller_name' => 'DefaultController',
            'courses' => $courses
        ]);
    }

    /**
     * @Route("/course-details/{id}", name="course-details", methods={"GET"})
     */
    public function courseDetails(Courses $course): Response
    {
        return $this->render('views/courses/course-details.html.twig', [
            'controller_name' => 'DefaultController',
            'course' => $course
        ]);
    }

    /**
     * @Route("/course-details/{id}/enroll", name="enroll", methods={"GET"})
     */
    public function enroll(Courses $course, Request $request, EntityManagerInterface $entityManager, CoursesRepository $coursesRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $courses = [];

        $user = $this->getUser();

        if($user->getRoles()[0] !== 'ROLE_ADMIN') {
            $inscription = new Inscriptions($user, $course);

            $entityManager->persist($inscription);
            $entityManager->flush();

            $inscripciones = $entityManager->getRepository(Inscriptions::class)->findBy(['student' => $user->getId()]);

            foreach ($inscripciones as $inscription) {
                array_push($courses, $coursesRepository->find($inscription->getCourse()));
            }
        } else {
            $courses = $coursesRepository->findAll();
        }

        $courses = array_unique($courses, SORT_REGULAR);

        $formUser = $this->createForm(UsersType::class, $user);
        $formUser->handleRequest($request);

        $formImage = $this->createForm(UploadImagesType::class, $user);
        $formImage->handleRequest($request);

        $formPassword = $this->createForm(PasswordsType::class, $user);
        $formPassword->handleRequest($request);

        if($user->getRoles()[0] !== 'ROLE_ADMIN') {
            if ($formUser->isSubmitted() && $formUser->isValid()) {
                $entityManager->flush();
            }

            if ($formImage->isSubmitted() && $formImage->isValid()) {
                /** @var UploadedFile $file */
                $file = $formImage['image']->getData();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('profile_directory'),
                    $fileName
                );

                $user->setImage($fileName);

                $entityManager->flush();
            }

            if ($formPassword->isSubmitted() && $formPassword->isValid()) {
                $entityManager->flush();
            }
        }

        return $this->renderForm('views/users/profile.html.twig', [
            'user' => $user,
            'formUser' => $formUser,
            'formImage' => $formImage,
            'formPassword' => $formPassword,
            'courses' => $courses
        ]);
    }


    /**
     * @Route("/portfolio", name="portfolio", methods={"GET"})
     */
    public function portfolio(EntityManagerInterface $entityManager): Response
    {
        $images = $entityManager->getRepository(Images::class)->findAll();
        $categories = $entityManager->getRepository(Categories::class)->findAll();

        return $this->render('views/images/portfolio.html.twig', [
            'controller_name' => 'DefaultController',
            'images' => $images,
            'categories' => $categories
        ]);
    }


    /**
     * @Route("/blog", name="blog")
     */
    public function blog(EntityManagerInterface $entityManager): Response
    {
        $blog = $entityManager->getRepository(Blog::class)->findAll();

        return $this->render('views/blog/blog.html.twig', [
            'controller_name' => 'DefaultController',
            'blog' => $blog
        ]);
    }

    /**
     * @Route("/blog-details/{id}", name="blog-details")
     */
    public function blogDetails(Blog $post): Response
    {
        return $this->render('views/blog/blog-details.html.twig', [
            'controller_name' => 'DefaultController',
            'post' => $post
        ]);
    }


    /**
     * @Route("/profile/{id}", name="profile", methods={"GET", "POST"})
     */
    public function profile(Request $request, EntityManagerInterface $entityManager, Users $user, CoursesRepository $coursesRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $courses = [];

        if($user->getRoles()[0] !== 'ROLE_ADMIN') {
            $inscripciones = $entityManager->getRepository(Inscriptions::class)->findBy(['student' => $user->getId()]);

            if ($inscripciones !== []) {
                foreach ($inscripciones as $inscription) {
                    array_push($courses, $coursesRepository->find($inscription->getCourse()));
                }
            }
        } else {
            $courses = $coursesRepository->findBy(['instructor' => $user]);
        }

        $formUser = $this->createForm(UsersType::class, $user);
        $formUser->handleRequest($request);

        $formImage = $this->createForm(UploadImagesType::class, $user);
        $formImage->handleRequest($request);

        $formPassword = $this->createForm(PasswordsType::class, $user);
        $formPassword->handleRequest($request);

        if(str_contains($user->getRoles()[0], 'ADMIN') ) {
            if ($formUser->isSubmitted() && $formUser->isValid()) {
                $entityManager->flush();
            }

            if ($formImage->isSubmitted() && $formImage->isValid()) {
                /** @var UploadedFile $file */
                $file = $formImage['image']->getData();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('profile_directory'),
                    $fileName
                );

                $user->setImage($fileName);

                $entityManager->flush();
            }

            if ($formPassword->isSubmitted() && $formPassword->isValid()) {
                $entityManager->flush();
            }
        }

        return $this->renderForm('views/users/profile.html.twig', [
            'user' => $user,
            'formUser' => $formUser,
            'formImage' => $formImage,
            'formPassword' => $formPassword,
            'courses' => $courses
        ]);
    }

    /**
     * @Route("/about", name="about-us")
     */
    public function about(): Response
    {
        return $this->render('views/about-us.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/faqs", name="faqs")
     */
    public function faqs(): Response
    {
        return $this->render('views/faqs.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/membership", name="membership")
     */
    public function membership(): Response
    {
        return $this->render('views/membership.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/error", name="error")
     */
    public function error(): Response
    {
        return $this->render('bundles/TwigBundle/Exception/error404.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}