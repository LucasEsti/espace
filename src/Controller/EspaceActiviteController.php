<?php

namespace App\Controller;

use App\Entity\EspaceActivite;
use App\Form\EspaceActiviteType;
use App\Repository\EspaceActiviteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/espace/activite")
 */
class EspaceActiviteController extends AbstractController
{
    /**
     * @Route("/", name="espace_activite_index", methods={"GET"})
     */
    public function index(EspaceActiviteRepository $espaceActiviteRepository): Response
    {
        return $this->render('espace_activite/index.html.twig', [
            'espace_activites' => $espaceActiviteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="espace_activite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $espaceActivite = new EspaceActivite();
        $form = $this->createForm(EspaceActiviteType::class, $espaceActivite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($espaceActivite);
            $entityManager->flush();

            return $this->redirectToRoute('espace_activite_index');
        }

        return $this->render('espace_activite/new.html.twig', [
            'espace_activite' => $espaceActivite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="espace_activite_show", methods={"GET"})
     */
    public function show(EspaceActivite $espaceActivite): Response
    {
        return $this->render('espace_activite/show.html.twig', [
            'espace_activite' => $espaceActivite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="espace_activite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EspaceActivite $espaceActivite): Response
    {
        $form = $this->createForm(EspaceActiviteType::class, $espaceActivite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('espace_activite_index', [
                'id' => $espaceActivite->getId(),
            ]);
        }

        return $this->render('espace_activite/edit.html.twig', [
            'espace_activite' => $espaceActivite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="espace_activite_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EspaceActivite $espaceActivite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$espaceActivite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($espaceActivite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('espace_activite_index');
    }
}
