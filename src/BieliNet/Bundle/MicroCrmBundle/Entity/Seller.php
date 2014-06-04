<?php

namespace BieliNet\Bundle\MicroCrmBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Asset;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Seller
 *
 * @ORM\Table(name="seller")
 * @ORM\Entity(repositoryClass="BieliNet\Bundle\MicroCrmBundle\Entity\SellerRepository")
 */
class Seller
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=32, unique=false, nullable=false)
     *
     * @Asset\NotBlank
     * @Asset\Length(min=2, max=32)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=32, nullable=false)
     *
     * @Asset\NotBlank
     * @Asset\Length(min=2, max=32)
     */
    private $surname;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=64, unique=true)
     *
     * @Asset\NotBlank
     * @Asset\Email
     * @Asset\Length(min=6, max=64)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=16, unique=true, nullable=true)
     *
     * @Asset\NotBlank
     * @Asset\Length(min=6, max=16)
     */
    private $phone;

    /**
     * @var string $passwordHash
     *
     * @ORM\Column(name="password_hash", type="string", length=32, unique=false, nullable=false)
     *
     * @Asset\NotBlank
     * @Asset\Length(min=8, max=32)
     */
    private $passwordHash;

    /**
     * @var string $activityHash
     *
     * @ORM\Column(name="activity_hash", type="string", length=32, unique=true, nullable=false)
     *
     * @Asset\NotBlank
     * @Asset\Length(min=16, max=32)
     */
    private $activityHash;


    /**
     * @var boolean $isActive
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->passwordHash = uniqid();
        $this->activityHash = md5(uniqid() . ' ' . time());
    }

    public function __toString()
    {
        return ucfirst($this->name) . ' ' . ucfirst($this->surname);
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Seller
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Seller
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Seller
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Seller
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set createdAt
     *
     * @param DateTime $createdAt
     * @return Seller
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return int 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set password hash
     *
     * @param string $passwordHash
     * @return Seller
     */
    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;

        return $this;
    }

    /**
     * Get password hash
     *
     * @return string
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * Set is active
     *
     * @param boolean $isActive
     * @return Seller
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get is active
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set activity hash
     *
     * @param boolean $isActive
     * @return Seller
     */
    public function setActivityHash($activityHash)
    {
        $this->activityHash = $activityHash;

        return $this;
    }

    /**
     * Get activity hash
     *
     * @return string
     */
    public function getActivityHash()
    {
        return $this->activityHash;
    }
}


