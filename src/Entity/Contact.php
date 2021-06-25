<?php

namespace App\Entity;

use App\Entity\Gite;
use Symfony\Component\Validator\Constraints as Assert;




class Contact
{
    /**
     * 
     * @Assert\NotBlank()
     * @Assert\Length(min= 3,max=20)
     * 
     */
    private string $firstname;
    /**
     * 
     * @Assert\NotBlank()
     * @Assert\Length(min= 3,max=20)
     * 
     */
    private string $LastName;
    /**
     * 
     * @Assert\NotBlank()
     * @Assert\Email()
     * 
     */
    private string $email;
    /**
     * 
     * @Assert\NotBlank()
     * @Assert\Length(min= 10,max=500)
     * 
     */
    private string $message;
    /**
     * 
     * @Assert\NotBlank()
     * @Assert\Length(min= 10,max=10)
     * 
     */
    private string $phone;

    private Gite $gite;




    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of gite
     *
     * @return Gite
     */
    public function getGite(): Gite
    {
        return $this->gite;
    }

    /**
     * Set the value of gite
     *
     * @param Gite $gite
     *
     * @return self
     */
    public function setGite(Gite $gite): self
    {
        $this->gite = $gite;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of LastName
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * Set the value of LastName
     *
     * @return  self
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
}
