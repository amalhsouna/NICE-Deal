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
use back\ProductBundle\Form\Type\PartenaryFormType;
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
     * @var CkeditorFormType
     */
    protected $ckeditorFormType;
    
    /**
     * @var PartenaryFormType
     */
    protected $partenaryFormType;

    /**
     * Constructor class.
     * 
     * @param string $class     The model for handle form type.
     * @param ImagesFormType    $imagesFormType    The Images Form Type.
     * @param CategoryFormType  $categoryFormType  The Category Form Type.
     * @param CkeditorFormType  $ckeditorFormType  The  Ckeditor Form Type.
     * @param PartenaryFormType $partenaryFormType The  partenary Form Type.
     */
    public function __construct($class, ImagesFormType $imagesFormType,
                                AddCategoryFormType $categoryFormType, CkeditorFormType $ckeditorFormType, PartenaryFormType $partenaryFormType)
    {
        $this->class  = $class;
        $this->imagesFormType  =   $imagesFormType;
        $this->categoryFormType  = $categoryFormType;
        $this->ckeditorFormType  = $ckeditorFormType;
        $this->partenaryFormType  = $partenaryFormType;
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
                ->add('description', 'ckeditor')
                ->add('creationDate', 'date')
                ->add('endDate', 'date')
                ->add('place', 'choice', array(
                'choices' => array('tunis' => 'Grand tunis', 'nabeul' => 'Nabeul'),
                'preferred_choices' => array('tunis'),))
                ->add('image', 'collection', array('type' => $this->imagesFormType, 'allow_add' => true))
                ->add('category', 'entity', array('class' => 'Entity\EcommerceBundle\Entity\Category', 'property' => 'name'  ))
                ->add('partenary', $this->partenaryFormType)
                ->add('save', 'submit', array('label' => 'Ajouter', 'attr' => array('class' => 'btn btn-primary')));
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