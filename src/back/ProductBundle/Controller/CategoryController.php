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
       $form        = $this->get('back_product.category.form');
       $formHandler = $this->get('back_product.handler.add.category');
        
       $processForm = $formHandler->process($request); 
        if ($processForm === true)
        {
            $this->get('session')->getFlashBag()->add('success', 'account.update_password.success.message');  
        }
        
        return $this->render('backProductBundle:Products:addCategory.html.twig' , array('form' => $form->createView()));    
    }
    
}
