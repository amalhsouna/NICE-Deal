<?php

/**
 * backProductBundle form handler.
 * 
 * @package backProductBundle
 * @author Amal Hsouna
 */

namespace front\HomeBundle\Form\Handler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;

use front\HomeBundle\ModelManager\MailManager;

/**
 * Add Products form handler.
 * 
 * @package backProductBundle
 * @author  Amal Hsouna
 */
class ContactFormHandler
{

    /**
     * @var FormInterface
     */
    protected $form;
    
    /**
     * @var MailManager
     */
    protected $mailManager;

    /**
     * Constructor class.
     * 
     * @param MailManager $mailManager  The mail Manager.
     */
    public function __construct(FormInterface $form, MailManager $mailManager)
    {   
        $this->form = $form;
        $this->mailManager = $mailManager;
    }

    /**
     * The process function for handler.
     * 
     * @param Request $request The current request.
     * 
     * @return $response
     */
    public function process(Request $request)
    {
        $process  = false;
        
        if ('POST' == $request->getMethod())
        {
            $this->form->handleRequest($request);
            if ($this->form->isValid())
            {
                $test = $this->mailManager->sendEmailMessage();
                var_dump($test);exit;
                
            }
        }
        return $process; 
         
    }

}
