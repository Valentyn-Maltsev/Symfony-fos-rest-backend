<?php

namespace App\Controller\Admin;

use App\Entity\Material;
use App\Entity\Operation;
use App\Entity\OperationType;
use App\Entity\Part;
use App\Entity\TechSet;
use App\Entity\Tool;
use App\Entity\ToolType;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */

    //* @IsGranted("ROLE_USER")
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('App');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'get_action');
        yield MenuItem::linkToCrud('Materials', 'fas fa-list', Material::class);
        yield MenuItem::linkToCrud('OperationTypes', 'fas fa-list', OperationType::class);
        yield MenuItem::linkToCrud('Tool types', 'fas fa-list', ToolType::class);
        yield MenuItem::linkToCrud('Tools', 'fas fa-list', Tool::class);
        yield MenuItem::linkToCrud('Parts', 'fas fa-list', Part::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('TechSets', 'fas fa-list', TechSet::class);
        yield MenuItem::linkToCrud('Operations', 'fas fa-list', Operation::class);
    }
}
