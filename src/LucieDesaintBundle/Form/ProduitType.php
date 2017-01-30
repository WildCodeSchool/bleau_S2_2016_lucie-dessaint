<?php

namespace LucieDesaintBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreFr', TextType::class, array(
                'label' => 'Titre en français'
            ))
            ->add('titreEn', TextType::class, array(
                'label' => 'Titre en anglais'
            ))
            ->add('infoFr', TextareaType::class, array(
                'label' => 'Info en français',
                'attr' => array(
                    'rows' => '5',
                    'cols' => '50'
            )))
            ->add('infoEn', TextareaType::class, array(
                'label' => 'Info en anglais',
                'attr' => array(
                'rows' => '5',
                'cols' => '50'
            )))
            ->add('prix')
            ->add('categorie')
            ->add('image', ImagesType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LucieDesaintBundle\Entity\Produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'luciedesaintbundle_produit';
    }

}
