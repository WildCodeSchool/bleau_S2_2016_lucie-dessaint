<?php

namespace LucieDesaintBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActualitesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('textFr', TextareaType::class, array(
                'label' => 'Text en français',
                'attr' => array(
                    'rows' => '10',
                    'cols' => '65'
                )
            ))
            ->add('textEn', TextareaType::class, array(
                'label' => 'Text en anglais',
                'attr' => array(
                    'rows' => '10',
                    'cols' => '65'
                )
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LucieDesaintBundle\Entity\Actualites'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'luciedesaintbundle_actualites';
    }


}
