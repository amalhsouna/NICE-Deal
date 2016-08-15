<?php

namespace back\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller for Home controller.
 * 
 * 
 * @author Amal Hsouna
 */

class HomeController extends Controller
{
    /**
     * Return a list of products.
     * 
     * @param Request $request The request query.
     * 
     * @return Response
     */
    public function menuLeftColumnAction()
    {
        $listProducts = $this->get('front_home.manager.home');
        $countDivers = $listProducts->getCountProducts();
        return $this->render('::includes/menuLeftColumn.html.twig' , 
                            array('countDivers' => $countDivers));
    }
}
