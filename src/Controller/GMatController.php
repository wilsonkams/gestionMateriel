<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GMatController extends AbstractController
{
    /**
     * @Route("/gestionmat/list", name="index")
     */
    public function index(): Response
    {
        return $this->render('g_mat/index.html.twig', [
            'controller_name' => 'GMatController',
        ]);
    }

    /**
     * @Route("/gestionmat/ajouter_un_equipement", name="ajouter")
     */
    public function ajouter()
    {
        return $this->render('g_mat/ajouter.html.twig', [
            'controller_name' => 'GMatController',
        ]);
    }
}
