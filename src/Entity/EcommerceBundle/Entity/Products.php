<?php

namespace Entity\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Entity\EcommerceBundle\Entity\Partenary;

/**
 * Products.
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="Entity\EcommerceBundle\Entity\Repository\ProductsRepository")
 */
class Products
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
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="old_price", type="float")
     */
    private $oldPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="date")
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=50)
     */
    private $place;
    
    /**
     * @var 
     * 
     * @ORM\OneToMany(targetEntity="Entity\EcommerceBundle\Entity\Images", mappedBy="product", cascade={"persist"})
     */
    private $image;
    
    /**
     * @ORM\OneToOne(targetEntity="Entity\EcommerceBundle\Entity\Category", cascade={"persist"})
     * @ORM\JoinTable(name="categ_id",name="id")
     */
    private $category;
    
    /**
     * @ORM\ManyToOne(targetEntity="Entity\EcommerceBundle\Entity\Partenary", inversedBy="product", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="partenary_id", referencedColumnName="id")
     */
    private $partenary;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Products
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set price.
     *
     * @param float $price
     *
     * @return Products
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Products
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get creationDate.
     *
     * @return Date
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set creationDate.
     *
     * @param DateTime $creationDate
     *
     * @return Products
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * Get place.
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set place.
     *
     * @param string $place
     *
     * @return Products
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }
  
    /**
     * Get image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Add image.
     *
     * @param \Entity\EcommerceBundle\Entity\Image $image
     *
     * @return image
     */
    public function addImage($image)
    {
        if (!$this->image->contains($image)) {
            $this->image[] = $image;
            return $this;
        }
    }

    /**
     * Remove Date.
     *
     * @param \Entity\EcommerceBundle\Entity\Image $image
     */
    public function removeImage($image)
    {
        if ($this->days->contains($image)) {
            $this->days->remove($image);
        }
    }

    // Vos autres attributs…

    public function setCategory(Category $category = null)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getOldPrice()
    {
        return $this->oldPrice;
    }

    public function setOldPrice($oldPrice)
    {
        $this->oldPrice = $oldPrice;
    }
    
    // Vos autres attributs…

    public function setPartenary(Partenary $partenary = null)
    {
        $this->partenary = $partenary;
    }

    public function getPartenary()
    {
        return $this->partenary;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->image = new ArrayCollection();
    }

}
