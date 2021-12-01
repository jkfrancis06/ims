<?php

namespace App\Form;

use App\Entity\Courrier;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CourrierEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datecourrier', DateType::class, [
                'required' => true,
                'label' => 'Date de courrier: ',
                'widget' => 'single_text',
                'html5' => true,
                // adds a class that can be selected in JavaScript
                'attr' => [
                    'placeholder' => 'Selectionner une date'
                ]

            ])
            ->add('referenceInterne', TextType::class, [
                'label' => 'Reference du courrier : ',
                'required' => true,
            ])
            ->add('sujet', TextType::class, [
                'label' => 'Sujet du courrier : ',
                'required' => true,
            ])
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

            ->add('submit', SubmitType::class, ['label' => 'Mettre à jour'])
            ->add('cancel', ResetType::class, ['label' => 'Annuler'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Courrier::class,
        ]);
    }
}
