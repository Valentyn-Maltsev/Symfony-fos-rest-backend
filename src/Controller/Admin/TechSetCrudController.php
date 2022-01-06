<?php

namespace App\Controller\Admin;

use App\Entity\TechSet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TechSetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TechSet::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            AssociationField::new('part'),
            AssociationField::new('operations'),
        ];
    }

}
