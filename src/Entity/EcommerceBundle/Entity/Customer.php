<?php

namespace Entity\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use back\AdminBundle\Entity\User;

/**
 * Products
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
     * @ORM\Column(name="test", type="string", length=150)
     */
    private $test;
    
    /**
     * @ORM\OneToOne(targetEntity="back\AdminBundle\Entity\User", cascade={"persist"})
     */
    protected $user;
            
    function getTest() {
        return $this->test;
    }
    
    function getId() {
        return $this->id;
    }
    function setTest($test) {
        $this->test = $test;
    }
    
    // Vos autres attributs…

    public function setUser(User $user = null)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
}

