<?php

namespace App\Controller\Admin;

use App\Entity\Gite;
use App\Form\GiteType;

use App\Repository\GiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{


    private GiteRepository $giteRipository;
    private EntityManagerInterface $em;

    public function __construct(GiteRepository $gitRepository, EntityManagerInterface $em)
    {
        $this->giteRepository = $gitRepository;
        $this->em = $em;
    }

    /**
     * @Route ("/admin", name="admin_index")
     * 
     * 
     */
    public function index()
    {
        $gites = $this->giteRepository->findAll();
        return $this->render("admin/index.html.twig", ["gites" => $gites]);
    }


    /**
     * @Route("/admin/new", name="admin_new")
     */
    public function new(Request $request)
    {

        $gite = new Gite();
        $form =  $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($gite);
            $this->em->flush();
            $this->addFlash('success', "Le Gite a bien été enregistrer");
            return $this->redirectToRoute('admin_index');
        }
        return $this->render("admin/new.html.twig", [
            "formGite" => $form->createView()
        ]);
    }
}
