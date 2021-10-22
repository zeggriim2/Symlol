<?php

namespace App\Controller\Admin;

use App\Entity\Game;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class GameCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Game::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            DateTimeField::new('dateGame')->setLabel('Date de la Game'),
            AssociationField::new('equipe1')->setLabel('Equipe 1'),
            IntegerField::new('scoreequipe1')->setLabel('Score Equipe 1'),
            AssociationField::new('equipe2')->setLabel('Equipe 2'),
            IntegerField::new('scoreequipe2')->setLabel('Score Equipe 2'),
            DateField::new('createAt')->hideWhenCreating()->onlyOnIndex(),
        ];
    }
}
