<?php

namespace App\Controller\Admin;

use App\Entity\OperationType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OperationTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OperationType::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
