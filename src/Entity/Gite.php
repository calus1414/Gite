<?php

namespace App\Entity;

use App\Repository\GiteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=GiteRepository::class)
 */
class Gite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *      message= "le nom du gite ne peut être vide")
     * @Assert\Length(
     *      min = 5,
     *      max = 50,
     *      minMessage = "le nom du Gite doit comporter un minimum de  {{ limit }} caracteres ",
     *      maxMessage = "le nom du Gite doit comporter un maximum de   {{ limit }} caracteres"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     *@Assert\NotBlank(
     *      message= "la description du gite ne peut être vide")
     *@Assert\Length(
     *      min = 15,
     *      max = 250,
     *      minMessage = "la description  doit comporter un minimum de  {{ limit }} caracteres ",
     *      maxMessage = "la description du Gite doit comporter un maximum de  {{ limit }} caracteres"
     * )
     * 
     * 
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(
     *      message= "la surface du gite ne peut être vide")
     * 
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(
     *      message= "le nombre de chambre du gite ne peut être vide")
     * 
     */
    private $bedroom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *      message= "l'adresse du gite ne peut être vide")
     * 
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *      message= "la ville du gite ne peut être vide")
     * 
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *      message= "le code postal du gite ne peut être vide")
     * @Assert\Regex(
     *      pattern="/[0-9]{5}/",
     *      message="le code postal doit contenir 5 chiffres"
     * )
     */
    private $postal_code;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     * 
     * 
     */
    private $animals;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function __construct()
    {
        $this->animals = false;
        $this->created_at = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getname(): ?string
    {
        return $this->name;
    }

    public function setname(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getBedroom(): ?int
    {
        return $this->bedroom;
    }

    public function setBedroom(int $bedroom): self
    {
        $this->bedroom = $bedroom;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getAnimals(): ?bool
    {
        return $this->animals;
    }

    public function setAnimals(bool $animals): self
    {
        $this->animals = $animals;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
