<?php

namespace App\Controller\Admin;

use App\Entity\Gite;
use App\Form\GiteType;
use App\Form\UpdateGiteType;
use Doctrine\DBAL\Schema\View;
use App\Repository\GiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{


    private GiteRepository $giteRepository;
    private EntityManagerInterface $em;
    private PaginatorInterface $paginator;
    public function __construct(GiteRepository $giteRepository, EntityManagerInterface $em, PaginatorInterface $paginator)
    {
        $this->giteRepository = $giteRepository;
        $this->em = $em;
        $this->paginator = $paginator;
    }

    /**
     * @Route ("/admin", name="admin_index")
     * 
     * 
     */
    public function index(Request $request): Response
    {


        $gites = $this->giteRepository->findAll();
        $gites = $this->paginator->paginate(
            $gites,
            $request->query->getInt("page", 1),
            20

        );

        return $this->render("admin/index.html.twig", ["gites" => $gites]);
    }


    /**
     * @Route("/admin/new", name="admin_new")
     */
    public function new(Request $request): Response
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

    /**
     * @Route("/admin/{id}", name="admin_change")
     * 
     */
    public function change(Gite $gite, Request $request): Response
    {
        $form = $this->createForm(GiteType::class, $gite);

        $form->handleRequest($request);
        // dd($gite);

        if ($form->isSubmitted() && $form->isValid()) {


            $this->em->flush();
            $this->addFlash('success', "Le Gite a bien été modifer");
            return $this->redirectToRoute('admin_index');
        }
        return $this->render("admin/change.html.twig", [
            "gite" => $gite,
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/d/{id}", name="admin_delete")
     * 
     */

    public function delete(Gite $gite): RedirectResponse
    {
        // $gite = $this->giteRipository->find($id);

        // dd($gite);
        $this->em->remove($gite);
        $this->em->flush();
        $this->addFlash('success', "Le Gite a bien été suprimer");
        return $this->redirectToRoute("admin_index");
    }
}
