<?php

/**
 * ProductsRepository
 * 
 * @package EntityEcommerceBundle
 * @author Amal Hsouna
 */

namespace Entity\EcommerceBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Entity\EcommerceBundle\Entity\Category;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your products
 * repository methods below.
 * @package EntityEcommerceBundle
 * @author  Amal Hsouna
 */
 
class CategoryRepository extends EntityRepository
{
    /**
     * Finds all category.
     * 
     * @return array
     */
    public function findAllCategory()
    {
        $category = $this->findAll();
        
        return $category;
    }
    
    /**
     * Persists category.
     * 
     * @param Utilisateur $category The category model.
     * 
     * @return void
     */
    public function saveCategory(Category $category)
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($category);
        $entityManager->flush();
    }
}