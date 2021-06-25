<?php

namespace App\Controller\Equipement;


use App\Entity\Equipement;
use App\Form\EquipementType;
use App\Repository\EquipementRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EquipementController extends AbstractController
{


    private EquipementRepository $equiRepo;
    private EntityManagerInterface $em;

    public function __construct(EquipementRepository $equiRepo, EntityManagerInterface $em)
    {
        $this->em = $em;

        $this->equiRepo = $equiRepo;
    }



    /**
     * 
     * @Route("/equipement", name="new_equipement")
     * 
     */

    public function new(Request $request)
    {
        $equipement = $this->equiRepo->findAll();
        $equipeForm = new Equipement();
        $form = $this->createForm(EquipementType::class, $equipeForm);
        // // dd($equipement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->em->persist($equipeForm);
            $this->em->flush();
            $this->addFlash('success', "l'equipement a bien été enregistrer");
            return $this->redirectToRoute('new_equipement');
        }

        return $this->render("equipement/newEquipement.html.twig", [
            'equipements' => $equipement,
            'form' => $form->createView()
        ]);
    }

    /**
     * 
     * @Route("/equipement/change/{id}", name="change_equipement")
     * 
     */

    public function change(Request $request,   Equipement $equipement)
    {


        $form = $this->createForm(EquipementType::class, $equipement);
        // // dd($equipement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->em->persist($equipement);
            $this->em->flush();
            $this->addFlash('success', "l'equipement a bien été enregistrer");
            return $this->redirectToRoute('new_equipement');
        }
        return $this->render("equipement/newEquipement.html.twig", [


            'form' => $form->createView()
        ]);
    }
    /**
     * 
     * @Route("/equipement/d/{id}", name="delete_equipement")
     * 
     */
    public function delete(Equipement $equipement)
    {

        $this->em->remove($equipement);
        $this->em->flush();
        $this->addFlash('success', "l'equipement a bien été suprimer");
        return $this->redirectToRoute('new_equipement');
    }
}
