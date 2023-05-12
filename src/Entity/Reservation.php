<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $id_reservation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_heure_reservation = null;

    #[ORM\Column(length: 255)]
    private ?string $salle_reserver = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToOne(inversedBy: 'reservation', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Salle $salles = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdReservation(): ?string
    {
        return $this->id_reservation;
    }

    public function setIdReservation(string $id_reservation): self
    {
        $this->id_reservation = $id_reservation;

        return $this;
    }

    public function getDateHeureReservation(): ?\DateTimeInterface
    {
        return $this->date_heure_reservation;
    }

    public function setDateHeureReservation(\DateTimeInterface $date_heure_reservation): self
    {
        $this->date_heure_reservation = $date_heure_reservation;

        return $this;
    }

    public function getSalleReserver(): ?string
    {
        return $this->salle_reserver;
    }

    public function setSalleReserver(string $salle_reserver): self
    {
        $this->salle_reserver = $salle_reserver;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSalles(): ?Salle
    {
        return $this->salles;
    }

    public function setSalles(Salle $salles): self
    {
        $this->salles = $salles;

        return $this;
    }
}
