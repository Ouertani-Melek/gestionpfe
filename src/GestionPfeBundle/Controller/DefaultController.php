<?php

namespace GestionPfeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionPfeBundle:Default:index.html.twig');
    }
    public function indexAdminAction()
    {
        return $this->render('GestionPfeBundle:Default:indexAdmin.html.twig');
    }
    public function indexEntrepriseAction()
    {
        return $this->render('GestionPfeBundle:Default:indexEntreprise.html.twig');
    }
    public function indexEnseignantAction()
    {
        return $this->render('GestionPfeBundle:Default:indexEnseignant.html.twig');
    }
}
