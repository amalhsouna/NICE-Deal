<?php

namespace back\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Controller for User.
 * 
 * @package backAdminBundle
 * 
 * @author Amal Hsouna
 */
class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('backAdminBundle:Default:index.html.twig');
    }
}
