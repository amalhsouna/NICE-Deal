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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductManager
{
    /**
     * return Registry $doctrine The doctrine.
     * 
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->entityManagerEcommerce = $doctrine->getManager();
        $this->productRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Products');
        $this->partenaryRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Partenary');
    }
    
    /**
     * return list of products
     * 
     */
    public function getProductsDeals()
    {
        return $this->productRepository->findAllProducts();
    }
    
    /**
     * post products
     * 
     */
    public function postProductsDeals($products)
    {
        return $this->productRepository->saveProducts($products);
    }
    
    /**
     * get products by id
     * 
     */
    public function getProductsById($id)
    {
        return $this->productRepository->findProductsById($id);
    }
    
    /**
     * delete product.
     *
     * @param int $productId The product identifier
     *
     * @return array
     */
    public function deleteProductById($productId)
    {
        $product = $this->productRepository->findOneById($productId);
        if (!$product) {
            throw new NotFoundHttpException("Page not found");
        } else {
            return $this->productRepository->delete($product);
        }
    }
    
    /**
     * post partenary
     * 
     * @param int $partenary The partenary identifier
     */
    public function postPartenaryDeals($partenary)
    {
        return $this->partenaryRepository->savePartenary($partenary);
    }
    
     /**
     * return list of products
     * 
     */
    public function getListPartenary()
    {
        return $this->partenaryRepository->findAllPartenary();
    }
    
}
