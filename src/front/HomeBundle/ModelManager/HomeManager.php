<?php

/**
 * Manager of Product.
 *
 * @package ProductBundle
 * @author  Amal Hsouna
 */

namespace front\HomeBundle\ModelManager;

use Doctrine\ORM\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeManager
{
    /**
     * return Registry $doctrine The doctrine.
     * 
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->entityManagerEcommerce = $doctrine->getManager();
        $this->subCategoryRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:SubCategory');
    }
    
    /**
     * return list of category and subCategory
     * 
     */
    public function getCategory()
    {
        return $this->subCategoryRepository->findCategory();
    }
}