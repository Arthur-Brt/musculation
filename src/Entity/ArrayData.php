<?php

namespace App\Entity;

use App\Repository\ArrayDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArrayDataRepository::class)
 */
class ArrayData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, inversedBy="arrayData", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

    /**
     * @ORM\Column(type="array")
     */
    private $poids = [];

    /**
     * @ORM\Column(type="array")
     */
    private $masseGraisseuse = [];

    /**
     * @ORM\Column(type="array")
     */
    private $masseMusculaire = [];

    /**
     * @ORM\Column(type="array")
     */
    private $createdAt = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?Utilisateur
    {
        return $this->idUser;
    }

    public function setIdUser(Utilisateur $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getPoids(): ?array
    {
        return $this->poids;
    }

    public function setPoids(array $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getMasseGraisseuse(): ?array
    {
        return $this->masseGraisseuse;
    }

    public function setMasseGraisseuse(array $masseGraisseuse): self
    {
        $this->masseGraisseuse = $masseGraisseuse;

        return $this;
    }

    public function getMasseMusculaire(): ?array
    {
        return $this->masseMusculaire;
    }

    public function setMasseMusculaire(array $masseMusculaire): self
    {
        $this->masseMusculaire = $masseMusculaire;

        return $this;
    }

    public function getCreatedAt(): ?array
    {
        return $this->createdAt;
    }

    public function setCreatedAt(array $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
