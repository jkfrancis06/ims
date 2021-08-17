<?php

namespace App\Form;

use App\Entity\Entites;
use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class VehiculeType extends AbstractType
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
            ->add('role', ChoiceType::class, [
                'required' => true,
                'label' => 'Role : ',
                'choices'  => [
                    'Suspect' => Entites::ROLE_SUSPECT,
                    'Personne d\'interet' => Entites::ROLE_INTEREST,
                    'Victime' => Entites::ROLE_VICTIME,
                    'Source' => Entites::ROLE_SOURCE,
                ],
                'constraints' => [
                    new NotBlank()
                ],
            ])
            ->add('mainPicture',FileType::class, [
                'label' => 'Image principale',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                'multiple' => false,

                // make it optional so you don't have to re-upload the  file
                // every time you edit details
                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '20000M',
                    ])
                ],


            ])
            ->add('attachements', FileType::class, [
                'label' => 'Choisir un fichier',
                'mapped' => false,
                'multiple' => true,
                'required' => false,

                'constraints' => [
                    new All([
                        'constraints' => [
                            new File([
                                'maxSize' => '20000M'
                            ]),
                        ],
                    ]),
                ]
            ])
            ->add('resume',TextType::class, [
                'label' => 'Resume : ',
                'required' => false,
            ])
            ->add('categorie',TextType::class, [
                'label' => 'Resume : ',
                'required' => false,
            ])
            ->add('immatriculation',TextType::class, [
                'label' => 'Resume : ',
                'required' => false,
            ])
            ->add('submit', SubmitType::class, ['label' => 'Enregistrer'])
            ->add('cancel', ResetType::class, ['label' => 'Annuler'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
