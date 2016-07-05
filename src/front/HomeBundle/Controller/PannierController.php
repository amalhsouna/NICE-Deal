<?php

namespace front\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PannierController extends Controller
{
    /**
     * Return pannier of customer.
     * 
     * @return Response
     */
    public function pannierCustomerAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('front_customer_mon_pannier_page')) $session->set('front_customer_mon_pannier_page', array());
        $listProducts = $this->get('back_product.manager.products');
        $ProductsDeals = $listProducts->getProductsById(array_keys($session->get('front_customer_mon_pannier_page')));
        return $this->render('frontHomeBundle:Home:pannierCustomer.html.twig' , array('product' => $ProductsDeals, 'panier' => $session->get('front_customer_mon_pannier_page')));
       
    }
    
    /**
     * add Pannier of customer.
     * 
     * @return Response
     */
    public function addPannierAction($id)
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('front_customer_mon_pannier_page')) $session->set('front_customer_mon_pannier_page',array());
        $panier = $session->get('front_customer_mon_pannier_page');
       
        if (array_key_exists($id, $panier)) {
            if ($this->getRequest()->query->get('qte') != null) $panier[$id] = $this->getRequest()->query->get('qte');
            $this->get('session')->getFlashBag()->add('success','Quantité modifié avec succès');
        } else {
            if ($this->getRequest()->query->get('qte') != null)
                $panier[$id] = $this->getRequest()->query->get('qte');
            
            else
                $panier[$id] = 1;
            $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès');
        }
           
        $session->set('front_customer_mon_pannier_page',$panier);
        

        return $this->redirect($this->generateUrl('front_customer_mon_pannier_page'));
       
    }
    
    /**
     * Delete Pannier of customer.
     * 
     * @return Response
     */
    public function deletePannierCustomerAction($id)
    {
        $listProducts = $this->get('back_product.manager.products');
        $ProductsDeals = $listProducts->getProductsById($id);
        return $this->render('frontHomeBundle:Home:buyCustomer.html.twig' , array('product' => $ProductsDeals));
       
    }
}
