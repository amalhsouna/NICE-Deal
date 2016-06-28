<?php

namespace front\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CustomerController extends Controller
{
   
    /**
     * My compte.
     *
     * @return Response
     */
    public function indexAction()
    {
        
        $form = $this->get('front_customer.customer.form');
        return $this->render('frontCustomerBundle:Customer:login.html.twig');
    }
    
    /**
     * My compte.
     *
     * @return Response
     */
    public function myCompteAction()
    {
        return $this->render('frontCustomerBundle:Customer:showProfil.html.twig');
    }
    
    /**
     * My orders.
     * 
     * @return Response
     */
    public function myOrdersAction($customer)
    {
        $customerManager = $this->get('front_customer.manager.customer');
        $listOrder = $customerManager->listOrdersbyCustomer($customer);
        $countResult = count($listOrder);
        return $this->render('frontCustomerBundle:Customer:showOrders.html.twig', array("listOrder" => $listOrder,
                            'countResult' => $countResult));
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
    
    /**
     * get information of customer.
     * 
     * @return Response
     */
    public function getInfoCustomerAction()
    {
        $user = $this->getUser();
        if (!is_object($user)) {
           
        }
        return $this->render('frontCustomerBundle:Customer:showProfil.html.twig', array(
            'user' => $user
        ));
       
    }
 
    
}
