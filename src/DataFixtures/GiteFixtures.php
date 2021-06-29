<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Gite;
use App\Entity\Services;
use App\Entity\Equipement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GiteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');
        $services = [];

        $se = new Services();
        $se->setName('menage');

        $se1 = new Services();
        $se1->setName('Petit Dejeuner');

        $se2 = new Services();
        $se2->setName('Repas');



        array_push($services, $se, $se1, $se2);

        $manager->persist($se);
        $manager->persist($se1);
        $manager->persist($se2);

        $manager->flush();

        $equipements = [];

        $eq = new Equipement();
        $eq->setName('Piscine');

        $eq1 = new Equipement();
        $eq1->setName('Sauna');

        $eq2 = new Equipement();
        $eq2->setName('Jardin');

        $eq3 = new Equipement();
        $eq3->setName('Machine a laver');

        $eq4 = new Equipement();
        $eq4->setName('Lave vaisselles');

        array_push($equipements, $eq, $eq1, $eq2, $eq3, $eq4);

        $manager->persist($eq);
        $manager->persist($eq1);
        $manager->persist($eq2);
        $manager->persist($eq3);
        $manager->persist($eq4);
        $manager->flush();

        for ($i = 0; $i < 40; $i++) {

            $gite = new Gite();

            $gite
                ->setname($faker->name())
                ->setDescription($faker->text(100))
                ->setSurface($faker->numberBetween(20, 100))
                ->setBedroom($faker->numberBetween(1, 5))
                ->setAnimals($faker->boolean())
                ->setAddress($faker->address())
                ->setCity($faker->city())
                ->addEquipement($faker->randomElement($equipements, 3))
                ->addService($faker->randomElement($services, 3))
                ->setPostalCode($faker->randomNumber(5, true))
                ->setImageFile('cafer.jpg')
                ->setUpdatedAt($faker->dateTimeThisYear())
                ->setCreatedAt($faker->dateTimeThisYear());
            $manager->persist($gite);

            $manager->flush();
        }
        // $product = new Product();

    }
}
