<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $id_salle = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $capacité = null;

    #[ORM\OneToOne(mappedBy: 'salles', cascade: ['persist', 'remove'])]
    private ?Reservation $reservation = null;

    #[ORM\ManyToMany(targetEntity: Ergonomie::class, inversedBy: 'salles')]
    private Collection $ergonomie;

    #[ORM\ManyToMany(targetEntity: Logiciels::class, inversedBy: 'salles')]
    private Collection $logiciels;

    #[ORM\ManyToMany(targetEntity: Materiels::class, inversedBy: 'salles')]
    private Collection $materiels;

    public function __construct()
    {
        $this->ergonomie = new ArrayCollection();
        $this->logiciels = new ArrayCollection();
        $this->materiels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSalle(): ?string
    {
        return $this->id_salle;
    }

    public function setIdSalle(string $id_salle): self
    {
        $this->id_salle = $id_salle;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCapacité(): ?int
    {
        return $this->capacité;
    }

    public function setCapacité(int $capacité): self
    {
        $this->capacité = $capacité;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(Reservation $reservation): self
    {
        // set the owning side of the relation if necessary
        if ($reservation->getSalles() !== $this) {
            $reservation->setSalles($this);
        }

        $this->reservation = $reservation;

        return $this;
    }

    /**
     * @return Collection<int, Ergonomie>
     */
    public function getErgonomie(): Collection
    {
        return $this->ergonomie;
    }

    public function addErgonomie(Ergonomie $ergonomie): self
    {
        if (!$this->ergonomie->contains($ergonomie)) {
            $this->ergonomie->add($ergonomie);
        }

        return $this;
    }

    public function removeErgonomie(Ergonomie $ergonomie): self
    {
        $this->ergonomie->removeElement($ergonomie);

        return $this;
    }

    /**
     * @return Collection<int, Logiciels>
     */
    public function getLogiciels(): Collection
    {
        return $this->logiciels;
    }

    public function addLogiciel(Logiciels $logiciel): self
    {
        if (!$this->logiciels->contains($logiciel)) {
            $this->logiciels->add($logiciel);
        }

        return $this;
    }

    public function removeLogiciel(Logiciels $logiciel): self
    {
        $this->logiciels->removeElement($logiciel);

        return $this;
    }

    /**
     * @return Collection<int, Materiels>
     */
    public function getMateriels(): Collection
    {
        return $this->materiels;
    }

    public function addMateriel(Materiels $materiel): self
    {
        if (!$this->materiels->contains($materiel)) {
            $this->materiels->add($materiel);
        }

        return $this;
    }

    public function removeMateriel(Materiels $materiel): self
    {
        $this->materiels->removeElement($materiel);

        return $this;
    }
}
