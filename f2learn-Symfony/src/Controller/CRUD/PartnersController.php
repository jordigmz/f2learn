<?php

namespace App\Controller\CRUD;

use App\Entity\Partners;
use App\Form\PartnersType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/partners")
 */
class PartnersController extends AbstractController
{
    /**
     * @Route("/", name="partners", methods={"GET", "POST"})
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $partners = $entityManager->getRepository(Partners::class)->findAll();

        $partner = new Partners();
        $form = $this->createForm(PartnersType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form['logo']->getData();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('partners_directory'),
                $fileName
            );

            $partner->setLogo($fileName);

            $entityManager->persist($partner);
            $entityManager->flush();

            return $this->redirectToRoute('partners', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('views/partners/partners.html.twig', [
            'controller_name' => 'PartnersController',
            'partners' => $partners,
            'partner' => $partner,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="partners_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Partners $partner, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PartnersType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form['logo']->getData();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('partners_directory'),
                $fileName
            );

            $partner->setLogo($fileName);

            $entityManager->flush();

            return $this->redirectToRoute('partners', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('views/partners/partners-edit.html.twig', [
            'partner' => $partner,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="partners_delete", methods={"POST"})
     */
    public function delete(Request $request, Partners $partner, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$partner->getId(), $request->request->get('_token'))) {
            $entityManager->remove($partner);
            $entityManager->flush();
        }

        return $this->redirectToRoute('partners', [], Response::HTTP_SEE_OTHER);
    }
}
