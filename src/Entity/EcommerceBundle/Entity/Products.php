<?php

namespace Entity\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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
     * Set name
     *
     * @param string $name
     * @return Products
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    
    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * Set price
     *
     * @param float $price
     * @return Products
     */
    public function setPrice($price)
    {
        $this->price = $price;

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
     * Set description
     *
     * @param string $description
     * @return Products
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return Date 
     */
    function getCreationDate() {
        return $this->creationDate;
    }
    
    /**
     * Set creationDate
     *
     * @param DateTime $creationDate
     * @return Products
     */
    function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }
    
    /**
     * @ORM\OneToOne(targetEntity="Entity\EcommerceBundle\Entity\Images", cascade={"persist"})
     */
    private $image;
    
    // Vos autres attributs…

    public function setImage(Images $image = null)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Entity\EcommerceBundle\Entity\Category", inversedBy="products", cascade={"persist"})
     * @ORM\JoinTable(name="categ_id",name="id")
     */
    private $category;
    
    // Vos autres attributs…

    public function setCategory(Category $category = null)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }
    
    


}
