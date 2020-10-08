<?php

namespace App\Entity;

use App\Repository\UserMesureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserMesureRepository::class)
 */
class UserMesure
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="userMesures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="decimal")
     */
    private $poids;

    /**
     * @ORM\Column(type="decimal")
     */
    private $masseGraisseuse;

    /**
     * @ORM\Column(type="decimal")
     */
    private $masseMusculaire;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $test;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Utilisateur
    {
        return $this->user;
    }

    public function setUser(?Utilisateur $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(string $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getMasseGraisseuse(): ?string
    {
        return $this->masseGraisseuse;
    }

    public function setMasseGraisseuse(string $masseGraisseuse): self
    {
        $this->masseGraisseuse = $masseGraisseuse;

        return $this;
    }

    public function getMasseMusculaire(): ?string
    {
        return $this->masseMusculaire;
    }

    public function setMasseMusculaire(string $masseMusculaire): self
    {
        $this->masseMusculaire = $masseMusculaire;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTest(): ?string
    {
        return $this->test;
    }

    public function setTest(?string $test): self
    {
        $this->test = $test;

        return $this;
    }
}
