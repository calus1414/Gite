<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Form\NewUserType;


use Doctrine\ORM\EntityManager;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class UserController extends AbstractController
{

    private UserPasswordHasherInterface $encoder;
    private EntityManagerInterface $em;
    private UserRepository $repo;

    public function __construct(UserRepository $repo, UserPasswordHasherInterface $encoder, EntityManagerInterface $em)
    {
        $this->encoder = $encoder;
        $this->repo = $repo;
        $this->em = $em;
    }
    /**
     * @Route("user/new" , name="user_new")
     * 
     */
    public function new(Request $request): Response
    {

        $form = $this->createform(NewUserType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $password2 = $request->request->get("password2");
            $data = $form->getData();
            $name = $data->getUserName();
            $password = $data->getPassword();


            $checkUserName = $this->repo->findoneBy(['username' => $name]);

            if ($checkUserName !== null) {
                $this->addFlash('danger', 'Ce pseudo est deja utiliser');
            } else {
                if ($password !== $password2) {
                    $this->addFlash('danger', 'le Mot de Passe a mal était répété');
                } else {
                    $user = new User();
                    $passwordHash = $this->encoder->hashPassword($user, $password);
                    $user->setUsername($name);
                    $user->setPassword($passwordHash);
                    $user->setRoles(['ROLE_USER']);
                    $this->addFlash('success', "l'utilisateur a bien était enregistré");
                    $this->em->persist($user);
                    $this->em->flush();
                    return $this->redirectToRoute("app_login");
                }
            }
        }
        // dd($request);
        return $this->render('user/new.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
