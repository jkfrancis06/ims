<?php

namespace App\Form;

use App\Entity\Entites;
use App\Entity\Envenement;
use App\Entity\Personne;
use App\Entity\Unite;
use App\Entity\Utilisateur;
use App\Entity\Vehicule;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class EnvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeEvenement', ChoiceType::class, [
                'required' => true,
                'label' => 'Type : ',
                'choices'  => [
                    'Perquisition' => Envenement::EVENT_PER,
                    'Audition' => Envenement::EVENT_AUD,
                    'Filature' => Envenement::EVENT_FIL,
                    'Infiltration' => Envenement::EVENT_INFIL,
                    'Autres' => Envenement::EVENT_OTHER,
                ],
                'constraints' => [
                    new NotBlank()
                ],
            ])
            ->add('titre',TextType::class, [
                'label' => 'Titre : ',
                'required' => true,
                'constraints' => [
                    new NotBlank()
                ],
            ])
            ->add('localisation',TextType::class, [
                'label' => 'Localisation : ',
                'required' => false,
            ])
            ->add('geoLocalisation',TextType::class, [
                'label' => 'GPS : ',
                'required' => false,
            ])
            ->add('startAt', DateTimeType::class, [
                'required' => true,
                'label' => 'Date de debut: ',
                'html5' => true,
                'widget' => 'single_text',
                // adds a class that can be selected in JavaScript
                'attr' => [
                    'class' => 'js-datepicker',
                    'placeholder' => 'Selectionner un interval de date'
                ],
                'constraints' => [
                    new NotBlank()
                ],


            ])
            ->add('endAt', DateTimeType::class, [
                'required' => false,
                'label' => 'Date de fin: ',
                'html5' => false,
                'widget' => 'single_text',

                // adds a class that can be selected in JavaScript
                'attr' => [
                    'class' => 'js-datepicker',
                    'placeholder' => 'Selectionner un interval de date'
                ]

            ])

            ->add('entite', EntityType::class, [
                'class'    => Entites::class,
                'required' => false,
                'multiple' => true,
                'by_reference' => false,
                'placeholder' => true,
                'choice_label' => function(Entites $entites){
                    if ($entites instanceof Personne){
                        $data =  $entites->getDescription() . '  ' . $entites->getDescription2();
                        $alias = "";
                        if (sizeof($entites->getAliases()) > 0){
                            $alias = " alias ". $entites->getAliases()[0]->getAlias();
                        }
                        return $data . '  ' . $alias;

                    }elseif ($entites instanceof Vehicule){
                        $data =  $entites->getDescription() . '  ' . $entites->getDescription2();
                        $immatriculation = "";
                        if ($entites->getImmatriculation() != null){
                            $immatriculation = " immatriculation : ". $entites->getImmatriculation();
                        }
                        return $data . '  ' . $immatriculation;
                    }else{
                        return $entites->getDescription() . '  ' . $entites->getDescription2();
                    }
                }
            ])
            ->add('utilisateur', EntityType::class, [
                'class'    => Utilisateur::class,
                'required' => false,
                'multiple' => true,
                'placeholder' => true,
                'choice_label' => function (Utilisateur $utilisateur) {
                    return $utilisateur->getNom() . '  ' . $utilisateur->getPrenom();
                },
                'by_reference' => false
            ])
            ->add('resume', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                    'language' => 'fr',
                    'input_sync' => true,
                    'extraPlugins' => 'wordcount,entiteinsert',
                    //"removePlugins"=>"exportpdf",

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

            ->add('attachements', CollectionType::class, [
                'required' => false,
                'entry_type' => AttachementsType::class,
                'allow_add' => true,
                'prototype' => true,
                'allow_delete' => true,
                'attr' => array(
                    'class' => 'attachements',
                ),
            ])

            ->add('submit', SubmitType::class, ['label' => 'Enregistrer'])
            ->add('cancel', ResetType::class, ['label' => 'Annuler'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Envenement::class,
        ]);
    }
}
