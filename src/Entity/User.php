<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $Email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getRoles()
    {
        return [
            'ROLE_USER'
        ];
    }
    
    public function getSalt() {}

    public function eraseCredentials () {}

    public function serialize(){
        return serialize([
            $this->id,
            $this->Username,
            $this->Email,
            $this->Password
        ]);
    }

    public function unserialize($string){
        list(    
            $this->id,
            $this->Username,
            $this->Email,
            $this->Password
        ) = unserialize($string, ['allowed_classes' => false]);
    }

}
