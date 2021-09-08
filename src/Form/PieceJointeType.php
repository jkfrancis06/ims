<?php

namespace App\Form;

use App\Entity\PieceJointe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PieceJointeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file',FileType::class, [
                'label' => 'Piece jointe',

                'multiple' => false,

                'required' => false,

                'attr'     => [
                    'accept' => 'application/pdf , application/x-pdf',
                    'mimeTypesMessage' => "Veuillez uploader un fichier fichier valide",
                ],

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PieceJointe::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'PieceJointeType';
    }
}
