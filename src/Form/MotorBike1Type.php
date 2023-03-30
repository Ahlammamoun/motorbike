<?php

namespace App\Form;

use App\Entity\MotorBike;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Brand;

class MotorBike1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name')
        ->add('releaseDate')
        ->add('color')
        ->add('price')
        ->add('town')
        ->add('country')
        ->add('picture')
        ->add('brand', EntityType::class,
        [
            'class' => Brand::class,
            'choice_label' => 'name',
            //'multiple' => true,
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MotorBike::class,
        ]);
    }
}
