<?php

namespace App\Form;

use App\Entity\MotorBike;
use App\Entity\Brand;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MotorBikeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('releaseDate', DateType::class,
            [
                'input' => 'datetime_immutable',
                'widget' => 'choice',
                'years' => range(date('Y')-20, date('Y'))
            ])
            ->add('color')
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
