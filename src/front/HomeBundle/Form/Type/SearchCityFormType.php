<?php

/**
 * Search city form type.
 * 
 * @author  Amal Hsouna
 */
namespace front\HomeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Search city form type.
 * 
 * @author Amal Hsouna
 */
class SearchCityFormType extends AbstractType
{
    /**
     * Builds form.
     * 
     * @param FormBuilderInterface $builder The builder.
     * @param array                $options The array options.
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('city', 'choice', array(
                    'choices' => array('tunis' => 'Tunis', 'nabel' => 'Nabel'),
                    'required' => false, ));
    }

    /**
     * Returns the name of the form type.
     * 
     * @return string The form's name 
     */
    public function getName()
    {
        return 'search_form';
    }
}
