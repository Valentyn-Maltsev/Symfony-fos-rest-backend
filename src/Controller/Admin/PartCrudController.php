<?php

namespace App\Controller\Admin;

use App\Entity\Part;
use App\Form\Admin\TechSetType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class PartCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Part::class;
    }

/*    public function edit(AdminContext $context)
    {
        $part = $context->getEntity()->getInstance();
        $entityManager = $this->getDoctrine()->getManager();
        $toolRepository = $this->getDoctrine()->getRepository(Tool::class);
        $form = $this->createForm(PartType::class, $part);
        $part = $form->getData();

//        foreach ($part->getTechSets() as $techSet) {
//            $operation = new Operation();
//            $operation->setName('mill1');
//            $operation->setFeed(100);
//            $operation->setleadTime(100);
//            $operation->setRotationalSpeed(100);
//            $operation->setRotationalSpeed(100);
//
//            $tool = $toolRepository->find(1);
//            $operation->setTool($tool);
//
//            $techSet->addOperation($operation);
//
//            $entityManager->persist($techSet);
//            $entityManager->flush();
//        }
        return $this->renderForm('admin/edit_part.html.twig', [
            'form' => $form,
        ]);
    }*/

//    public function configureCrud(Crud $crud): Crud
//    {
//        return $crud
//            ->setEntityLabelInSingular('Parts')
//            ->setEntityLabelInPlural('Parts')
//            ->setSearchFields(['name'])
//            ->setDefaultSort(['name' => 'DESC'])
//        ;
//    }

    public function configureFields(string $pageName): iterable
    {
        return [

            CollectionField::new('techSets')
                ->allowAdd()
                ->allowDelete()
                ->setEntryIsComplex(true)
                ->setEntryType(TechSetType::class)
//                ->setFormTypeOptions(['by_reference' => false]),
        ];
    }

//    public function configureCrud(Crud $crud): Crud
//    {
//        return $crud
//            ->setFormOptions()
//        ;
//    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(CRUD::PAGE_INDEX, 'detail');
    }

}
