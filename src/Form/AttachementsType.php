<?php

namespace App\Form;

use App\Entity\Attachements;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class AttachementsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file',FileType::class, [
                'label' => 'Fichier Joint',

                'multiple' => false,


                // make it optional so you don't have to re-upload the  file
                // every time you edit details
                'required' => true,

                'attr'     => [
                    'mimeTypesMessage' => "Veuillez uploader un fichier image valide",
                    'maxSizeMessage' => "Taille maximum de 1M",

                ],

            ])
            ->add('description',TextareaType::class,[
                'required' => true,
                'constraints' => [
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Ajouter une description'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Attachements::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'AttachementsType';
    }
}
