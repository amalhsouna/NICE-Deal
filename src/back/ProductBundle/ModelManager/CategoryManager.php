<?php

/**
 * Manager of Product.
 *
 * @package ProductBundle
 * @author  Amal Hsouna
 */

namespace back\ProductBundle\ModelManager;

use Doctrine\ORM\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Registry;

class CategoryManager
{
    public function __construct(Registry $doctrine)
    {
        $this->doctrine             = $doctrine;
        $this->entityManagerEcommerce = $doctrine->getManager();
        $this->categoryRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Category');
    }
    
    /**
     * return list of category
     */
    public function getCategoryDeals()
    {
        return  $this->categoryRepository->findAllCategory();
    }
    
    /**
     * save category
     */
    public function postCategoryDeals($category)
    {
       return $this->categoryRepository->saveCategory($category);
    }
}
