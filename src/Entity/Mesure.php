<?php

namespace App\Entity;

use App\Repository\MesureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MesureRepository::class)
 */
class Mesure
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="mesures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

    /**
     * @ORM\Column(type="integer")
     */
    private $poids;

    /**
     * @ORM\Column(type="integer")
     */
    private $masseGraisseuse;

    /**
     * @ORM\Column(type="integer")
     */
    private $masseMusculaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?Utilisateur
    {
        return $this->idUser;
    }

    public function setIdUser(?Utilisateur $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getMasseGraisseuse(): ?int
    {
        return $this->masseGraisseuse;
    }

    public function setMasseGraisseuse(int $masseGraisseuse): self
    {
        $this->masseGraisseuse = $masseGraisseuse;

        return $this;
    }

    public function getMasseMusculaire(): ?int
    {
        return $this->masseMusculaire;
    }

    public function setMasseMusculaire(int $masseMusculaire): self
    {
        $this->masseMusculaire = $masseMusculaire;

        return $this;
    }
}
