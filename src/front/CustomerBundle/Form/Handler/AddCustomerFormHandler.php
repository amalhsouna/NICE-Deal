<?php

/**
 * frontCustomerBundle form handler.
 * 
 * @package frontCustomerBundle
 * @author Amal Hsouna
 */

namespace front\CustomerBundle\Form\Handler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use Doctrine\Bundle\DoctrineBundle\Registry;

use Entity\EcommerceBundle\Entity\Customer;
use front\CustomerBundle\ModelManager\CustomerManger;

/**
 * Add Customer form handler.
 * 
 * @package frontCustomerBundle
 * @author  Amal Hsouna
 */
class AddCustomerFormHandler
{

    /**
     * @var FormInterface
     */
    protected $form;
    
    /**
     * @var CustomerManger
     */
    protected $customerManger;

    /**
     * Constructor class.
     * 
     * @param Registry           $doctrine  The doctrine.
     * @param FormInterface      $form  The form interface.
     * @param CustomerManger     $customerManger  The customer Manger.
     */
    public function __construct(FormInterface $form, CustomerManger $customerManger)
    {   
    
        $this->form = $form;
        $this->customerManger = $customerManger;
       
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
        
        $customer = new Customer();
        $this->form->setData($customer);
        if ('POST' == $request->getMethod())
        {
            $this->form->handleRequest($request);
            if ($this->form->isValid())
            {
                return $this->customerManger->postCustomerDeals($customer);
            }
        }
        return false;
         
    }

}
