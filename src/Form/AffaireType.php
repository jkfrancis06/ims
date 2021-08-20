<?php

namespace App\Form;

use App\Entity\Affaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class AffaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, [
                'label' => 'nom : ',
                'required' => true,
                'constraints' => [
                    new NotBlank()
                ],
            ])
            ->add('description',TextareaType::class, [
                'label' => 'Description : ',
                'required' => true,
                'constraints' => [
                    new NotBlank()
                ],
            ])
            ->add('niveauAccreditation',IntegerType::class, [
                'label' => 'niveau : ',
                'required' => true,
                'constraints' => [
                    new NotBlank()
                ],
            ])
            ->add('source',TextType::class, [
                'label' => 'source : ',
                'required' => false,
            ])
            ->add('resume',TextType::class, [
                'label' => 'Titre : ',
            ])
            ->add('submit', SubmitType::class, ['label' => 'Enregistrer'])
            ->add('cancel', ResetType::class, ['label' => 'Annuler'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Affaire::class,
        ]);
    }
}
