<?php

namespace App\Controller\Admin\Field;

use App\Form\Admin\EditPartType;
use App\Form\Admin\PartType;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

final class PartField implements FieldInterface
{
    use FieldTrait;

    public static function new(string $propertyName, $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
//            ->setLabel($label)

            // this template is used in 'index' and 'detail' pages
//            ->setTemplatePath('admin/field/map.html.twig')

            // this is used in 'edit' and 'new' pages to edit the field contents
            // you can use your own form types too
//            ->setFormType(CollectionType::class)
            ->setFormType(PartType::class)
//            ->setFormType(TextareaType::class)
//            ->addCssClass('field-map')

            // loads the CSS and JS assets associated to the given Webpack Encore entry
            // in any CRUD page (index/detail/edit/new). It's equivalent to calling
            // encore_entry_link_tags('...') and encore_entry_script_tags('...')
//            ->addWebpackEncoreEntries('admin-field-map')

            // these methods allow to define the web assets loaded when the
            // field is displayed in any CRUD page (index/detail/edit/new)
//            ->addCssFiles('js/admin/field-map.css')
//            ->addJsFiles('js/admin/field-map.js')
            ;
    }

}