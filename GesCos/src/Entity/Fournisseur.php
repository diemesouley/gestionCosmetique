<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FournisseurRepository")
 */
class Fournisseur
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
    private $nomFournisseur;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $adresseFournisseur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $emailFournisseur;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephoneFournisseur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFournisseur(): ?string
    {
        return $this->nomFournisseur;
    }

    public function setNomFournisseur(string $nomFournisseur): self
    {
        $this->nomFournisseur = $nomFournisseur;

        return $this;
    }

    public function getAdresseFournisseur(): ?string
    {
        return $this->adresseFournisseur;
    }

    public function setAdresseFournisseur(string $adresseFournisseur): self
    {
        $this->adresseFournisseur = $adresseFournisseur;

        return $this;
    }

    public function getEmailFournisseur(): ?string
    {
        return $this->emailFournisseur;
    }

    public function setEmailFournisseur(string $emailFournisseur): self
    {
        $this->emailFournisseur = $emailFournisseur;

        return $this;
    }

    public function getTelephoneFournisseur(): ?int
    {
        return $this->telephoneFournisseur;
    }

    public function setTelephoneFournisseur(int $telephoneFournisseur): self
    {
        $this->telephoneFournisseur = $telephoneFournisseur;

        return $this;
    }
}
