<?php

namespace Entity\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Entity\EcommerceBundle\Entity\Repository\CategoryRepository")
 */
class Category
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
     * @var
     *
     * @ORM\OneToMany(targetEntity="Entity\EcommerceBundle\Entity\Category", mappedBy="category", cascade={"persist"})
     */
    private $subCategory;

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
     * @return Category
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
     * Constructor
     */
    public function __construct()
    {
        $this->subCategory = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add subCategory
     *
     * @param \Entity\EcommerceBundle\Entity\Category $subCategory
     *
     * @return Category
     */
    public function addSubCategory(\Entity\EcommerceBundle\Entity\Category $subCategory)
    {
        $this->subCategory[] = $subCategory;

        return $this;
    }

    /**
     * Remove subCategory
     *
     * @param \Entity\EcommerceBundle\Entity\Category $subCategory
     */
    public function removeSubCategory(\Entity\EcommerceBundle\Entity\Category $subCategory)
    {
        $this->subCategory->removeElement($subCategory);
    }

    /**
     * Get subCategory
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }
}
