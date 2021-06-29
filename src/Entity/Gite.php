<?php

namespace App\Entity;

use DateTimeInterface;
use App\Entity\Services;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GiteRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass=GiteRepository::class)
 * 
 * @Vich\Uploadable
 */
class Gite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

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
    private string $name;

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
    private string $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(
     *      message= "la surface du gite ne peut être vide")
     * 
     */
    private int $surface;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(
     *      message= "le nombre de chambre du gite ne peut être vide")
     * 
     */
    private int $bedroom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *      message= "l'adresse du gite ne peut être vide")
     * 
     */
    private string $address;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *      message= "la ville du gite ne peut être vide")
     * 
     */
    private string $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *      message= "le code postal du gite ne peut être vide")
     * @Assert\Regex(
     *      pattern="/[0-9]{5}/",
     *      message="le code postal doit contenir 5 chiffres"
     * )
     */
    private string $postal_code;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     * 
     * 
     */
    private bool $animals;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTimeInterface $created_at;

    /**
     * @ORM\ManyToMany(targetEntity=Equipement::class, inversedBy="gites")
     */
    private $equipements;

    /**
     * @ORM\ManyToMany(targetEntity=Services::class, inversedBy="gites")
     */
    private  $services;


    /**
     *@var File|null
     * @Vich\UploadableField(mapping="gite_image",fileNameProperty="imageFile")
     */
    private ?File $imageName;


    /**
     *@var string|null
     *@ORM\Column(type="string",length=255)
     * 
     */
    private ?string $imageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTimeInterface $updated_at;


    public function __construct()
    {
        $this->animals = false;
        $this->created_at = new \DateTime();
        $this->equipements = new ArrayCollection();
        $this->services = new ArrayCollection();
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

    /**
     * @return Collection|Equipement[]
     */
    public function getEquipements(): Collection
    {
        return $this->equipements;
    }

    public function addEquipement(Equipement $equipement): self
    {
        if (!$this->equipements->contains($equipement)) {
            $this->equipements[] = $equipement;
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): self
    {
        $this->equipements->removeElement($equipement);

        return $this;
    }

    /**
     * @return Collection|Services[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Services $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
        }

        return $this;
    }

    public function removeService(Services $service): self
    {
        $this->services->removeElement($service);

        return $this;
    }

    /**
     * Get the value of imageName
     */
    public function getImageName(): ?File
    {
        return $this->imageName;
    }

    /**
     * Set the value of imageName
     */
    public function setImageName(File $imageName): self
    {
        $this->imageName = $imageName;
        if ($this->imageName instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    /**
     * Get the value of imageFile
     */
    public function getImageFile(): ?string
    {
        return $this->imageFile;
    }

    /**
     * Set the value of imageFile
     */
    public function setImageFile(?string $imageFile): self
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
