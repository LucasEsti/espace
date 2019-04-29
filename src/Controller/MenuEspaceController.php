<?php

namespace App\Controller;

use App\Entity\MenuEspace;
use App\Form\MenuEspaceType;
use App\Repository\MenuEspaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/menu/espace")
 */
class MenuEspaceController extends AbstractController
{
    /**
     * @Route("/", name="menu_espace_index", methods={"GET"})
     */
    public function index(MenuEspaceRepository $menuEspaceRepository): Response
    {
        return $this->render('menu_espace/index.html.twig', [
            'menu_espaces' => $menuEspaceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="menu_espace_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $menuEspace = new MenuEspace();
        $form = $this->createForm(MenuEspaceType::class, $menuEspace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($menuEspace);
            $entityManager->flush();

            return $this->redirectToRoute('menu_espace_index');
        }

        return $this->render('menu_espace/new.html.twig', [
            'menu_espace' => $menuEspace,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="menu_espace_show", methods={"GET"})
     */
    public function show(MenuEspace $menuEspace): Response
    {
        return $this->render('menu_espace/show.html.twig', [
            'menu_espace' => $menuEspace,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="menu_espace_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MenuEspace $menuEspace): Response
    {
        $form = $this->createForm(MenuEspaceType::class, $menuEspace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('menu_espace_index', [
                'id' => $menuEspace->getId(),
            ]);
        }

        return $this->render('menu_espace/edit.html.twig', [
            'menu_espace' => $menuEspace,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="menu_espace_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MenuEspace $menuEspace): Response
    {
        if ($this->isCsrfTokenValid('delete'.$menuEspace->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($menuEspace);
            $entityManager->flush();
        }

        return $this->redirectToRoute('menu_espace_index');
    }
}
