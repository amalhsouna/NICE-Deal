<?php

/**
 * Payment Controller.
 *
 * @author  Amal Hsouna
 */
namespace front\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MoneyController extends Controller
{
    /**
     * Method cash payment.
     * 
     * @return type
     */
    public function cachPaymentProductAction()
    {
        return $this->render('frontHomeBundle:Home:cashPayment.html.twig');
    }
}
