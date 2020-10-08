<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateurRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur implements UserInterface
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(type="integer")
     * @Assert\LessThan(300)
     * @Assert\GreaterThan(50)
     */
    private $taille;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit faire minimun 8 caractères")
     *
     */
    private $password;
    /**
     * 
     * @Assert\EqualTo(propertyPath="password", message="Vous n'avez pas tapé le même mot de passe")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthday;

    /**
     * @ORM\OneToOne(targetEntity=ArrayData::class, mappedBy="idUser", cascade={"persist", "remove"})
     */
    private $arrayData;

    /**
     * @ORM\OneToMany(targetEntity=Mesure::class, mappedBy="idUser", orphanRemoval=true)
     */
    private $mesures;

    /**
     * @ORM\OneToMany(targetEntity=UserMesure::class, mappedBy="user", orphanRemoval=true)
     */
    private $userMesures;

    public function __construct()
    {
        $this->mesures = new ArrayCollection();
        $this->userMesures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }
    public function eraseCredentials(){

    }
    public function getSalt(){

    }

    public function getRoles(){
        return['ROLE_USER'];
    }
    public function getUserName(): ?string
    {
        return $this->nom;
    }

    public function getArrayData(): ?ArrayData
    {
        return $this->arrayData;
    }

    public function setArrayData(ArrayData $arrayData): self
    {
        $this->arrayData = $arrayData;

        // set the owning side of the relation if necessary
        if ($arrayData->getIdUser() !== $this) {
            $arrayData->setIdUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Mesure[]
     */
    public function getMesures(): Collection
    {
        return $this->mesures;
    }

    public function addMesure(Mesure $mesure): self
    {
        if (!$this->mesures->contains($mesure)) {
            $this->mesures[] = $mesure;
            $mesure->setIdUser($this);
        }

        return $this;
    }

    public function removeMesure(Mesure $mesure): self
    {
        if ($this->mesures->contains($mesure)) {
            $this->mesures->removeElement($mesure);
            // set the owning side to null (unless already changed)
            if ($mesure->getIdUser() === $this) {
                $mesure->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserMesure[]
     */
    public function getUserMesures(): Collection
    {
        return $this->userMesures;
    }

    public function addUserMesure(UserMesure $userMesure): self
    {
        if (!$this->userMesures->contains($userMesure)) {
            $this->userMesures[] = $userMesure;
            $userMesure->setUser($this);
        }

        return $this;
    }

    public function removeUserMesure(UserMesure $userMesure): self
    {
        if ($this->userMesures->contains($userMesure)) {
            $this->userMesures->removeElement($userMesure);
            // set the owning side to null (unless already changed)
            if ($userMesure->getUser() === $this) {
                $userMesure->setUser(null);
            }
        }

        return $this;
    }
}
