<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TesteController extends AbstractController
{
    /**
     * @Route("/teste", name="teste")
     */
    public function index()
    {
        return $this->render('teste/index.html.twig', [
            'controller_name' => 'TesteController',
        ]);
    }
}
