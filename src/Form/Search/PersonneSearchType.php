<?php

namespace App\Form\Search;

use App\Entity\Personne;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonneSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', TextType::class, [
                'label' => 'Nom : ',
                'required' => false,
            ])
            ->add('description2', TextType::class, [
                'label' => 'Prenoms : ',
                'required' => false,
            ])

            ->add('alias', TextType::class, [
                'label' => 'Alias : ',
                'required' => false,
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Numéros de téléphone : ',
                'required' => false,
            ])
            ->add('dateNaissance', DateType::class, [
                'required' => false,
                'label' => 'Date de naissance: ',
                'html5' => true,
                'widget' => 'single_text',
                // adds a class that can be selected in JavaScript
                'attr' => [
                    'placeholder' => 'Selectionner une date'
                ]

            ])
            ->add('sexe', ChoiceType::class, [
                'label' => 'Sexe : ',
                'choices'  => [
                    'Selectionner' => null,
                    'Inconnu' => Personne::SEXE_IND,
                    'Homme' => Personne::SEXE_HOMME,
                    'Femme' => Personne::SEXE_FEMME,
                ],
                'attr' => [
                    'placeholder' => 'Selectionner'
                ],
            ])
            ->add('numPassport', TextType::class, [
                'required' => false,
                'label' => 'Numero de passport : ',
            ])
            ->add('numCarte', TextType::class, [
                'required' => false,
                'label' => 'Numero de carte : ',
            ])
            ->add('nationalite', TextType::class, [
                'required' => false,
                'label' => 'Nationalite : ',
            ])
            ->add('telephone', TextType::class, [
                'label' => 'téléphone : ',
                'required' => false,
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse : ',
                'required' => false,
            ])

            ->add('otherInfos', TextareaType::class, [
                'label' => 'Autres informations : ',
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
