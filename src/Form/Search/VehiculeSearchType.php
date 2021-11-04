<?php

namespace App\Form\Search;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description',TextType::class, [
                'label' => 'Nom : ',
                'required' => false,
            ])

            ->add('description2',TextType::class, [
                'label' => 'Description : ',
                'required' => false,
            ])

            ->add('categorie',TextType::class, [
                'label' => 'Catégorie : ',
                'required' => false,
            ])
            ->add('immatriculation',TextType::class, [
                'label' => 'Immatriculation : ',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
