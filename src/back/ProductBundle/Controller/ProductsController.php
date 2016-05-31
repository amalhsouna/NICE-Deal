<?php

namespace back\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller for Products customer.
 * 
 * @package backProductBundle
 * 
 * @author Amal Hsouna
 */

class ProductsController extends Controller
{
    /**
     * Return a list of products.
     *
     * @return Response
     */
    public function getProductsAction()
    {
       $listProducts = $this->get('back_product.manager.products');
       $ProductsDeals = $listProducts->getProductsDeals();
       return $this->render('backProductBundle:Products:listProducts.html.twig' , array('products' => $ProductsDeals));  
    }
    
    /**
     * Add products.
     *
     * @var Request $request The current http request.
     * 
     * @return Response
     */
    public function postProductsAction(Request $request)
    {
       $form        = $this->get('back_product.products.form');
       $formHandler = $this->get('back_product.handler.add.products');
        
       $processForm = $formHandler->process($request); 
        if ($processForm === true)
        {
            $this->get('session')->getFlashBag()->add('success', 'account.update_password.success.message');  
        }
        
        return $this->render('backProductBundle:Products:addProducts.html.twig' , array('form' => $form->createView()));    
    }
    
    /**
     * put products.
     *
     * @var Request $request The current http request.
     * 
     * @return Response
     */
    public function putProductsAction($id, Request $request)
    {
       $form        = $this->get('back_product.products.form');
       $formHandler = $this->get('back_product.handler.update.products');
        
       $processForm = $formHandler->process($id, $request); 
        if ($processForm === true)
        {
            $this->get('session')->getFlashBag()->add('success', 'account.update_password.success.message');  
        }
        
        return $this->render('backProductBundle:Products:editProducts.html.twig' , array(
        'form' => $form->createView(),
         'id' => $id
        ));    
    }
    
    /**
     * Return Details of products.
     *
     * @return Response
     */
    public function getDetailsProductsAdminAction($id)
    {
       $listProducts = $this->get('back_product.manager.products');
       $ProductsDeals = $listProducts->getProductsById($id);
       return $this->render('backProductBundle:Products:detailsProducts.html.twig' , array('products' => $ProductsDeals));  
    }
    
    
  
}
