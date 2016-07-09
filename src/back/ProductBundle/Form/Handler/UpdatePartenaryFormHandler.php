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

use back\ProductBundle\ModelManager\ProductManager;

/**
 * Update Partenary form handler.
 * 
 * @package backProductBundle
 * @author  Amal Hsouna
 */
class UpdatePartenaryFormHandler
{

    /**
     * @var FormInterface
     */
    protected $form;
    
    /**
     * @var ProductManager
     */
    protected $productManager;

    /**
     * Constructor class.
     * 
     * @param Registry           $doctrine  The doctrine.
     * @param FormInterface      $form  The form interface.
     * @param ProductManger      $productManger  The Product Manger.
     */
    public function __construct(FormInterface $form, ProductManager $productManger)
    {   
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
        $partenary = $this->productManger->getDetailPartenary($id);
        
        $this->form->setData($partenary);
        if ('PUT' == $request->getMethod())
        {
            $this->form->handleRequest($request);
            if ($this->form->isValid())
            {
                var_dump('ffff');exit;
                 $this->productManger->saveProducts($partenary);
                 return true;
                
            }
        }
        return $this->form->setData($partenary);
         
    }

}
