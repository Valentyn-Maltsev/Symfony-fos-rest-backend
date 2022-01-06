<?php

namespace App\Form\Admin;

use App\Entity\Part;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id')
            ->add('name')
            ->add('techSets', CollectionType::class, [
                'entry_type' => TechSetType::class,
                'entry_options' => ['label' => false],
            ])
//            ->add('Add', ButtonType::class)
        ;
    }

//    /**
//     * {@inheritdoc}
//     */
//    public function buildView(FormView $view, FormInterface $form, array $options)
//    {
//        $view->vars = array_replace($view->vars, [
////            'allow_add' => $options['allow_add'],
//            'allow_add' => true,
//            'allow_delete' => $options['allow_delete'],
//        ]);
//
//        if ($form->getConfig()->hasAttribute('prototype')) {
//            $prototype = $form->getConfig()->getAttribute('prototype');
//            $view->vars['prototype'] = $prototype->setParent($form)->createView($view);
//        }
//    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Part::class,
            'allow_add' => true,
//            'allow_delete' => true,
        ]);
    }
}
