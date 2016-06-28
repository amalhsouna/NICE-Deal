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
    public function getProductsAction(Request $request)
    {
       $listProducts = $this->get('back_product.manager.products');
       $ProductsDeals = $listProducts->getProductsDeals();
       $paginator  = $this->get('knp_paginator');
       $paging = $paginator->paginate(
            $ProductsDeals, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
       return $this->render('backProductBundle:Products:listProducts.html.twig' , array('products' => $ProductsDeals,'paging' => $paging));  
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
    
    /**
     * delete product
     * 
     * @return true
     */
    public function deleteProductsAction($id)
    {
       $products = $this->get('back_product.manager.products');
       $products->deleteProductById($id);
       return $this->redirect($this->generateUrl('back_product_admin_list_products'));
    }
    
    /**
     * Add partenary.
     *
     * @var Request $request The current http request.
     * 
     * @return Response
     */
    public function postPartenaryAction(Request $request)
    {
       $message='';
       $form        = $this->get('back_product.partenary.form');
       $formHandler = $this->get('back_product.handler.add.partenary');

       $processForm = $formHandler->process($request);
        if ($processForm === true)
        {
            
            $this->get('session')->getFlashBag()->add('success', 'account.update_password.success.message'); 
            $message='Ajout effectuée avec succée';
        }
        
        return $this->render('backProductBundle:Products:addPartenary.html.twig' , array('form' => $form->createView(), 'message' => $message));    
    }
    
    /**
     * Return a list of partenary.
     *
     * @return Response
     */
    public function getListPartenaryAction(Request $request)
    {
       $listProducts = $this->get('back_product.manager.products');
       $partenaryList = $listProducts->getListPartenary();
       $paginator  = $this->get('knp_paginator');
       $paging = $paginator->paginate(
            $partenaryList, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
       return $this->render('backProductBundle:Products:listPartenary.html.twig' , array('partenary' => $partenaryList,'paging' => $paging));  
    }
    
}
