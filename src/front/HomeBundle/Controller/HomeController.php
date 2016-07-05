<?php

namespace front\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * Method homepage
     * 
     * @return type
     */
    public function indexAction()
    {
        $listProducts = $this->get('back_product.manager.products');
        $ProductsDeals = $listProducts->getProductsDeals();
        return $this->render('frontHomeBundle:Home:index.html.twig' , array('products' => $ProductsDeals));  
    }
    
    /**
     * Method contactpage.
     *
     * @return type
     */
    public function contactAction()
    {
        return $this->render('frontHomeBundle:Home:contact.html.twig');
    }
    
    /**
     * Update note.
     *
     * @param string $id The note identification.
     *
     * @return type
     */
    public function getDetailsProductsAction($id)
    {
       $listProducts = $this->get('back_product.manager.products');
       $ProductsDeals = $listProducts->getProductsById($id);
       return $this->render('frontHomeBundle:Home:productDetail.html.twig' , array('products' => $ProductsDeals));  
    }
    
}
