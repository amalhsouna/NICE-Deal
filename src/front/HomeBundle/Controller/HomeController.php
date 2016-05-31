<?php

namespace front\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $listProducts = $this->get('back_product.manager.products');
        $ProductsDeals = $listProducts->getProductsDeals();
        return $this->render('frontHomeBundle:Home:index.html.twig' , array('products' => $ProductsDeals));  
    }
    
    /**
     * @Route("/contact")
     */
    public function contactAction()
    {
        return $this->render('frontHomeBundle:Home:contact.html.twig');
    }
    
    /**
     * @Route("/detail/product")
     */
    public function productDetailAction()
    {
        return $this->render('frontHomeBundle:Home:productDetail.html.twig');
    }
    
    
    /**
     * @Route("/detail/product/{id}")
     */
    public function getDetailsProductsAction($id)
    {
       $listProducts = $this->get('back_product.manager.products');
       $ProductsDeals = $listProducts->getProductsById($id);
       return $this->render('frontHomeBundle:Home:productDetail.html.twig' , array('products' => $ProductsDeals));  
    }
}
