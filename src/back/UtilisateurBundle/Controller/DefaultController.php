<?php

namespace back\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('backUtilisateurBundle:Default:index.html.twig');
    }
}
