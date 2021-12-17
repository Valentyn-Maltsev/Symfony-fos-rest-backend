<?php

namespace App\Controller\Admin;

use App\Entity\ToolType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ToolTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ToolType::class;
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
