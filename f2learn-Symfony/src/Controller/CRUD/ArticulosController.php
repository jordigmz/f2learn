<?php

namespace App\Controller\CRUD;

use App\Entity\Articulos;
use App\Form\ArticulosType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/articles")
 */
class ArticulosController extends AbstractController
{
    /**
     * @Route("/", name="articles", methods={"GET", "POST"})
     */
    public function articles(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->getUser()->getRoles()[0] === 'ROLE_ADMIN') {
            $articles = $entityManager->getRepository(Articulos::class)->findAll();
        } else {
            $articles = $entityManager->getRepository(Articulos::class)->findBy(['usuario' => $this->getUser()]);
        }

        $article = new Articulos();
        $form = $this->createForm(ArticulosType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form['imagen']->getData();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('articulos_directory'),
                $fileName
            );

            $article->setImagen($fileName);

            $usuario = $this->getUser();
            $article->setUsuario($usuario);

            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('articles', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('views/articles/articles.html.twig', [
            'controller_name' => 'ArticulosController',
            'articulos' => $articles,
            'article' => $article,
            'form' => $form
        ]);
    }

    /**
     * @Route("/{id}", name="article", methods={"GET"})
     */
    public function article(Articulos $article): Response
    {
        return $this->render('views/articles/article.html.twig', [
            'controller_name' => 'ArticulosController',
            'articulo' => $article
        ]);
    }

    /**
     * @Route("/{id}/edit", name="articles_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Articulos $articulo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ArticulosType::class, $articulo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form['imagen']->getData();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('articulos_directory'),
                $fileName
            );

            $articulo->setImagen($fileName);

            $entityManager->flush();

            return $this->redirectToRoute('articles', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('views/articles/article-edit.html.twig', [
            'articulo' => $articulo,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="articles_delete", methods={"POST"})
     */
    public function delete(Request $request, Articulos $articulo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$articulo->getId(), $request->request->get('_token'))) {
            $entityManager->remove($articulo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('articles', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/{id}", name="articles_delete_json", methods={"DELETE"})
     */
    public function deleteJson(Articulos $articulo, EntityManagerInterface $entityManager): Response
    {
        if($articulo->getUsuario()->getUsername() === $this->getUser()->getUserIdentifier()) {
            $entityManager->remove($articulo);
            $entityManager->flush();

            return new JsonResponse(['deleted' => true]);
        } else {
            return new JsonResponse(['deleted' => false]);
        }
    }
}
