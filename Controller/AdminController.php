<?php

namespace Soipo\Okento\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function dashboardAction()
    {
        $this->get('soipo_okento_admin.access_manager')->checkAccess(array('IS_AUTHENTICATED_FULLY'));
        return $this->render('SoipoOkentoAdminBundle:Admin:dashboard.html.twig');
    }

}
