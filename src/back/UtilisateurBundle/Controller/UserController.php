<?php

namespace back\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Controller for User.
 * 
 * @package backUtilisateurBundle
 * 
 * @author Amal Hsouna
 */
class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('backUtilisateurBundle:Default:index.html.twig');
    }
}
