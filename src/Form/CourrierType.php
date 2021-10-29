<?php

namespace App\Form;

use App\Entity\Courrier;
use App\Entity\Departement;
use App\Entity\Entites;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CourrierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isResponse', CheckboxType::class, [
                'label'    => 'Ce courrier est une reponse?',
                'required' => false,
            ])
            ->add('flux', ChoiceType::class, [
                'placeholder' => 'Choisir une option',
                'required' => true,
                'label' => 'Flux : ',
                'choices'  => [
                    'Courrier Entrant' => Courrier::FLUX_ENTRANT,
                    'Courrier Sortant' => Courrier::FLUX_SORTANT,
                ],
                'constraints' => [
                    new NotBlank()
                ],
            ])
            ->add('datecourrier', DateType::class, [
                'required' => true,
                'label' => 'Date de courrier: ',
                'html5' => false,
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                // adds a class that can be selected in JavaScript
                'attr' => [
                    'class' => 'js-datepicker',
                    'placeholder' => 'Selectionner une date'
                ]

            ])
            ->add('origine',CountryType::class,[
                'required' => true,
                'label' => 'Pays d\'origine : ',
                'constraints' => [
                    new NotBlank()
                ],
            ])

            ->add('destination',CountryType::class,[
                'required' => true,
                'label' => 'Pays de destination : ',
                'constraints' => [
                    new NotBlank()
                ],
            ])

            ->add('referenceInterne', TextType::class, [
                'label' => 'Reference du courrier : ',
                'required' => true,
            ])
            ->add('sujet', TextType::class, [
                'label' => 'Sujet du courrier : ',
                'required' => true,
            ])
            ->add('contenu', CKEditorType::class, array(
                'label' => 'Contenu du courrier : ',
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
                'required' => false,

            ))

            ->add('commentaire', CKEditorType::class, array(
                'label' => 'Commentaires : ',
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

            ->add('type', ChoiceType::class, [
                'placeholder' => 'Choisir une option',
                'required' => true,
                'label' => 'Type de courrier : ',
                'choices'  => [
                    'Courrier officiel' => Courrier::COURRIER_OFF,
                    'Note de renseignement' => Courrier::COURRIER_NOTE,
                    'Forum' => Courrier::COURRIER_FORUM,
                ],
                'constraints' => [
                    new NotBlank()
                ],
            ])

            ->add('affectation', EntityType::class, [
                'required' => false,
                'class' => Departement::class,
                'placeholder' => 'Choisir une option',
                'choice_label' => function(Departement $departement){
                    return $departement->getNom();
                }
            ])
            ->add('responseTo', EntityType::class, [
                'label' => 'Courrier',
                'required' => false,
                'class' => Courrier::class,
                'placeholder' => '',
                'choice_label' => function(Courrier $courrier){
                    return $courrier->getSujet();
                }
            ])
            ->add('piecejointe', CollectionType::class, [
                'required' => true,
                'entry_type' => PieceJointeType::class,
                'block_name' => 'piecejointe_lists',
                'entry_options' => ['label' => false],
                'label'=> '  ',
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype_name' => '__piecejointe_prot__',
                'attr' => array (
                    'class' => "piecejointe-collection",
                ),
            ])
            ->add('submit', SubmitType::class, ['label' => 'Enregistrer'])
            ->add('cancel', ResetType::class, ['label' => 'Annuler'])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Courrier::class,
        ]);
    }
}
