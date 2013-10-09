<?php

namespace kwak\PortfolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImagesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imgSet', 'entity', array(
                'class' => 'kwakPortfolioBundle:imgSets',
                'property' => 'title',
            ))
            ->add('file')
            ->add('submit', 'submit', array('label' => 'Create'));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'kwak\PortfolioBundle\Entity\Images'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kwak_portfoliobundle_images';
    }
}
