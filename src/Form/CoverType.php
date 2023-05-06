<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,
                [
                    'label' => 'Nom',
                    'attr' => [
                        'placeholder' => 'Votre nom',
                        //class tailwind css
                        'class' => 'border-2 border-gray-300 p-2 w-full',

                    ]
                ])
            ->add('prenom',TextType::class,
                [
                    'label' => 'Prénom',
                    'attr' => [
                        'placeholder' => 'Votre prénom',
                        //class tailwind css
                        'class' => 'border-2 border-gray-300 p-2 w-full',

                    ]
                ])
            //diplome
            ->add('diplome',TextareaType::class,
                [
                    'label' => 'Diplôme',
                    'attr' => [
                        'placeholder' => 'Votre diplôme',
                        //class tailwind css
                        'class' => 'border-2 border-gray-300 p-2 w-full',

                    ]
                ])
            //entreprise
            ->add('entreprise',TextType::class,
                [
                    'label' => 'Entreprise',
                    'attr' => [
                        'placeholder' => 'Votre entreprise',
                        //class tailwind css
                        'class' => 'border-2 border-gray-300 p-2 w-full',

                    ]
                ])
            //poste
            ->add('poste',TextType::class,
                [
                    'label' => 'Poste',
                    'attr' => [
                        'placeholder' => 'Votre poste',
                        //class tailwind css
                        'class' => 'border-2 border-gray-300 p-2 w-full',

                    ]
                ])
            //annonce
            ->add('annonce',TextareaType::class,
                [
                    'label' => 'Annonce',
                    'attr' => [
                        'placeholder' => 'Annonce',
                        //class tailwind css
                        'class' => 'border-2 border-gray-300 p-2 w-full',

                    ]
                ])
            //submit
            ->add('submit',SubmitType::class,
                [
                    'label' => 'Générer une lettre de motivation',
                    'attr' => [
                        //class tailwind css
                        'class' => 'text-indigo-500 p-2 w-full',

                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
