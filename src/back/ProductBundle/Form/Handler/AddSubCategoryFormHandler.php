<?php

/**
 * backProductBundle form handler.
 * 
 * @package backProductBundle
 * @author Amal Hsouna
 */

namespace back\ProductBundle\Form\Handler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use Doctrine\Bundle\DoctrineBundle\Registry;

use Entity\EcommerceBundle\Entity\SubCategory;
use back\ProductBundle\ModelManager\CategoryManager;

/**
 * Add Category form handler.
 * 
 * @package backProductBundle
 * @author  Amal Hsouna
 */
class AddSubCategoryFormHandler
{

    /**
     * @var FormInterface
     */
    protected $form;
    
    /**
     * @var CategoryManager
     */
    protected $categoryManager;

    /**
     * Constructor class.
     * 
     * @param Registry           $doctrine  The doctrine.
     * @param FormInterface      $form  The form interface.
     * @param CategoryManager    $categoryManager  The Category Manger.
     */
    public function __construct(FormInterface $form, CategoryManager $categoryManager)
    {   
        $this->form = $form;
        $this->categoryManager = $categoryManager;
    }

    /**
     * The process function for handler.
     * 
     * @param Request $request The current request.
     * 
     * @return $response
     */
    public function process(Request $request)
    {
        $process  = false;
        
        $subCategory = new SubCategory();
                
        $this->form->setData($subCategory);
        if ('POST' == $request->getMethod())
        {
            $this->form->handleRequest($request);
            if ($this->form->isValid())
            {
                $this->categoryManager->postCategoryDeals($subCategory);
                return $process = true;
            }
        }
        return $process;
         
    }

}
