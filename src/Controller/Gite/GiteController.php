<?php


namespace App\Controller\Gite;

use App\Entity\Gite;
use App\Repository\GiteRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class GiteController extends AbstractController
{
    private GiteRepository $repo;

    public function __construct(GiteRepository $repo)
    {
        $this->repo = $repo;
    }


    /** 
     * @Route("/gites",name="gite_index")
     * 
     * 
     */

    public function index()
    {
        $gite = $this->repo->findAll();

        return $this->render('gite/index.html.twig', ['gites' => $gite]);
    }


    /**
     * @Route("/gite/{id}", name="gite_show")
     * 
     */
    public function show(Gite $gite)
    {


        return $this->render('gite/show.html.twig', ["gite" => $gite]);
    }
}
