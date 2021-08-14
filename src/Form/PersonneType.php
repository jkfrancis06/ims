<?php

namespace App\Form;

use App\Entity\Entites;
use App\Entity\Personne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
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

                'attr'     => [
                    'accept' => 'image/*',
                    'mimeTypesMessage' => "Veuillez uploader un fichier image valide",
                    'maxSizeMessage' => "Taille maximum de 1M",
                ],

            ])
            ->add('resume')
            ->add('nom', TextType::class, [
                'label' => 'Nom : ',
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prenoms : ',
            ])
            ->add('dateNaissance', DateType::class, [
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
                    'Homme' => 'h',
                    'Femme' => 'f',
                ],
                'attr' => [
                    'placeholder' => 'Selectionner'
                ],
            ])
            ->add('numPassport', TextType::class, [
                'label' => 'Prenoms : ',
            ])
            ->add('numCarte', TextType::class, [
                'label' => 'Prenoms : ',
            ])
            ->add('nationalite', TextType::class, [
                'label' => 'Prenoms : ',
            ])
            ->add('telephone',TelephoneType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
