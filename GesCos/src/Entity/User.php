<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields={"email"},
 * message="L'email que vous avez indiqué existe déjà !"
 * )
 */
class User implements UserInterface            
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
    private $nomUser;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $prenomUser;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephoneUser;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit faire minimum 4 caractéres")
     */
    private $password;

    /**
     *@Assert\EqualTo(propertyPath="password", message="Vous n'avez pas confirmé le meme mot de passe")
     */

    public $confirmPassword;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUser(): ?string
    {
        return $this->nomUser;
    }

    public function setNomUser(string $nomUser): self
    {
        $this->nomUser = $nomUser;

        return $this;
    }

    public function getPrenomUser(): ?string
    {
        return $this->prenomUser;
    }

    public function setPrenomUser(string $prenomUser): self
    {
        $this->prenomUser = $prenomUser;

        return $this;
    }

    public function getTelephoneUser(): ?int
    {
        return $this->telephoneUser;
    }

    public function setTelephoneUser(int $telephoneUser): self
    {
        $this->telephoneUser = $telephoneUser;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    public function getUsername() {}

    public function eraseCredentials(){}

    public function getSalt() { }

    public function getRoles() {

        return ['ROLE_USER'];
    }
}
