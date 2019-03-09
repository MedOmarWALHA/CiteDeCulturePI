<?php

namespace BibliothequeBundle\Form;

use BibliothequeBundle\BibliothequeBundle;
use BibliothequeBundle\Entity\livre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class livreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')
            ->add('langue')
            ->add('annee')
            ->add('nombrepage')
            ->add('dateparution')
            ->add('nombreexemplaire')
            ->add('nombreimage')
            ->add('image', FileType::class, ['label' => 'image (PDF file)'])
            ->add('auteur', EntityType::class,array('class'=> 'BibliothequeBundle:auteur', 'choice_label'=>'nom', 'multiple'=>false))
            ->add('dommaine', EntityType::class,array('class'=> 'BibliothequeBundle:dommaine', 'choice_label'=>'libelle', 'multiple'=>false))
            ->add('profilePictureFile', FileType::class, array('data_class' => null))
            ->add('confirmer',  SubmitType::class);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => livre::class,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bibliothequebundle_livre';
    }


}
