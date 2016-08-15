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
        $this->productsRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Products');
        $this->partenaryRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Partenary');
        $this->categoryRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Category');
        $this->userRepository = $this->entityManagerEcommerce->getRepository('backAdminBundle:User');
    }
    
    /**
     * return list of category and subCategory
     * 
     */
    public function getCategory()
    {
        return $this->subCategoryRepository->findCategory();
    }
    
    /**
     * return list of Product by city
     * 
     */
    public function getProductByCity($city)
    {
        return $this->productsRepository->findProductByCity($city);
    }
    
    /**
     * return list of Product by city
     * 
     */
    public function getLowestPriceProducts()
    {
        return $this->productsRepository->findLowestPriceProducts();
    }
    
    /**
     * return nbr of Product
     * 
     */
    public function getCountProducts()
    {
        $nbrProducts = $this->productsRepository->findCountProduct();
        $nbrPartenary = $this->partenaryRepository->findCountPartenary();
        $nbrCategory = $this->categoryRepository->findCountCategory();
        $nbrUser = $this->userRepository->findCountUser();
        return array('nbrProduct' => $nbrProducts, 'nbrPartenary' => $nbrPartenary, 'nbrCategory' => $nbrCategory, 'nbrUser' => $nbrUser);
    }
}