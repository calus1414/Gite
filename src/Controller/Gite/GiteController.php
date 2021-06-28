<?php


namespace App\Controller\Gite;

use App\Entity\Gite;
use App\Form\GiteType;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use App\Repository\GiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Notification\ContactNotification;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

    public function index(): Response
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

    public function gites(Request $request): Response
    {

        $search = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class, $search);


        $form->handleRequest($request);

        $gite = $this->repo->findForNavBar($search);

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
    public function show(Gite $gite, Request $request, ContactNotification $notification): Response
    {


        $contact = new Contact();
        $contact->setGite($gite);
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notify($contact);
            $this->addFlash('success', "votre email a bien était envoyé");

            return $this->redirectToRoute(
                'gite_show',
                ["id" => $gite->getId()]
            );
        }
        // dd($gite);

        return $this->render('gite/show.html.twig', [
            "gite" => $gite,
            'form' => $form->createView()
        ]);
    }
}
