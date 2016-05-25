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

class CategoryManger
{
    public function __construct(Registry $doctrine)
    {
        $this->doctrine             = $doctrine;
        $this->entityManagerEcommerce = $doctrine->getManager();
    }
    
    /**
     * return list of products
     * @throws \Exception
     */
    public function getCategoryDeals()
    {
        $arboMenuRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Category');
        return $arboMenuRepository->findAllCategory();
    }
}
