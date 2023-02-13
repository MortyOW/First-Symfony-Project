<?php

namespace App\Controller\Admin;

use App\Entity\ProductRestaurant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class ProductRestaurantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductRestaurant::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('product'),
            AssociationField::new('restaurant'),
            IntegerField::new('stock'),
            NumberField::new('price')
        ];
    }

}
