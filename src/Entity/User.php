<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="users")
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
     * @ORM\Column(type="string", length=15)
     */
    private $identification;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $firstname;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lastname;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;
    /**
     * @ORM\Column(type="string", length=15)
     */
    private $phone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdentification(): ?string {
        return $this->identification;
    }

    public function setIdentification($identification) {
        $this->identification = $identification;
    }

    public function getFirstname(): ?string {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function getLastname(): ?string {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPhone(): ?string {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }
}
