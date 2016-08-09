<?php

/**
 * SubCategory form type.
 * 
 * @package backProductBundle
 * @author  Amal Hsouna
 */

namespace back\ProductBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * SubCategory form type.
 * 
 * @package backProductBundle
 * @author Amal Hsouna
 */
class AddSubCategoryFormType extends AbstractType
{

    /**
     * @var string
     */
    protected $class;
   

    /**
     * Constructor class.
     * 
     * @param string $class  The model for handle form type.
     * 
     */
    public function __construct($class)
    {
        $this->class  = $class;
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
        $builder->add('subName', 'text')
                ->add('category', 'entity', array('class' => 'Entity\EcommerceBundle\Entity\Category', 'property' => 'name'  ));
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
        return "category_form";
    }
}