<?php

/**
 * backProductBundle form handler.
 * 
 * @author Amal Hsouna
 */
namespace back\ProductBundle\Form\Handler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use Doctrine\Bundle\DoctrineBundle\Registry;
use back\ProductBundle\ModelManager\ProductManager;

/**
 * Update Partenary form handler.
 * 
 * @author  Amal Hsouna
 */
class UpdatePartenaryFormHandler
{
    /**
     * @var FormInterface
     */
    protected $form;

    /**
     * @var ProductManager
     */
    protected $productManager;

    /**
     * Constructor class.
     * 
     * @param Registry      $doctrine      The doctrine.
     * @param FormInterface $form          The form interface.
     * @param ProductManger $productManger The Product Manger.
     */
    public function __construct(FormInterface $form, ProductManager $productManger)
    {
        $this->form = $form;
        $this->productManger = $productManger;
    }

    /**
     * The process function for handler.
     * 
     * @param int     $id      The identifier.
     * @param Request $request The current request.
     * 
     * @return $response
     */
    public function process($id, Request $request)
    {
        $process = false;

        $partenary = $this->productManger->getDetailPartenary($id);
         if ('POST' == $request->getMethod()) {
            $this->form->handleRequest($request);
            if ($this->form->isValid()) {
                 $this->productManager->postPartenaryDeals($partenary);

                return $process = true;
            }
        }

        return $this->form->setData($partenary);
    }
}
