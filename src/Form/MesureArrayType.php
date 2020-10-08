<?php

namespace App\Form;

use App\Entity\ArrayData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MesureArrayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('poids')
            ->add('masseGraisseuse')
            ->add('masseMusculaire')
            ->add('idUser')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ArrayData::class,
        ]);
    }
}
