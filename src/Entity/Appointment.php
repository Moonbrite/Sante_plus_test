<?php

namespace App\Entity;

use App\Repository\AppointmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
class Appointment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $day_of_appointment = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?Medecin $medecin = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?User $user = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $note = null;

    #[ORM\Column]
    private ?bool $isCancel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDayOfAppointment(): ?\DateTimeInterface
    {
        return $this->day_of_appointment;
    }

    public function setDayOfAppointment(\DateTimeInterface $day_of_appointment): static
    {
        $this->day_of_appointment = $day_of_appointment;

        return $this;
    }

    public function getMedecin(): ?Medecin
    {
        return $this->medecin;
    }

    public function setMedecin(?Medecin $medecin): static
    {
        $this->medecin = $medecin;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function isCancel(): ?bool
    {
        return $this->isCancel;
    }

    public function setCancel(bool $isCancel): static
    {
        $this->isCancel = $isCancel;

        return $this;
    }

}
