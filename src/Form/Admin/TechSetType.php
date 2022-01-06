<?php

namespace App\Form\Admin;

use App\Entity\TechSet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TechSetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('operations', CollectionType::class, [
                'entry_type' => OperationType::class,
                'entry_options' => ['label' => false],
            ])
            ->add('AddOperation', ButtonType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TechSet::class,
            'allow_add' => true,
        ]);
    }
}
