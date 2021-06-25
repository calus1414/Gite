<?php

namespace App\Entity;

use App\Entity\Gite;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;


class PropertySearch
{

    private   $minSurface = 0;
    private   $minBedroom = 0;
    private   $animals = null;
    private   $equipements;
    private   $services;
    private   $city = "";



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
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     */
    public function setMinSurface($minSurface): self
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of minBedroom
     */
    public function getMinBedroom()
    {
        return $this->minBedroom;
    }

    /**
     * Set the value of minBedroom
     */
    public function setMinBedroom($minBedroom): self
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
    public function setAnimals($animals)
    {
        $this->animals = $animals;

        return $this;
    }

    /**
     * Get the value of city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     */
    public function setCity($city): self
    {
        $this->city = $city;

        return $this;
    }




    /**
     * Get the value of equipements
     */
    public function getEquipements()
    {
        return $this->equipements;
    }

    /**
     * Set the value of equipements
     *
     * @return  self
     */
    public function setEquipements($equipements)
    {
        $this->equipements = $equipements;

        return $this;
    }

    /**
     * Get the value of services
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Set the value of services
     *
     * @return  self
     */
    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }
}
