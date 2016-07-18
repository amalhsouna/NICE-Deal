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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;;

class MailManager 
{
    /**
     * @var Mailer
     */
    protected $mailer;
     
    /**
     * return Registry $mailer The service mailer.
     * 
     */
    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }
    
    /**
     * @param string $renderedTemplate
     * @param string $fromEmail
     * @param string $toEmail
     */
    public function sendEmailMessage($fromEmail = "elhem.hsouna@gmail.com", $toEmail ="hsouna.amal@gmail.com")
    {
        // Render the email, use the first line as the subject, and the rest as the body
        $renderedLines = "dsdsdsdsdsdsds";
        $subject = $renderedLines[0];
        $body = "ttt";

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($fromEmail)
            ->setTo($toEmail)
            ->setBody($body);
        return $this->mailer->send($message);
    }
    
}