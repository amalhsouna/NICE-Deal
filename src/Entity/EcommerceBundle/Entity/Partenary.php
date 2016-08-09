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
     * @var integer
     *
     * @ORM\Column(name="mapV1", type="float")
     */
    private $mapV1;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="mapV2", type="float")
     */
    private $mapV2;

    /**
     * @var string
     *
     * @ORM\Column(name="additionalInformation", type="string", length=255)
     */
    private $additionalInformation;
    
    /** 
     * 
     * @ORM\OneToOne(targetEntity="Entity\EcommerceBundle\Entity\Images", cascade={"persist"})
     * @ORM\JoinTable(name="img_id",name="id")
     */
    private $image;
   
    
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


    function getAdditionalInformation() {
        return $this->additionalInformation;
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

    /**
     * Set mapV1
     *
     * @param integer $mapV1
     *
     * @return Partenary
     */
    public function setMapV1($mapV1)
    {
        $this->mapV1 = $mapV1;

        return $this;
    }

    /**
     * Get mapV1
     *
     * @return integer
     */
    public function getMapV1()
    {
        return $this->mapV1;
    }

    /**
     * Set mapV2
     *
     * @param integer $mapV2
     *
     * @return Partenary
     */
    public function setMapV2($mapV2)
    {
        $this->mapV2 = $mapV2;

        return $this;
    }

    /**
     * Get mapV2
     *
     * @return integer
     */
    public function getMapV2()
    {
        return $this->mapV2;
    }
}
