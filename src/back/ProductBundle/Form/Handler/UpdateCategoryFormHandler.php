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
use back\ProductBundle\ModelManager\CategoryManager;

/**
 * Add Category form handler.
 * 
 * @author  Amal Hsouna
 */
class UpdateCategoryFormHandler
{
    /**
     * @var FormInterface
     */
    protected $form;

    /**
     * @var CategoryManager
     */
    protected $categoryManager;

    /**
     * Constructor class.
     * 
     * @param Registry        $doctrine        The doctrine.
     * @param FormInterface   $form            The form interface.
     * @param CategoryManager $categoryManager The Category Manger.
     */
    public function __construct(FormInterface $form, CategoryManager $categoryManager)
    {
        $this->form = $form;
        $this->categoryManager = $categoryManager;
    }

    /**
     * The process function for handler.
     * 
     * @param Request $request The current request.
     * 
     * @return $response
     */
    public function process($id, Request $request)
    {
        $process = false;

        $category = $this->categoryManager->getDetailCategory($id);

        $this->form->setData($category);

        if ('POST' == $request->getMethod()) {
            $this->form->handleRequest($request);
            if ($this->form->isValid()) {
                $this->categoryManager->postCategoryDeals($category);

                return $process = true;
            }
        }

        return $process;
    }
}
