<?php

/**
 * Products form type.
 * 
 * @package frontCustomerBundle
 * @author  Amal Hsouna
 */

namespace front\CustomerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType;

/**
 * Products form type.
 * 
 * @package frontCustomerBundle
 * @author Amal Hsouna
 */
class AddCustomerFormType extends AbstractType
{

    /**
     * @var string
     */
    protected $class;
    
    /**
     * @var RegistrationFormType
     */
    protected $registrationFormType;

    /**
     * Constructor class.
     * 
     * @param string $class  The model for handle form type.
     */
    public function __construct($class, RegistrationFormType $registrationFormType)
    {
        $this->class  = $class;
        $this->registrationFormType  = $registrationFormType;
        
    }

    /**
     * Builds form.
     * 
     * @param FormBuilderInterface $builder The builder.
     * @param array                $options The array options.
     * 
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'choice', array(
                      'choices' => array('0' => 'M.', '1' => 'Mme'),
                       'required' => false))
                ->add('lastName', 'text')
                ->add('address', 'text')
                ->add('telephone', 'integer')
                ->add('user', $this->registrationFormType ,array('data_class' => 'back\AdminBundle\Entity\User'));
    }

    /**
     * Sets options as model for current form type.
     * 
     * @param OptionsResolverInterface $resolver The resolver instance.
     * 
     * @return void
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => $this->class,
            'csrf_protection'    => false,
            'cascade_validation' => true)
        );
    }

    /**
     * Returns the name of the form type.
     * 
     * @return string The form's name 
     */
    public function getName()
    {
        return "customer_form";
    }
}