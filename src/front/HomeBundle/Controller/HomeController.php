<?php

namespace front\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use front\HomeBundle\Form\Type\SearchCityFormType;

class HomeController extends Controller
{
    /**
     * Method homepage.
     * 
     * @return type
     */
    public function indexAction()
    {
        $listProducts = $this->get('back_product.manager.products');
        $ProductsDeals = $listProducts->getProductsByDate();

        return $this->render('frontHomeBundle:Home:index.html.twig', array('products' => $ProductsDeals));
    }

    /**
     * Method contactpage.
     *
     * @return type
     */
    public function contactAction()
    {
        $sendMessageCustomer = $this->get('front_home.manager.mail');
        $message = $sendMessageCustomer->sendEmailMessage();
        var_dump($message);exit;
        return $this->render('frontHomeBundle:Home:contact.html.twig');
    }

    /**
     * Details Products.
     *
     * @param string $id The products identification.
     *
     * @return type
     */
    public function getDetailsProductsAction($id)
    {
        $listProducts = $this->get('back_product.manager.products');
        $productsDeals = $listProducts->getProductsById($id);

        return $this->render('frontHomeBundle:Home:productDetail.html.twig', array('products' => $productsDeals));
    }

    /**
     * get menu Home Page.
     *
     * @return type
     */
    public function menuHomePageAction()
    {
        //       $listCategory = $this->get('front_home.manager.home');
//       $categoryDeals = $listCategory->getCategory();
       return $this->render('::includesFront/menuColumn.html.twig');
    }

    /**
     * Return a list of products by categories.
     *
     * @param $category name of categories
     * 
     * @return Response
     */
    public function getListProductByCategoryAction($category)
    {
        $listeCategoryManager = $this->get('back_product.manager.products');
        $dealList = $listeCategoryManager->getProductsByCategory($category);

        return $this->render('frontHomeBundle:Home:listDeal.html.twig', array('deal' => $dealList));
    }

    /**
     * Return a list of products by city.
     *
     * @param $city city of products
     * 
     * @return Response
     */
    public function searchAction()
    {
        $form = $this->get('form.factory')->create(new SearchCityFormType());
        return $this->render('::includesFront/searchCity.html.twig', array(
                    'form' => $form->createView(), ));
    }

    /**
     * Return a list of products by city.
     *
     * @param $city city of products
     * 
     * @return Response
     */
    public function searchByCityAction()
    {
        $listeCategoryManager = $this->get('front_home.manager.home');
//        $cle = $request->get('formre');
//        $test = $cle['NomREF'];
        $dealList = $listeCategoryManager->getProductByCity('tunis');
        $form = $this->get('form.factory')->create(new SearchCityFormType());

        return $this->render('frontHomeBundle:Home:listDeal.html.twig', array(
                    'form' => $form->createView(), 'deal' => $dealList,
        ));
    }
    
    /**
     * Return a list of products by city.
     *
     * @param $city city of products
     * 
     * @return Response
     */
    public function lowestPriceProductsAction()
    {
        $lowestPriceProducts = $this->get('front_home.manager.home');
        $priceProducts = $lowestPriceProducts->getLowestPriceProducts();

        return $this->render('frontHomeBundle:Home:listDeal.html.twig', array(
                              'deal' => $priceProducts,
        ));
    }
    
}
