<?php


namespace App\Controller\Service;

use App\Entity\Services;
use App\Form\ServiceType;
use App\Repository\ServicesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServiceController extends AbstractController
{

    private EntityManagerInterface $em;
    private ServicesRepository $serviceRepo;

    public function __construct(EntityManagerInterface $em, ServicesRepository $serviceRepo)
    {
        $this->em = $em;
        $this->serviceRepo = $serviceRepo;
    }
    /**
     * @Route("/service", name="new_service")
     * 
     */
    public function new(Request $request)
    {
        $allService = $this->serviceRepo->findAll();
        $services = new Services();

        $form = $this->createForm(ServiceType::class, $services);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($services);
            $this->em->flush();
            $this->addFlash('success', 'le service a bien été créer');
            return $this->redirectToRoute('new_service');
        }
        return $this->render('service/newService.html.twig', [
            'services' => $allService,
            'form' => $form->createView()

        ]);
    }
    /**
     * @Route("/service/{id}", name="change_service")
     * 
     */
    public function change(Request $request, Services $service)
    {
        $allService = $this->serviceRepo->findAll();


        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->em->persist($service);
            $this->em->flush();
            $this->addFlash('success', 'le service a bien été modifier');
            return $this->redirectToRoute('new_service');
        }
        return $this->render('service/changeService.html.twig', [
            'services' => $allService,
            'form' => $form->createView()

        ]);
    }
    /**
     * @Route("/service/d/{id}", name="delete_service")
     * 
     */
    public function delete(Request $request, Services $service)
    {
        $this->em->remove($service);
        $this->em->flush();
        $this->addFlash('success', " le Servcie a bien été suprimer");
        return $this->redirectToRoute('new_service');
    }
}
