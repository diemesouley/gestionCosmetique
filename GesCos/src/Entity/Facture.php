<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 */
class Facture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LigneCommande", mappedBy="facture")
     */
    private $id_ligneCommande;

    public function __construct()
    {
        $this->id_ligneCommande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|LigneCommande[]
     */
    public function getIdLigneCommande(): Collection
    {
        return $this->id_ligneCommande;
    }

    public function addIdLigneCommande(LigneCommande $idLigneCommande): self
    {
        if (!$this->id_ligneCommande->contains($idLigneCommande)) {
            $this->id_ligneCommande[] = $idLigneCommande;
            $idLigneCommande->setFacture($this);
        }

        return $this;
    }

    public function removeIdLigneCommande(LigneCommande $idLigneCommande): self
    {
        if ($this->id_ligneCommande->contains($idLigneCommande)) {
            $this->id_ligneCommande->removeElement($idLigneCommande);
            // set the owning side to null (unless already changed)
            if ($idLigneCommande->getFacture() === $this) {
                $idLigneCommande->setFacture(null);
            }
        }

        return $this;
    }
}
