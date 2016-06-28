<?php

namespace Entity\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Entity\EcommerceBundle\Entity\Customer;
use Entity\EcommerceBundle\Entity\Products;

/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="Entity\EcommerceBundle\Entity\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="orderNumber", type="integer", nullable=true, unique=true)
     */
    private $orderNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="orderDate", type="date")
     */
    private $orderDate;

    /**
     * @var string
     *
     * @ORM\Column(name="wayPayement", type="string", length=50)
     */
    private $wayPayement;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;
    
    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="orders", cascade={"remove"})
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
    */
    private $customer;
    
    /**
     * @ORM\ManyToOne(targetEntity="Products", inversedBy="orders", cascade={"remove"})
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
    */
    private $products;
    
    /*
     * construct
     */
    public function __construct(){
    $this->orderDate = new \DateTime('now');
    }
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set orderNumber
     *
     * @param integer $orderNumber
     *
     * @return Orders
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    /**
     * Get orderNumber
     *
     * @return int
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Orders
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set orderDate
     *
     * @param \DateTime $orderDate
     *
     * @return Orders
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    /**
     * Get orderDate
     *
     * @return \DateTime
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * Set wayPayement
     *
     * @param string $wayPayement
     *
     * @return Orders
     */
    public function setWayPayement($wayPayement)
    {
        $this->wayPayement = $wayPayement;

        return $this;
    }

    /**
     * Get wayPayement
     *
     * @return string
     */
    public function getWayPayement()
    {
        return $this->wayPayement;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Orders
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set customer
     *
     * @param \Entity\EcommerceBundle\Entity\Customer $customer
     *
     * @return Orders
     */
    public function setCustomer(\Entity\EcommerceBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Entity\EcommerceBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set products
     *
     * @param \Entity\EcommerceBundle\Entity\Products $products
     *
     * @return Orders
     */
    public function setProducts(\Entity\EcommerceBundle\Entity\Products $products = null)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * Get products
     *
     * @return \Entity\EcommerceBundle\Entity\Products
     */
    public function getProducts()
    {
        return $this->products;
    }
}
