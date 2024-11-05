<?php

namespace App\DataFixtures;

use App\Entity\Medecin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MedecinFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
         $medecin = new Medecin();
         $medecin->setMedecin($this->getReference("medecin"));
         $medecin->setSpecialite($this->getReference("specialite"));
         $this->addReference("medecinCreate", $medecin);
         $manager->persist($medecin);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            SpecialiteFixture::class,
        ];
    }
}
