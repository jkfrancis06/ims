<?php

namespace App\Form\Search;

use App\Entity\Entites;
use App\Entity\Search\EntitySearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class EntitySearchType extends AbstractType
{

    const TYPE_PERSON = 1;
    const TYPE_VEHICULE = 2;
    const TYPE_ORGANISATION = 3;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'required' => true,
                'label' => "Type de l'entité",
                'choices'  => [
                    'Selectionner' => null,
                    'Personne' => self::TYPE_PERSON,
                    'Vehicule' => self::TYPE_VEHICULE,
                    'Organisation' => self::TYPE_ORGANISATION,
                ],
                'constraints' => [
                    new NotBlank()
                ],
            ])
            ->add('submit', SubmitType::class, ['label' => 'Rechercher'])

        ;


        $formModifier = function (FormInterface $form, $type = null) {
            $entityType = null === $type ? [] : $type;

            if ($entityType == self::TYPE_PERSON){
                $form->add('entity', PersonneSearchType::class);
            }

            if ($entityType == self::TYPE_VEHICULE){
                $form->add('entity', VehiculeSearchType::class);
            }

            if ($entityType == self::TYPE_ORGANISATION){
                $form->add('entity',OrganisationSearchType::class);
            }


        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();

                $formModifier($event->getForm(), $data);
            }
        );

        $builder->get('type')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $data = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $data);
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
