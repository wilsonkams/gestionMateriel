<?php

namespace App\Controller;

use App\Entity\Equipement;
use App\Form\EquipementType;
use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class GMatController extends AbstractController
{
    /**
     * @Route("/gestionmat/list", name="index")
     */
    public function index(): Response
    {
        $equipement = $this->getDoctrine()->getRepository(Equipement::class)->findAll();
        return $this->render('g_mat/index.html.twig', [
            'controller_name' => 'GMatController',
            'equipement' => $equipement
        ]);
    }

    /**
     * @Route("/gestionmat/ajouter_un_equipement", name="ajouterEquipement")
     */
    public function ajouterEquipement(Request $request)
    {
        $equipement = new Equipement();
        $form = $this->createForm(EquipementType::class, $equipement);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $equipement->setCreatedAt(new \DateTime());
            $equipement->setUpdatedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager(); // On r&#xE9;cup&#xE8;re l'entity manager
            $em->persist($equipement); // On confie notre entit&#xE9; &#xE0; l'entity manager (on persist l'entit&#xE9;)
            $em->flush(); // On execute la requete

            return new Response('L\'équipement a bien &#xE9;t&#xE9; enregistré.');
        }
        return $this->render('g_mat/ajouter.html.twig', [
            'controller_name' => 'GMatController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/gestionmat/ajouter_une_categorie", name="ajouterCategorie")
     */
    public function ajouterCategorie(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           // $category->setCreatedAt(new \DateTime());
           // $category->setUpdatedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager(); // On r&#xE9;cup&#xE8;re l'entity manager
            $em->persist($category); // On confie notre entit&#xE9; &#xE0; l'entity manager (on persist l'entit&#xE9;)
            $em->flush(); // On execute la requete

            return new Response('La catégorie a bien &#xE9;t&#xE9; enregistrée.');
        }
        return $this->render('g_mat/ajouterCategorie.html.twig', [
            'controller_name' => 'GMatController',
            'form' => $form->createView()
        ]);
    }
}
