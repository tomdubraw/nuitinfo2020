<?php

namespace App\Form;

use App\Entity\Trip;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TripType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city', TextType::class, [
                'label' => 'Ville',
            ])
            ->add('starttime', DateTimeType::class, [
                'label' => 'Début de séance',
                'data' => new \DateTime(),
            ])
            ->add('endtime', DateTimeType::class, [
                'label' => 'Fin de séance',
                'data' => new \DateTime(),
            ])
            ->add('batherNumber', IntegerType::class, [
                'label' => 'Nombre de baigneurs',
                'data' => 0,
            ])
            ->add('fishingBoat', IntegerType::class, [
                'label' => 'Nombre de bateaux de pêche',
                'data' => 0,
            ])
            ->add('pleasureBoat', IntegerType::class, [
                'label' => 'Nombre de bateaux de plaisance',
                'data' => 0,
            ])
            ->add('sailboat', IntegerType::class, [
                'label' => 'Nombre de bateaux à voile',
                'data' => 0,
            ])
            ->add('surferNumber', IntegerType::class, [
                'label' => 'Nombre de surfeurs',
                'data' => 0,
            ])
            ->add('pollutionCommentary', TextareaType::class, [
                'label' => 'Observations',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trip::class,
        ]);
    }
}
