<?php

namespace front\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
   
    public function indexAction()
    {
        return $this->render('frontHomeBundle:Home:index.html.twig');
    }
    
   
    public function contactAction()
    {
        return $this->render('frontHomeBundle:Home:contact.html.twig');
    }
    
   
    public function productDetailAction()
    {
        return $this->render('frontHomeBundle:Home:productDetail.html.twig');
    }
}
