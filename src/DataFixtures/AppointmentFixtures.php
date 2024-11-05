<?php

namespace App\DataFixtures;

use App\Entity\Appointment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use function Symfony\Component\Clock\now;

class AppointmentFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @throws \DateMalformedStringException
     */
    public function load(ObjectManager $manager): void
    {
         $appointment = new Appointment();
         $appointment->setMedecin($this->getReference('medecinCreate'));
         $appointment->setCancel(false);
         $appointment->setUser($this->getReference('patient'));
         $appointment->setDayOfAppointment(new \DateTime(now()->format('d-m-Y')));
         $manager->persist($appointment);

        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            MedecinFixture::class,
        ];
    }
}
