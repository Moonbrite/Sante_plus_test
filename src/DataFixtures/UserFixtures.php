<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }


    public function load(ObjectManager $manager): void
    {
         $userPatient = new User();
         $userPatient->setUsername('patient');
         $userPatient->setPassword($this->hasher->hashPassword($userPatient, 'test'));
         $userPatient->setRoles(['ROLE_PATIENT']);
         $userPatient->setName('Jack');
         $userPatient->setFirstName('first');
         $this->addReference("patient", $userPatient);

        $userMedecin = new User();
        $userMedecin->setUsername('medecin');
        $userMedecin->setPassword($this->hasher->hashPassword($userMedecin, 'test'));
        $userMedecin->setRoles(['ROLE_MEDECIN']);
        $userMedecin->setName('Dupont');
        $userMedecin->setFirstName('first');
        $this->addReference("medecin", $userMedecin);

        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setPassword($this->hasher->hashPassword($userAdmin, 'test'));
        $userAdmin->setRoles(['ROLE_ADMIN']);
        $userAdmin->setName('Jose');
        $userAdmin->setFirstName('first');

        $manager->persist($userAdmin);
        $manager->persist($userMedecin);
        $manager->persist($userPatient);

        $manager->flush();
    }
}
