<?php

namespace App\Form;

use App\Config\Level;
use App\Form\Model\AlgorithmModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AlgorithmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('theme', TextType::class, [
                'label' => "Thème",
                "attr" => [
                    'placeholder' => "Thème de l'algorithme à traiter"
                ]
            ])
            ->add('level', EnumType::class, [
                'class' => Level::class,
                'label' => 'Niveau'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Créer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AlgorithmModel::class,
        ]);
    }
}
