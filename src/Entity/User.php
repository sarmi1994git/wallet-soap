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
}
