<?php

namespace App\Entity;

use App\Entity\Gite;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;


class PropertySearch
{

    private int   $minSurface = 0;
    private  int $minBedroom = 0;
    private   $animals = null;
    private  ArrayCollection $equipements;
    private  ArrayCollection $services;
    private  string $city = "";



    public function __construct()
    {

        $this->equipements = new ArrayCollection();
        $this->services = new ArrayCollection();

        // $this->equipements = new Equipement();
        // $this->gites = new Gite();
    }
    /**
     * Get the value of minSurface
     */
    public function getMinSurface(): int
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     */
    public function setMinSurface(int $minSurface): self
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of minBedroom
     */
    public function getMinBedroom(): int
    {
        return $this->minBedroom;
    }

    /**
     * Set the value of minBedroom
     */
    public function setMinBedroom(int $minBedroom): self
    {
        $this->minBedroom = $minBedroom;

        return $this;
    }

    /**
     * Get the value of animals
     */
    public function getAnimals()
    {
        return $this->animals;
    }

    /**
     * Set the value of animals
     *
     * @return  self
     */
    public function setAnimals($animals): self
    {
        $this->animals = $animals;

        return $this;
    }

    /**
     * Get the value of city
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Set the value of city
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }




    /**
     * Get the value of equipements
     */
    public function getEquipements(): ArrayCollection
    {
        return $this->equipements;
    }

    /**
     * Set the value of equipements
     *
     * @return  self
     */
    public function setEquipements(ArrayCollection $equipements): self
    {
        $this->equipements = $equipements;

        return $this;
    }

    /**
     * Get the value of services
     */
    public function getServices(): ArrayCollection
    {
        return $this->services;
    }

    /**
     * Set the value of services
     *
     * @return  self
     */
    public function setServices(ArrayCollection $services): self
    {
        $this->services = $services;

        return $this;
    }
}
