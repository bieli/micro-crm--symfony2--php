<?php

namespace BieliNet\Bundle\MicroCrmBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Asset;
//use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="BieliNet\Bundle\MicroCrmBundle\Entity\ProductRepository")
 */
class Product
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
     * @var integer $productGroupId
     *
     * @ORM\Column(name="product_group_id", type="integer", nullable=false)
     */
    private $productGroupId;

    /**
     * @var ProductGroup
     *
     * @ORM\ManyToOne(targetEntity="ProductGroup")
     * @ORM\JoinColumn(name="product_group_id", referencedColumnName="id")
     */
    private $productGroup;

    /**
     * @var integer $providerId
     *
     * @ORM\Column(name="provider_id", type="integer", nullable=false)
     */
    private $providerId;

    /**
     * @var Provider
     *
     * @ORM\ManyToOne(targetEntity="Provider")
     * @ORM\JoinColumn(name="provider_id", referencedColumnName="id")
     */
    private $provider;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=64, unique=true, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="commission_for_granting", type="float", nullable=true)
     */
    private $commissionForGranting;

    /**
     * @var integer $insuranceTypeId
     *
     * @ORM\Column(name="insurance_type_id", type="integer", nullable=true)
     */
    private $insuranceTypeId;

    /**
     * @var float
     *
     * @ORM\Column(name="insurance_amount", type="float", nullable=true)
     */
    private $insuranceAmount;

    /**
     * @var float
     *
     * @ORM\Column(name="interest_base_rate", type="float", nullable=true)
     */
    private $interest_base_rate;

    /**
     * @var float
     *
     * @ORM\Column(name="interest_kind_id", type="float", nullable=true)
     */
    private $interestKindId;

    /**
     * @var float
     *
     * @ORM\Column(name="interest_amount", type="float", nullable=true)
     */
    private $interestAmount;

    /**
     * @var float
     *
     * @ORM\Column(name="interest_margin", type="float", nullable=true)
     */
    private $interestMargin;

    /**
     * @var float
     *
     * @ORM\Column(name="commission_for_early_repayment_amount", type="float", nullable=true)
     */
    private $commissionForEarlyRepaymentAmount;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="commission_for_early_repayment_to", type="date", nullable=true)
     */
    private $commissionForEarlyRepaymentTo;

    /**
     * @var int
     *
     * @ORM\Column(name="tranches_count", type="integer", nullable=true)
     */
    private $tranchesCount;

    /**
     * @var float
     *
     * @ORM\Column(name="credit_amount", type="float", nullable=true)
     */
    private $creditAmount;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="credit_agreement_date", type="date", nullable=true)
     */
    private $creditAgreementDate;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="credit_start_date", type="date", nullable=true)
     */
    private $creditStartDate;

    /**
     * @var int
     *
     * @ORM\Column(name="credit_period_in_months", type="integer", nullable=true)
     */
    private $creditPeriodInMonths;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="credit_end_date", type="date", nullable=true)
     */
    private $creditEndDate;

    /**
     * @var int
     *
     * @ORM\Column(name="grace_period_for_repayment_of_capital_in_months", type="integer", nullable=true)
     */
    private $gracePeriodForRepaymentOfCapitalInMonths;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="insurance_life_to", type="date", nullable=true)
     */
    private $insuranceLifeTo;

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=32, unique=false, nullable=true)
     *
     * @Asset\Url
     * @Asset\Length(min=4, max=256)
     */
    private $url;

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

    public function __toString()
    {
        return ucwords($this->name);
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
     * Set product group id
     *
     * @param string $productGroupId
     * @return Product
     */
    public function setProductGroupId($productGroupId)
    {
        $this->productGroupId = $productGroupId;

        return $this;
    }

    /**
     * Get product group id
     *
     * @return string
     */
    public function getProductGroupId()
    {
        return $this->productGroupId;
    }

    /**
     * Set product group
     *
     * @param string $productGroup
     * @return Product
     */
    public function setProductGroup($productGroup)
    {
        $this->productGroup = $productGroup;

        return $this;
    }

    /**
     * Get product group
     *
     * @return string
     */
    public function getProductGroup()
    {
        return $this->productGroup;
    }

    /**
     * Set provider id
     *
     * @param string $providerId
     * @return Product
     */
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;

        return $this;
    }

    /**
     * Get provider id
     *
     * @return string
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * Set provider
     *
     * @param string $provider
     * @return Product
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * Get provider
     *
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
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
     * Set description
     *
     * @param string $description
     * @return Product
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
     * @param float $commissionForEarlyRepaymentAmount
     * @return Product
     */
    public function setCommissionForEarlyRepaymentAmount($commissionForEarlyRepaymentAmount)
    {
        $this->commissionForEarlyRepaymentAmount = $commissionForEarlyRepaymentAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getCommissionForEarlyRepaymentAmount()
    {
        return $this->commissionForEarlyRepaymentAmount;
    }

    /**
     * @param DateTime $commissionForEarlyRepaymentTo
     * @return Product
     */
    public function setCommissionForEarlyRepaymentTo($commissionForEarlyRepaymentTo)
    {
        $this->commissionForEarlyRepaymentTo = $commissionForEarlyRepaymentTo;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCommissionForEarlyRepaymentTo()
    {
        return $this->commissionForEarlyRepaymentTo;
    }

    /**
     * @param float $commissionForGranting
     * @return Product
     */
    public function setCommissionForGranting($commissionForGranting)
    {
        $this->commissionForGranting = $commissionForGranting;
        return $this;
    }

    /**
     * @return float
     */
    public function getCommissionForGranting()
    {
        return $this->commissionForGranting;
    }

    /**
     * @param float $insuranceAmount
     * @return Product
     */
    public function setInsuranceAmount($insuranceAmount)
    {
        $this->insuranceAmount = $insuranceAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getInsuranceAmount()
    {
        return $this->insuranceAmount;
    }

    /**
     * @param int $insuranceTypeId
     * @return Product
     */
    public function setInsuranceTypeId($insuranceTypeId)
    {
        $this->insuranceTypeId = $insuranceTypeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getInsuranceTypeId()
    {
        return $this->insuranceTypeId;
    }

    /**
     * @param float $interestAmount
     * @return Product
     */
    public function setInterestAmount($interestAmount)
    {
        $this->interestAmount = $interestAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getInterestAmount()
    {
        return $this->interestAmount;
    }

    /**
     * @param float $interestKindId
     * @return Product
     */
    public function setInterestKindId($interestKindId)
    {
        $this->interestKindId = $interestKindId;
        return $this;
    }

    /**
     * @return float
     */
    public function getInterestKindId()
    {
        return $this->interestKindId;
    }

    /**
     * @param float $interestMargin
     * @return Product
     */
    public function setInterestMargin($interestMargin)
    {
        $this->interestMargin = $interestMargin;
        return $this;
    }

    /**
     * @return float
     */
    public function getInterestMargin()
    {
        return $this->interestMargin;
    }

    /**
     * @param float $interest_base_rate
     * @return Product
     */
    public function setInterestBaseRate($interest_base_rate)
    {
        $this->interest_base_rate = $interest_base_rate;
        return $this;
    }

    /**
     * @return float
     */
    public function getInterestBaseRate()
    {
        return $this->interest_base_rate;
    }


    /**
     * @param int $tranchesCount
     * @return Product
     */
    public function setTranchesCount($tranchesCount)
    {
        $this->tranchesCount = $tranchesCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getTranchesCount()
    {
        return $this->tranchesCount;
    }


    /**
     * @param DateTime $creditAgreementDate
     */
    public function setCreditAgreementDate($creditAgreementDate)
    {
        $this->creditAgreementDate = $creditAgreementDate;
    }

    /**
     * @return DateTime
     */
    public function getCreditAgreementDate()
    {
        return $this->creditAgreementDate;
    }

    /**
     * @param float $creditAmount
     */
    public function setCreditAmount($creditAmount)
    {
        $this->creditAmount = $creditAmount;
    }

    /**
     * @return float
     */
    public function getCreditAmount()
    {
        return $this->creditAmount;
    }

    /**
     * @param DateTime $creditEndDate
     */
    public function setCreditEndDate($creditEndDate)
    {
        $this->creditEndDate = $creditEndDate;
    }

    /**
     * @return DateTime
     */
    public function getCreditEndDate()
    {
        return $this->creditEndDate;
    }

    /**
     * @param int $creditPeriodInMonths
     */
    public function setCreditPeriodInMonths($creditPeriodInMonths)
    {
        $this->creditPeriodInMonths = $creditPeriodInMonths;
    }

    /**
     * @return int
     */
    public function getCreditPeriodInMonths()
    {
        return $this->creditPeriodInMonths;
    }

    /**
     * @param DateTime $creditStartDate
     */
    public function setCreditStartDate($creditStartDate)
    {
        $this->creditStartDate = $creditStartDate;
    }

    /**
     * @return DateTime
     */
    public function getCreditStartDate()
    {
        return $this->creditStartDate;
    }

    /**
     * @param int $gracePeriodForRepaymentOfCapitalInMonths
     */
    public function setGracePeriodForRepaymentOfCapitalInMonths($gracePeriodForRepaymentOfCapitalInMonths)
    {
        $this->gracePeriodForRepaymentOfCapitalInMonths = $gracePeriodForRepaymentOfCapitalInMonths;
    }

    /**
     * @return int
     */
    public function getGracePeriodForRepaymentOfCapitalInMonths()
    {
        return $this->gracePeriodForRepaymentOfCapitalInMonths;
    }

    /**
     * @param DateTime $insuranceLifeTo
     */
    public function setInsuranceLifeTo($insuranceLifeTo)
    {
        $this->insuranceLifeTo = $insuranceLifeTo;
    }

    /**
     * @return DateTime
     */
    public function getInsuranceLifeTo()
    {
        return $this->insuranceLifeTo;
    }

    /**
     * Set password hash
     *
     * @param string $url
     * @return Product
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get password hash
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set createdAt
     *
     * @param DateTime $createdAt
     * @return Product
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
