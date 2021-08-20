<?php

namespace App\Controller\Admin;

use App\Entity\Affaire;
use App\Entity\AffaireDirected;
use App\Entity\AffaireUtilisateur;
use App\Entity\CanConsult;
use App\Entity\Departement;
use App\Entity\DepartementDirector;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class AdminDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('DNDPE Administration')
            // you can include HTML contents too (e.g. to link to an image)

            // the path defined in this method is passed to the Twig asset() function
            ->setFaviconPath('/img/favicon.ico')

            // the domain used by default is 'messages'
            ->setTranslationDomain('my-custom-domain')

            // there's no need to define the "text direction" explicitly because
            // its default value is inferred dynamically from the user locale
            ->setTextDirection('ltr')

            // by default, all backend URLs include a signature hash. If a user changes any
            // query parameter (to "hack" the backend) the signature won't match and EasyAdmin
            // triggers an error. If this causes any issue in your backend, call this method
            // to disable this feature and remove all URL signature checks
            ->disableUrlSignatures()

            // by default, all backend URLs are generated as absolute URLs. If you
            // need to generate relative URLs instead, call this method
            ->generateRelativeUrls()
            ;
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Departement'),
            MenuItem::linkToCrud('Departement', 'fa fa-building', Departement::class),
            MenuItem::linkToCrud('Chefs departement', 'fa fa-house-user', DepartementDirector::class),

            MenuItem::section('Affaire'),
            MenuItem::linkToCrud('Affaire', 'fa fa-folder-open', Affaire::class),
            MenuItem::linkToCrud('Affectations aux affaires', 'fa fa-id-badge', AffaireUtilisateur::class),
            MenuItem::linkToCrud('Direction des affaires', 'fa fa-address-card', AffaireDirected::class),
            MenuItem::linkToCrud('Gestion des consultants', 'fa fa-address-book', CanConsult::class),


            MenuItem::section('Utilisateur'),
            MenuItem::linkToCrud('Gestion des utilisateurs', 'fa fa-users', Utilisateur::class),

        ];


    }


}
