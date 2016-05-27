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
    /**
     * return Registry $doctrine The doctrine.
     * 
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine             = $doctrine;
        $this->entityManagerEcommerce = $doctrine->getManager();
        $this->productRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Products');
    }
    
    /**
     * return list of products
     * 
     */
    public function getProductsDeals()
    {
        $arboMenuRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Products');
        return $arboMenuRepository->findAllProducts();
    }
    
    /**
     * post products
     * 
     */
    public function postProductsDeals($products)
    {
        
        return $this->productRepository>saveProducts($products);
    }
    
    /**
     * post products
     * 
     */
    public function getProductsById($id)
    {
        
        return $this->productRepository>findProductsById($id);
    }
}
