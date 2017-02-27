<?php

/**
 * Manager of Product.
 *
 * @package ProductManger
 * @author  Amal Hsouna
 */

namespace back\ProductBundle\ModelManager;

use Doctrine\ORM\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Registry;

class ProductManger
{
    /**
     * ProductManger constructor.
     * @param Registry $doctrine
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->entityManagerEcommerce = $doctrine->getManager();
    }

    /**
     * Return list of products
     *
     * @return mixed
     */
    public function getProductsDeals()
    {
        $arboMenuRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Products');
        return $arboMenuRepository->findAllZipCodes();
    }
}
