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

use back\ProductBundle\ModelManager\ProductManger;

/**
 * Update Products form handler.
 * 
 * @package backProductBundle
 * @author  Amal Hsouna
 */
class UpdateProductsFormHandler
{

    /**
     * @var FormInterface
     */
    protected $form;
    
    /**
     * @var ProductManger
     */
    protected $productManger;

    /**
     * Constructor class.
     * 
     * @param Registry           $doctrine  The doctrine.
     * @param FormInterface      $form  The form interface.
     * @param ProductManger      $productManger  The Product Manger.
     */
    public function __construct(Registry $doctrine, FormInterface $form, ProductManger $productManger)
    {   
        $this->doctrine = $doctrine;
        $this->entityManagerProducts = $doctrine->getManager();
        $this->form = $form;
        $this->productManger = $productManger;
       
    }

    /**
     * The process function for handler.
     * 
     * @param integer $id The identifier.
     * @param Request $request The current request.
     * 
     * @return $response
     */
    public function process($id, Request $request)
    {
       $products = $this->productManger->getProductsById($id);
                
        $this->form->setData($products);
        if ('PUT' == $request->getMethod())
        {
            $this->form->handleRequest($request);
            if ($this->form->isValid())
            {
                return $this->productManger->saveProducts($products);
            }
        }
        return false;
         
    }

}
