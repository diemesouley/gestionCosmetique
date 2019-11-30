<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nomClient;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $prenomClient;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephoneClient;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $sommeVerce;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $dette;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commande", mappedBy="id_Client")
     */
    private $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }

    public function setNomClient(string $nomClient): self
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenomClient;
    }

    public function setPrenomClient(string $prenomClient): self
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    public function getTelephoneClient(): ?int
    {
        return $this->telephoneClient;
    }

    public function setTelephoneClient(?int $telephoneClient): self
    {
        $this->telephoneClient = $telephoneClient;

        return $this;
    }

    public function getSommeVerce(): ?float
    {
        return $this->sommeVerce;
    }

    public function setSommeVerce(?float $sommeVerce): self
    {
        $this->sommeVerce = $sommeVerce;

        return $this;
    }

    public function getDette(): ?float
    {
        return $this->dette;
    }

    public function setDette(?float $dette): self
    {
        $this->dette = $dette;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setIdClient($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->contains($commande)) {
            $this->commandes->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getIdClient() === $this) {
                $commande->setIdClient(null);
            }
        }

        return $this;
    }

}
