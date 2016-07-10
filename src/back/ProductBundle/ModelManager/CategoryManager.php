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

class CategoryManager
{
    /**
     * return Registry $doctrine The doctrine.
     * 
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine          = $doctrine;
        $this->entityManagerEcommerce = $doctrine->getManager();
        $this->categoryRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Category');
        $this->subCategoryRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:SubCategory');
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
    
    /**
     * delete category.
     *
     * @param int $categoryId The category identifier
     *
     * @return array
     */
    public function deleteProductById($categoryId)
    {
        $product = $this->categoryRepository->findOneById($categoryId);
        if (!$product) {
            throw new NotFoundHttpException("Page not found");
        } else {
            return $this->categoryRepository->delete($product);
        }
    }
    
    /**
     * save subCategory
     */
    public function postSubCategory($subCategory)
    {
       return $this->subCategoryRepository->saveSubCategory($subCategory);
    }
   
}
