<?php

namespace front\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * Method homepage
     */
    public function indexAction()
    {
        $listProducts = $this->get('back_product.manager.products');
        $ProductsDeals = $listProducts->getProductsDeals();
        
        return $this->render('frontHomeBundle:Home:index.html.twig' , array('products' => $ProductsDeals));  
    }
    
    /**
     * Method contactpage
     */
    public function contactAction()
    {
        return $this->render('frontHomeBundle:Home:contact.html.twig');
    }
    
    
    public function getDetailsProductsAction($id)
    {
       $listProducts = $this->get('back_product.manager.products');
       $ProductsDeals = $listProducts->getProductsById($id);
//var_dump($ProductsDeals);die;
//foreach ($ProductsDeals as $ProductsDeals){
//    
//}
       return $this->render('frontHomeBundle:Home:productDetail.html.twig' , array('products' => $ProductsDeals));  
    }
}
