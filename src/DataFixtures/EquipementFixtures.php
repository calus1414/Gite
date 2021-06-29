<?php

namespace App\DataFixtures;

use App\Entity\Equipement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EquipementFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {


        $manager->flush();
    }
}
