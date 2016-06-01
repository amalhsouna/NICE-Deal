<?php

namespace front\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CustomerController extends Controller
{
   
    public function indexAction()
    {
        return $this->render('frontCustomerBundle:Customer:index.html.twig');
    }
    
    public function registerCustomerAction()
    {
        return $this->render('frontCustomerBundle:Customer:register.html.twig');
    }
    
    /**
     * Add products.
     *
     * @var Request $request The current http request.
     * 
     * @return Response
     */
    public function postRegisterCustomerAction(Request $request)
    {
       $form        = $this->get('front_customer.customer.form');
       $formHandler = $this->get('front_customer.handler.add.customer');
        
       $processForm = $formHandler->process($request); 
        if ($processForm === true)
        {
            $this->get('session')->getFlashBag()->add('success', 'account.update_password.success.message');  
        }
        
        return $this->render('frontCustomerBundle:Customer:register.html.twig' , array('form' => $form->createView()));    
    }
}
