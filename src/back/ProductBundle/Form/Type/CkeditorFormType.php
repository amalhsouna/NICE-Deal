<?php

/**
 * Ckeditor form type.
 * 
 * @package backProductBundle
 * @author  Amal Hsouna
 */

namespace back\ProductBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Ckeditor form type.
 * 
 * @package backProductBundle
 * @author Amal Hsouna
 */
class CkeditorFormType extends AbstractType
{
   
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'attr' => array('class' => 'ckeditor') // On ajoute la classe
    ));
  }

  public function getParent() // On utilise l'héritage de formulaire
  {
    return 'textarea';
  }

  public function getName()
  {
    return 'ckeditor';
  }
    
}