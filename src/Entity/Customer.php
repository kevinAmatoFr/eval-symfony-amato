<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity=Compagny::class, mappedBy="customer")
     */
    private $Compagny;


    public function __construct()
    {
        $this->Compagny = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection|Compagny[]
     */
    public function getCompagny(): Collection
    {
        return $this->Compagny;
    }

    public function addCompagny(Compagny $compagny): self
    {
        if (!$this->Compagny->contains($compagny)) {
            $this->Compagny[] = $compagny;
            $compagny->setCustomer($this);
        }

        return $this;
    }

    public function removeCompagny(Compagny $compagny): self
    {
        if ($this->Compagny->removeElement($compagny)) {
            // set the owning side to null (unless already changed)
            if ($compagny->getCustomer() === $this) {
                $compagny->setCustomer(null);
            }
        }

        return $this;
    }
}
