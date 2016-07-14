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

class CategoryController extends Controller
{
    /**
     * Return a list of products.
     *
     * @return Response
     */
    public function getListCategoryAction()
    {
       $listeCategoryManager = $this->get('back_product.manager.category');
       $categoryList = $listeCategoryManager->getCategoryDeals();
       return $this->render('backProductBundle:Products:listCategory.html.twig' , array('category' => $categoryList));  
    }
    
    /**
     * Add products.
     *
     * @var Request $request The current http request.
     * 
     * @return Response
     */
    public function postCategoryAction(Request $request)
    {
       $message='';
       $form        = $this->get('back_product.category.form');
       $formHandler = $this->get('back_product.handler.add.category');
        
       $processForm = $formHandler->process($request); 
        if ($processForm === true)
        {
            $this->get('session')->getFlashBag()->add('success', 'account.update_password.success.message'); 
            $message='Ajout effectuée avec succée';
        }
        
        return $this->render('backProductBundle:Products:addCategory.html.twig' , array('form' => $form->createView(), 'message' => $message));    
    }
       
    /**
     * delete category
     * 
     * @return true
     */
    public function deleteProductsAction($id)
    {
       $products = $this->get('back_product.manager.category');
       $products->deleteProductById($id);
       return $this->redirect($this->generateUrl('back_product_admin_list_products'));
    }
    
    /**
     * Add subCategory.
     *
     * @var Request $request The current http request.
     * 
     * @return Response
     */
    public function postSubCategoryAction(Request $request)
    {
       $message='';
       $form        = $this->get('back_product.sub.category.form');
       $formHandler = $this->get('back_product.handler.add.sub.category');
        
       $processForm = $formHandler->process($request); 
        if ($processForm === true)
        {
            $this->get('session')->getFlashBag()->add('success', 'account.update_password.success.message');  
            $message='Ajout effectuée avec succée';
        }
        
        return $this->render('backProductBundle:Products:addSubCategory.html.twig' , array('form' => $form->createView(), 'message' => $message));     
    }
   
    
    
}
