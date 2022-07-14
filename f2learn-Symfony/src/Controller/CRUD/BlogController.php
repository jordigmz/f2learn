<?php

namespace App\Controller\CRUD;

use App\Entity\Blog;
use App\Form\BlogType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog-posts", methods={"GET", "POST"})
     */
    public function blogPosts(Request $request, EntityManagerInterface $entityManager): Response
    {
        $blog = $entityManager->getRepository(Blog::class)->findAll();

        $post = new Blog();
        $form = $this->createForm(BlogType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form['image']->getData();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('blog_directory'),
                $fileName
            );

            $post->setImage($fileName);

            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('blog-posts', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('views/blog/blog-posts.html.twig', [
            'controller_name' => 'BlogController',
            'blog' => $blog,
            'post' => $post,
            'form' => $form
        ]);
    }

    /**
     * @Route("/{id}/edit", name="blog_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Blog $post, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BlogType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form['image']->getData();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('blog_directory'),
                $fileName
            );

            $post->setImage($fileName);

            $entityManager->flush();

            return $this->redirectToRoute('blog-posts', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('views/blog/blog-posts-edit.html.twig', [
            'post' => $post,
            'form' => $form
        ]);
    }

    /**
     * @Route("/{id}", name="blog_delete", methods={"POST"})
     */
    public function delete(Request $request, Blog $post, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$post->getId(), $request->request->get('_token'))) {
            $entityManager->remove($post);
            $entityManager->flush();
        }

        return $this->redirectToRoute('blog-posts', [], Response::HTTP_SEE_OTHER);
    }
}
