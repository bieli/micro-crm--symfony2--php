<?php

namespace BieliNet\Bundle\MicroCrmBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Asset;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * CustomerType
 *
 * @ORM\Table(name="customer_type")
 * @ORM\Entity(repositoryClass="BieliNet\Bundle\MicroCrmBundle\Entity\CustomerTypeRepository")
 */
class CustomerType
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
     * @ORM\Column(name="name", type="string", length=32, unique=true, nullable=false)
     *
     * @Asset\NotBlank
     * @Asset\Length(min=2, max=32)
     */
    private $name;


    public function __construct()
    {
    }

    public function __toString()
    {
        return $this->name;
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
     * Set customer obj
     *
     * @param Customer $customer
     * @return CustomerType
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer obj
     *
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}

