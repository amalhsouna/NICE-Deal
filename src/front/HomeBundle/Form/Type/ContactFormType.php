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
class ContactFormType extends AbstractType
{
    /**
     * Builds form.
     * 
     * @param FormBuilderInterface $builder The builder.
     * @param array                $options The array options.
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', 'text')
                ->add('lastName', 'text')
                ->add('email', 'text')
                ->add('subject', 'text')
                ->add('message', 'text');
    }

    /**
     * Returns the name of the form type.
     * 
     * @return string The form's name 
     */
    public function getName()
    {
        return 'contact_form';
    }
}
