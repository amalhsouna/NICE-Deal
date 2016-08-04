<?php

/**
 * Manager of Product.
 *
 * @package ProductBundle
 * @author  Amal Hsouna
 */

namespace front\HomeBundle\ModelManager;

use Doctrine\ORM\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MailManager 
{
    /**
     * @var Mailer
     */
    protected $mailer;
    
    /**
     * @var templating
     */
    protected $templating;
     
    /**
     * return Registry $mailer The service mailer.
     * 
     */
    public function __construct($mailer, $templating)
    {
        $this->mailer = $mailer;
        $this->templating  = $templating;
    }
    
    /**
     * @param string $renderedTemplate
     * @param string $fromEmail
     * @param string $toEmail
     */
    public function sendEmailMessage()
    {
        $process = false;
        
        $from    = array("hsouna.amal@gmail.com" => "Espace amal");
        $emails  = array("amal.hsouna@tritux.com");
        if (!empty($emails))
        {
            $message = \Swift_Message::newInstance()
                ->setSubject('test - Problème de modification de compte')
                ->setFrom($from)
                ->setTo($emails)
                ->setBody($this->templating->render('frontHomeBundle:Home:test.html.twig'
                    ), 'text/html');
        
            $process = $this->mailer->send($message);
            
        }
        
        return $process;
    }
    
}