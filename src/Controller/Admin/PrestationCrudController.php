<?php

namespace App\Controller\Admin;

use App\Entity\Prestation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PrestationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Prestation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextEditorField::new('description')->onlyOnForms(),
            TextareaField::new('description')->onlyOnIndex()->renderAsHtml()->formatValue(function($value) {
                return substr($value, 0, 15);
            }),
            ChoiceField::new('duree')->setChoices(['15 minutes'=> 15, '30 minutes'=>30, '60 minutes'=> 60, '90 minutes'=> 90, '120 minutes'=> 120, '1 minute'=> 1]),
            NumberField::new('prix'),
            ImageField::new('image')->setUploadDir('public/prestations')->setBasePath('prestations')->setRequired($pageName == Crud::PAGE_NEW),
        ];
    }
    
}
