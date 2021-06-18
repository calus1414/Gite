<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{

    private $encoder;
    function __construct(UserPasswordHasherInterface $encoder)
    {

        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user
            ->setAge(23)
            ->setUsername('admin')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->encoder->hashPassword($user, "admin"));

        $user2 = new User();
        $user2
            ->setAge(23)
            ->setUsername('user')
            ->setRoles(['ROLE_USER'])
            ->setPassword($this->encoder->hashPassword($user, "user"));

        $manager->persist($user);
        $manager->persist($user2);
        $manager->flush();
    }
}
