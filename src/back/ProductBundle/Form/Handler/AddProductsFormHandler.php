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

use Entity\EcommerceBundle\Entity\Products;

/**
 * Add Products form handler.
 * 
 * @package backProductBundle
 * @author  Amal Hsouna
 */
class AddProductsFormHandler
{

    /**
     * @var FormInterface
     */
    protected $form;

    /**
     * Constructor class.
     * 
     * @param Registry           $doctrine  The doctrine.
     * @param FormInterface      $form  The form interface.
     */
    public function __construct(Registry $doctrine, FormInterface $form)
    {   
        $this->doctrine               = $doctrine;
        $this->entityManagerProducts = $doctrine->getManager();
        $this->form = $form;
       
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
        
        $products = new Products();
                
        $this->form->setData($products);
        if ('POST' == $request->getMethod())
        {
            $this->form->handleRequest($request);
            if ($this->form->isValid())
            {
                $productsRepository = $this->entityManagerProducts->getRepository('EntityEcommerceBundle:Products');
                return $productsRepository->saveProducts($products);
            }
        }
        return false;
         
    }

}
