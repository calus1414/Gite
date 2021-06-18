<?php


namespace App\Controller\Gite;

use App\Entity\Gite;
use App\Form\GiteType;
use App\Form\SearchGiteType;
use App\Repository\GiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class GiteController extends AbstractController
{
    private GiteRepository $repo;
    private PaginatorInterface $paginator;
    private EntityManagerInterface $em;
    public function __construct(GiteRepository $repo, PaginatorInterface $paginator, EntityManagerInterface $em)
    {
        $this->repo = $repo;
        $this->em  = $em;
        $this->paginator = $paginator;
    }


    /** 
     * @Route("/",name="index")
     * 
     * 
     */

    public function index()
    {


        $gite = $this->repo->find9LastGite();

        return $this->render('home/index.html.twig', [
            'gites' => $gite
        ]);
    }


    /** 
     * @Route("/gites",name="gite_index")
     * 
     * 
     */

    public function gites(Request $request)
    {
        $exemple = new Gite();
        $form = $this->createForm(SearchGiteType::class, $exemple);
        if ($form->isSubmitted() && $form->isValid()) {
            $gite = $this->repo->findBy(
                wze
            );
        } else {
            $gite = $this->repo->findAll();
        }
        $gite = $this->paginator->paginate(
            $gite,
            $request->query->getInt("page", 1),
            18

        );



        return $this->render('gite/index.html.twig', [
            "gites" => $gite,
            "form" => $form->createView()
        ]);
    }


    /**
     * @Route("/gite/{id}", name="gite_show")
     * 
     */
    public function show(Gite $gite)
    {
        // dd($gite);

        return $this->render('gite/show.html.twig', ["gite" => $gite]);
    }
}
