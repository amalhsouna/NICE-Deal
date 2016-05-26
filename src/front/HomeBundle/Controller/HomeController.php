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
        return $this->render('frontHomeBundle:Home:index.html.twig');
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
}
