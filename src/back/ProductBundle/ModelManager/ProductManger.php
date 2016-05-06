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

class ProductManger
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
    public function getProductsDeals()
    {
        $arboMenuRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Products');
        return $arboMenuRepository->findAllZipCodes();
    }
}
