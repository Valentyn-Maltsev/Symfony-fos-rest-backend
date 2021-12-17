<?php

namespace App\Controller\Admin;

use App\Entity\Part;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PartCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Part::class;
    }


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
            TextField::new('name'),
            CollectionField::new('TechSets'),
//            CollectionField::new('TechSets'),
//            AssociationField::new('techSets'),
        ];
    }

}
