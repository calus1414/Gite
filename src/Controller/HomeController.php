<?php



namespace App\Controller;

use App\Entity\Gite;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{


    public function index()
    {
        // $gite = new Gite();
        // $gite
        //     ->setName('Mon deuxieme Gite')
        //     ->setDescription('Mon supêr Gite avec vue sur le fleuve')
        //     ->setSurface(20)
        //     ->setBedroom(1)
        //     ->setAddress('86 rue du pont')
        //     ->setCity('bordeaux')
        //     ->setPostalCode('12000');

        // $em = $this->getDoctrine()->getManager();
        // $em->persist($gite);
        // $em->flush();
        // dd($gite);
        return $this->render('home/index.html.twig');
    }
}
