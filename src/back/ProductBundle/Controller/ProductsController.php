<?php

namespace back\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller for Products customer.
 * 
 * 
 * @author Amal Hsouna
 */
class ProductsController extends Controller
{
    /**
     * Return a list of products.
     * 
     * @param Request $request The request query.
     * 
     * @return Response
     */
    public function getProductsAction(Request $request)
    {
        $listProducts = $this->get('back_product.manager.products');
        $ProductsDeals = $listProducts->getProductsDeals();
        $paginator = $this->get('knp_paginator');
        $paging = $paginator->paginate(
            $ProductsDeals, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('backProductBundle:Products:listProducts.html.twig', array('products' => $ProductsDeals, 'paging' => $paging));
    }

    /**
     * Add products.
     *
     * @param Request $request The current http request.
     * 
     * @return Response
     */
    public function postProductsAction(Request $request)
    {
        $message = '';
        $form = $this->get('back_product.products.form');
        $formHandler = $this->get('back_product.handler.add.products');

        $processForm = $formHandler->process($request);
        if ($processForm === true) {
            $this->get('session')->getFlashBag()->add('success', 'account.update_password.success.message');
            $message = 'Ajout effectuée avec succée';
        }

        return $this->render('backProductBundle:Products:addProducts.html.twig', array('form' => $form->createView(), 'message' => $message));
    }

    /**
     * put products.
     *
     * @var Request The current http request.
     * 
     * @return Response
     */
    public function putProductsAction($id, Request $request)
    {
        $message = '';
        $form = $this->get('back_product.products.form');
        $formHandler = $this->get('back_product.handler.update.products');

        $processForm = $formHandler->process($id, $request);
        if ($processForm === true) {
            $this->get('session')->getFlashBag()->add('success', 'account.update_password.success.message');
            $message = 'modification effectuée avec succès';
        }

        return $this->render('backProductBundle:Products:editProducts.html.twig', array(
        'form' => $form->createView(),
         'id' => $id, 'message' => $message,
        ));
    }

    /**
     * Return Details of products.
     *
     * @param  $id The product identifier.
     * 
     * @return Response
     */
    public function getDetailsProductsAdminAction($id)
    {
        $listProducts = $this->get('back_product.manager.products');
        $productsDeals = $listProducts->getProductsById($id);

        return $this->render('backProductBundle:Products:detailsProducts.html.twig', array('products' => $productsDeals));
    }

    /**
     * delete product.
     * 
     * @param  $id The product identifier.
     * 
     * @return true
     */
    public function deleteProductsAction($id)
    {
        $products = $this->get('back_product.manager.products');
        $products->deleteProductById($id);

        return $this->redirect($this->generateUrl('back_product_admin_list_products'));
    }

    /**
     * Add partenary.
     *
     * @var Request The current http request.
     * 
     * @return Response
     */
    public function postPartenaryAction(Request $request)
    {
        $message = '';
        $form = $this->get('back_product.partenary.form');
        $formHandler = $this->get('back_product.handler.add.partenary');

        $processForm = $formHandler->process($request);
        if ($processForm === true) {
            $this->get('session')->getFlashBag()->add('success', 'account.update_password.success.message');
            $message = 'Ajout effectuée avec succée';
        }

        return $this->render('backProductBundle:Products:addPartenary.html.twig', array('form' => $form->createView(), 'message' => $message));
    }

    /**
     * Return a list of partenary.
     * 
     * @var Request The current http request.
     * 
     * @return Response
     */
    public function getListPartenaryAction(Request $request)
    {
        $listProducts = $this->get('back_product.manager.products');
        $partenaryList = $listProducts->getListPartenary();
        $paginator = $this->get('knp_paginator');
        $paging = $paginator->paginate(
            $partenaryList, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('backProductBundle:Products:listPartenary.html.twig', array('partenary' => $partenaryList, 'paging' => $paging));
    }

    /**
     * Finds Products with the date has passed.
     *
     * @return array
     */
    public function getProductsByEndDateAction()
    {
        $listProducts = $this->get('back_product.manager.products');
        $pastDeal = $listProducts->getProductsByEndDate();

        return $this->render('frontHomeBundle:Home:listDeal.html.twig', array('deal' => $pastDeal));
    }

    /**
     * Return Details of Partenary.
     *
     * @return Response
     */
    public function getDetailPartenaryAdminAction($id)
    {
        $listPartenary = $this->get('back_product.manager.products');
        $partenaryDeals = $listPartenary->getDetailPartenary($id);

        return $this->render('backProductBundle:Products:detailsPartenary.html.twig', array('partenary' => $partenaryDeals));
    }

    /**
     * put partenary.
     *
     * @var Request The current http request.
     * 
     * @return Response
     */
    public function updatePartenaryAdminAction($id, Request $request)
    {
        $message = '';
        $form = $this->get('back_product.partenary.form');
        $formHandler = $this->get('back_product.handler.update.partenary');

        $processForm = $formHandler->process($id, $request);
        if ($processForm === true) {
            $this->get('session')->getFlashBag()->add('success', 'account.update_password.success.message');
        }

        return $this->render('backProductBundle:Products:editPartenary.html.twig', array(
        'form' => $form->createView(),
         'id' => $id,
         'message' => $message,
        ));
    }
}
