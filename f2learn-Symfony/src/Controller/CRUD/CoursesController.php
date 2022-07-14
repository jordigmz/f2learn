<?php

namespace App\Controller\CRUD;

use App\BLL\CoursesBLL;
use App\Entity\Assessments;
use App\Entity\Courses;
use App\Entity\Languages;
use App\Entity\Levels;
use App\Entity\Users;
use App\Form\CoursesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/courses")
 */
class CoursesController extends AbstractController
{
    /**
     * @Route("/add-course", name="add-course", methods={"GET", "POST"})
     * @Route("/add-course/order/{order}", name="add-course-order", methods={"GET", "POST"})
     */
    public function addCourse(Request $request, CoursesBLL $coursesBLL, EntityManagerInterface $entityManager, string $order=null): Response
    {
        $levels = $entityManager->getRepository(Levels::class)->findAll();
        $languages = $entityManager->getRepository(Languages::class)->findAll();
        $assessments = $entityManager->getRepository(Assessments::class)->findAll();
        $instructor = $entityManager->getRepository(Users::class)->findAll();

        $levelSelected = 1;
        $languageSelected = 1;
        $assessmentSelected = 1;

        $course = new Courses();
        $form = $this->createForm(CoursesType::class, $course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form['image']->getData();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('courses_directory'),
                $fileName
            );

            $course->setImage($fileName);

            $instructor = $this->getUser();
            $course->setInstructor($instructor);

            $entityManager->persist($course);
            $entityManager->flush();

            return $this->redirectToRoute('add-course', [], Response::HTTP_SEE_OTHER);
        }

        $courses = $coursesBLL->getCoursesOrdered($order);

        return $this->renderForm('views/courses/add-course.html.twig', [
            'controller_name' => 'CoursesController',
            'courses' => $courses,
            'levels' => $levels,
            'languages' => $languages,
            'assessments' => $assessments,
            'levelSelected' => $levelSelected,
            'languageSelected' => $languageSelected,
            'assessmentSelected' => $assessmentSelected,
            'instructor' => $instructor,
            'course' => $course,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="courses_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Courses $course, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CoursesType::class, $course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form['image']->getData();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('courses_directory'),
                $fileName
            );

            $course->setImage($fileName);

            $entityManager->flush();

            return $this->redirectToRoute('add-course', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('views/courses/edit-course.html.twig', [
            'course' => $course,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="courses_delete", methods={"POST"})
     */
    public function delete(Request $request, Courses $course, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$course->getId(), $request->request->get('_token'))) {
            $entityManager->remove($course);
            $entityManager->flush();
        }

        return $this->redirectToRoute('add-course', [], Response::HTTP_SEE_OTHER);
    }
}
