<?php

namespace App\Controller\Admin;

use App\Entity\Equipe;
use App\Entity\Group;
use App\Entity\Game;
use App\Entity\Suggestion;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
//         return parent::index();
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->generateRelativeUrls(false)
            ->setTitle('Symlol')
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard');
        yield MenuItem::linkToRoute('WebSite', 'fa fa-home', 'home');
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Suggestion', 'fas fa-list', Suggestion::class);
        yield MenuItem::subMenu('Compétition', 'fas fa-gamepad')->setSubItems([
            MenuItem::linkToCrud('Equipe', 'fas fa-users', Equipe::class),
            MenuItem::linkToCrud('Group', 'fas fa-list', Group::class),
            MenuItem::linkToCrud('Game', 'fas fa-gamepad', Game::class)
        ]);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
