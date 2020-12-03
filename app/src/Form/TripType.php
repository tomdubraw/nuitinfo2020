<?php

namespace App\Form;

use App\Entity\Trip;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TripType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city')
            ->add('starttime')
            ->add('endtime')
            ->add('batherNumber')
            ->add('boatNumber')
            ->add('fishingBoat')
            ->add('pleasureBoat')
            ->add('sailboat')
            ->add('surferNumber')
            ->add('pollutionCommentary')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trip::class,
        ]);
    }
}
