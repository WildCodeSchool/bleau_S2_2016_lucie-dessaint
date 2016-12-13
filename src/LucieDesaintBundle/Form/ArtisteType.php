<?php

namespace LucieDesaintBundle\Form;

use Symfony\Component\Form\AbstractType;
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
            ->add('textepresentation', 'textarea')  //texte de presentation
            ->add('textback', 'file', array('label' => 'image (fichier JPG)', 'data_class' => null, 'required' => null))           //insertion d'image
            ->add('textback2')          //nom de l'image à inserer

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
