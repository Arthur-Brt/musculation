<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="integer")
     */
    private $Taille;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Sexe;

    /**
     * @ORM\Column(type="array")
     */
    private $Poids = [];

    /**
     * @ORM\Column(type="array")
     */
    private $MasseGraisseuse = [];

    /**
     * @ORM\Column(type="array")
     */
    private $MasseMusculaire = [];

    /**
     * @ORM\Column(type="array")
     */
    private $dateMesure = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getTaille(): ?int
    {
        return $this->Taille;
    }

    public function setTaille(int $Taille): self
    {
        $this->Taille = $Taille;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getPoids(): ?array
    {
        return $this->Poids;
    }

    public function setPoids(array $Poids): self
    {
        $this->Poids = $Poids;

        return $this;
    }

    public function getMasseGraisseuse(): ?array
    {
        return $this->MasseGraisseuse;
    }

    public function setMasseGraisseuse(array $MasseGraisseuse): self
    {
        $this->MasseGraisseuse = $MasseGraisseuse;

        return $this;
    }

    public function getMasseMusculaire(): ?array
    {
        return $this->MasseMusculaire;
    }

    public function setMasseMusculaire(array $MasseMusculaire): self
    {
        $this->MasseMusculaire = $MasseMusculaire;

        return $this;
    }

    public function getDateMesure(): ?array
    {
        return $this->dateMesure;
    }

    public function setDateMesure(array $dateMesure): self
    {
        $this->dateMesure = $dateMesure;

        return $this;
    }
}
