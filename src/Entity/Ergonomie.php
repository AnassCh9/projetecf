<?php

namespace App\Entity;

use App\Repository\ErgonomieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ErgonomieRepository::class)]
class Ergonomie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_ergo = null;

    #[ORM\Column]
    private ?bool $PMR = null;

    #[ORM\Column]
    private ?bool $lumierjour = null;

    #[ORM\Column(length: 255)]
    private ?string $lumierearti = null;

    #[ORM\ManyToMany(targetEntity: Salle::class, mappedBy: 'ergonomie')]
    private Collection $salles;

    public function __construct()
    {
        $this->salles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdErgo(): ?int
    {
        return $this->id_ergo;
    }

    public function setIdErgo(int $id_ergo): self
    {
        $this->id_ergo = $id_ergo;

        return $this;
    }

    public function isPMR(): ?bool
    {
        return $this->PMR;
    }

    public function setPMR(bool $PMR): self
    {
        $this->PMR = $PMR;

        return $this;
    }

    public function isLumierjour(): ?bool
    {
        return $this->lumierjour;
    }

    public function setLumierjour(bool $lumierjour): self
    {
        $this->lumierjour = $lumierjour;

        return $this;
    }

    public function getLumierearti(): ?string
    {
        return $this->lumierearti;
    }

    public function setLumierearti(string $lumierearti): self
    {
        $this->lumierearti = $lumierearti;

        return $this;
    }

    /**
     * @return Collection<int, Salle>
     */
    public function getSalles(): Collection
    {
        return $this->salles;
    }

    public function addSalle(Salle $salle): self
    {
        if (!$this->salles->contains($salle)) {
            $this->salles->add($salle);
            $salle->addErgonomie($this);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): self
    {
        if ($this->salles->removeElement($salle)) {
            $salle->removeErgonomie($this);
        }

        return $this;
    }

    public function __toString(){
        return $this->lumierearti;
    }
}
