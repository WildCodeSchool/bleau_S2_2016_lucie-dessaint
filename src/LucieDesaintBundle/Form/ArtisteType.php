<?php

namespace LucieDesaintBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtisteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('textepresentationFr', TextareaType::class, array(
                'label' => "Texte de présentation en français",
                'attr' => array(
                    'rows' => '10',
                    'cols' => '65'
            )))
            ->add('textepresentationEn', TextareaType::class, array(
                'label' => "Texte de présentation en anglais",
                'attr' => array(
                    'rows' => '10',
                    'cols' => '65'
            )))
            ->add('image', ImagesType::class, array(
                'label' => "Photo de profil"
            ))
        ;

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LucieDesaintBundle\Entity\Artiste'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'luciedesaintbundle_artiste';
    }


}
