<?php

/**
 * Products form type.
 * 
 * @package backProductBundle
 * @author  Amal Hsouna
 */

namespace back\ProductBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use back\ProductBundle\Form\Type\ImagesFormType;
use back\ProductBundle\Form\Type\AddCategoryFormType;

/**
 * Products form type.
 * 
 * @package backProductBundle
 * @author Amal Hsouna
 */
class AddProductsFormType extends AbstractType
{

    /**
     * @var string
     */
    protected $class;
    
    /**
     * @var ImagesFormType
     */
    protected $imagesFormType;
    
    /**
     * @var AddCategoryFormType
     */
    protected $categoryFormType;

    /**
     * Constructor class.
     * 
     * @param string $class    The model for handle form type.
     * @param ImagesFormType   $imagesFormType The Images Form Type.
     * @param CategoryFormType $categoryFormType The Category Form Type.
     */
    public function __construct($class, ImagesFormType $imagesFormType,
                                AddCategoryFormType $categoryFormType)
    {
        $this->class  = $class;
        $this->imagesFormType  =   $imagesFormType;
        $this->categoryFormType  = $categoryFormType;
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
        $builder->add('name', 'text')
                ->add('price', 'integer')
                ->add('oldPrice', 'integer')
                ->add('description', 'textarea')
                ->add('creationDate', 'date')
                ->add('image', $this->imagesFormType, array('data_class' => 'Entity\EcommerceBundle\Entity\Images'))
                ->add('category', 'entity', array('class' => 'Entity\EcommerceBundle\Entity\Category', 'property' => 'name'  ))
                ->add('save', 'submit');
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
        return "products_form";
    }
}