<?php

namespace App\Controller\CRUD;

use App\Entity\Categories;
use App\Entity\Images;
use App\Form\ImagesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gallery")
 */
class ImagesController extends AbstractController
{
    /**
     * @Route("/", name="gallery", methods={"GET", "POST"})
     */
    public function gallery(Request $request, EntityManagerInterface $entityManager): Response
    {
        $images = $entityManager->getRepository(Images::class)->findAll();
        $categories = $entityManager->getRepository(Categories::class)->findAll();
        $categorySelected = 1;

        $image = new Images();
        $form = $this->createForm(ImagesType::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form['name']->getData();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('portfolio_directory'),
                $fileName
            );

            $image->setName($fileName);

            $entityManager->persist($image);
            $entityManager->flush();

            return $this->redirectToRoute('gallery', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('views/images/gallery.html.twig', [
            'controller_name' => 'ImagesController',
            'images' => $images,
            'categories' => $categories,
            'categorySelected' => $categorySelected,
            'image' => $image,
            'form' => $form
        ]);
    }

    /**
     * @Route("/{id}", name="show-image", methods={"GET"})
     */
    public function showImage(Images $image): Response
    {
        return $this->render('views/images/show-gallery-image.html.twig', [
            'controller_name' => 'ImagesController',
            'image' => $image
        ]);
    }

    /**
     * @Route("/{id}/edit", name="gallery_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Images $image, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ImagesType::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('gallery', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('views/images/gallery-edit.html.twig', [
            'image' => $image,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="gallery_delete", methods={"POST"})
     */
    public function delete(Request $request, Images $image, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$image->getId(), $request->request->get('_token'))) {
            $entityManager->remove($image);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gallery', [], Response::HTTP_SEE_OTHER);
    }
}
