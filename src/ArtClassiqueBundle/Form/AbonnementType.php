<?php

namespace ArtClassiqueBundle\Form;

use ArtClassiqueBundle\Enum\ClassTypeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AbonnementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateDebut')->add('dateFin')
            ->add('categorie', ChoiceType::class, array(
                'required' => true,
                'choices' => ClassTypeEnum::getAvailableTypes(),
                'placeholder' => 'Choisir une catégorie',
                'choice_label' => function($choice) {
                    return ClassTypeEnum::getTypeName($choice);
                },
            ))->add('user');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ArtClassiqueBundle\Entity\Abonnement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'artclassiquebundle_abonnement';
    }


}
