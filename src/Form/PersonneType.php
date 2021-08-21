<?php

namespace App\Form;

use App\Entity\Entites;
use App\Entity\Personne;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
            ->add('resume', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                    'language' => 'fr',
                    'input_sync' => true,
                    'extraPlugins' => 'wordcount',
                ),
                'plugins' => array(
                    'wordcount' => array(
                        'path'     => '/assets/wordcount/', // with trailing slash
                        'filename' => 'plugin.js',
                    ),
                ),
                'required' => true,
                'constraints' => [
                    new NotBlank()
                ]

            ))
            ->add('nom', TextType::class, [
                'label' => 'Nom : ',
                'required' => false,
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prenoms : ',
                'required' => false,
            ])
            ->add('dateNaissance', DateType::class, [
                'required' => false,
                'label' => 'Date de naissance: ',
                'html5' => false,
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                // adds a class that can be selected in JavaScript
                'attr' => [
                    'class' => 'js-datepicker',
                    'placeholder' => 'Selectionner un interval de date'
                ]

            ])
            ->add('sexe', ChoiceType::class, [
                'label' => 'Sexe : ',
                'choices'  => [
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
            ->add('telephone', CollectionType::class, [
                'required' => false,
                'entry_type' => TelephoneType::class,
                'block_name' => 'telephone_lists',
                'entry_options' => ['label' => false],
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
            ])

            ->add('aliases', CollectionType::class, [
                'required' => false,
                'entry_type' => AliasType::class,
                'block_name' => 'telephone_lists',
                'entry_options' => ['label' => false],
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
            ])

            ->add('submit', SubmitType::class, ['label' => 'Enregistrer'])
            ->add('cancel', ResetType::class, ['label' => 'Annuler'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
