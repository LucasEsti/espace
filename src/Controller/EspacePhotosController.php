<?php

namespace App\Controller;

use App\Entity\EspacePhotos;
use App\Form\EspacePhotosType;
use App\Repository\EspacePhotosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/espace/photos")
 */
class EspacePhotosController extends AbstractController
{
    /**
     * @Route("/", name="espace_photos_index", methods={"GET"})
     */
    public function index(EspacePhotosRepository $espacePhotosRepository): Response
    {
        return $this->render('espace_photos/index.html.twig', [
            'espace_photos' => $espacePhotosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="espace_photos_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $espacePhoto = new EspacePhotos();
        $form = $this->createForm(EspacePhotosType::class, $espacePhoto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($espacePhoto);
            $entityManager->flush();

            return $this->redirectToRoute('espace_photos_index');
        }

        return $this->render('espace_photos/new.html.twig', [
            'espace_photo' => $espacePhoto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="espace_photos_show", methods={"GET"})
     */
    public function show(EspacePhotos $espacePhoto): Response
    {
        return $this->render('espace_photos/show.html.twig', [
            'espace_photo' => $espacePhoto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="espace_photos_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EspacePhotos $espacePhoto): Response
    {
        $form = $this->createForm(EspacePhotosType::class, $espacePhoto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('espace_photos_index', [
                'id' => $espacePhoto->getId(),
            ]);
        }

        return $this->render('espace_photos/edit.html.twig', [
            'espace_photo' => $espacePhoto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="espace_photos_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EspacePhotos $espacePhoto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$espacePhoto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($espacePhoto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('espace_photos_index');
    }
}
