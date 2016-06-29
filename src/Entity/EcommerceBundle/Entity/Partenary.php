<?php

namespace Entity\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Entity\EcommerceBundle\Entity\Products;

/**
 * Partenary
 *
 * @ORM\Table(name="partenary")
 * @ORM\Entity(repositoryClass="Entity\EcommerceBundle\Entity\Repository\PartenaryRepository")
 */
class Partenary
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="map", type="string", length=255)
     */
    private $map;

    /**
     * @var string
     *
     * @ORM\Column(name="additionalInformation", type="string", length=255)
     */
    private $additionalInformation;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="Products", mappedBy="partenary", cascade={"persist"})
     */
    private $product;
    
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
     * @return Partenary
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
     * Set adresse
     *
     * @param string $adresse
     * @return Partenary
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Partenary
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    function getMap() {
        return $this->map;
    }

    function getAdditionalInformation() {
        return $this->additionalInformation;
    }

    function setMap($map) {
        $this->map = $map;
    }

    function setAdditionalInformation($additionalInformation) {
        $this->additionalInformation = $additionalInformation;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add product
     *
     * @param \Entity\EcommerceBundle\Entity\Products $product
     *
     * @return Partenary
     */
    public function addProduct(\Entity\EcommerceBundle\Entity\Products $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \Entity\EcommerceBundle\Entity\Products $product
     */
    public function removeProduct(\Entity\EcommerceBundle\Entity\Products $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduct()
    {
        return $this->product;
    }
}
