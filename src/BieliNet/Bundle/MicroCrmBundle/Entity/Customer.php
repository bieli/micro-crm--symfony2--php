<?php

namespace BieliNet\Bundle\MicroCrmBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Asset;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="BieliNet\Bundle\MicroCrmBundle\Entity\CustomerRepository")
 */
class Customer
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
     * @var int $selletId
     *
     * @ORM\Column(name="seller_id", type="smallint", nullable=false)
     */
    private $sellerId;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=32, unique=false, nullable=false)
     *
     * @Asset\NotBlank
     * @Asset\Length(min=4, max=32)
     *
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=32, nullable=false)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="pesel", type="string", length=16, unique=true, nullable=false)
     */
    private $pesel;

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
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="phone2", type="string", length=16, unique=true, nullable=true)
     */
    private $phone2;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true)
     */
    private $description;

    /**
     * @var int $type
     *
     * @ORM\Column(name="type", type="smallint", nullable=true)
     */
    private $type;

    /**
     * @var int $type
     *
     * @ORM\Column(name="source", type="smallint", nullable=true)
     */
    private $source;

    /**
     * @var int $sourceType
     *
     * @ORM\Column(name="source_type", type="smallint", nullable=true)
     */
    private $sourceType;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
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
     * Set seller id
     *
     * @return Customer
     */
    public function setSellerId($sellerId)
    {
        $this->sellerId = $sellerId;

        return $this;
    }

    /**
     * Get seller id
     *
     * @return integer 
     */
    public function getSellerId()
    {
        return $this->sellerId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Customer
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
     * @return Customer
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
     * Set pesel
     *
     * @param string $pesel
     * @return Customer
     */
    public function setPesel($pesel)
    {
        $this->pesel = $pesel;

        return $this;
    }

    /**
     * Get pesel
     *
     * @return string 
     */
    public function getPesel()
    {
        return $this->pesel;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Customer
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
     * @return Customer
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
     * Set phone2
     *
     * @param string $phone2
     * @return Customer
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;

        return $this;
    }

    /**
     * Get phone2
     *
     * @return string 
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Customer
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param int $type
     * @return Customer
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return int 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set source
     *
     * @param int $source
     * @return Customer
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return int
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set source type
     *
     * @param int $sourceType
     * @return Customer
     */
    public function setSourceType($sourceType)
    {
        $this->sourceType = $sourceType;

        return $this;
    }

    /**
     * Get source type
     *
     * @return int
     */
    public function getSourceType()
    {
        return $this->sourceType;
    }

    /**
     * Set createdAt
     *
     * @param DateTime $createdAt
     * @return Customer
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
}

