<?php

namespace App\DataFixtures;

use App\Entity\Specialite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpecialiteFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $specialite = new Specialite();
         $specialite->setName('géneraliste');
         $this->addReference("specialite", $specialite);
         $manager->persist($specialite);

         $manager->flush();
    }
}
