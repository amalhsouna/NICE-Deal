<?php

namespace Entity\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use back\AdminBundle\Entity\User;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="Entity\EcommerceBundle\Entity\Repository\CustomerRepository")
 */
class Customer
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=10)
     */
    private $title;
    
    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=150)
     */
    private $lastName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=100)
     */
    private $address;
    
    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;
    
    /**
     * @ORM\OneToOne(targetEntity="back\AdminBundle\Entity\User", cascade={"persist"})
     */
    protected $user;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="Entity\EcommerceBundle\Entity\Orders", mappedBy="customer", cascade={"persist"})
     */
    private $orders;
  
    // Vos autres attributs…

    public function setUser(User $user = null)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
    
    function getTitle() {
        return $this->title;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getAddress() {
        return $this->address;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add order
     *
     * @param \Entity\EcommerceBundle\Entity\Orders $order
     *
     * @return Customer
     */
    public function addOrder(\Entity\EcommerceBundle\Entity\Orders $order)
    {
        $this->orders[] = $order;

        return $this;
    }

    /**
     * Remove order
     *
     * @param \Entity\EcommerceBundle\Entity\Orders $order
     */
    public function removeOrder(\Entity\EcommerceBundle\Entity\Orders $order)
    {
        $this->orders->removeElement($order);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrders()
    {
        return $this->orders;
    }
}
