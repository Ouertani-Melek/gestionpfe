<?php

namespace GestionPfeBundle\Controller;

use FOS\UserBundle\Model\UserInterface;
use GestionPfeBundle\Entity\Demandes;

use GestionPfeBundle\Entity\Offre;
use GestionPfeBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

class DemandesController extends Controller
{
    public function PostulerAction(Request $request)
    {   $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $demande=new Demandes();
        $em=$this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        $demande->setIdUser($user);
        $cv=$em->getRepository("GestionPfeBundle:Cv")->findOneById($user);
        if(is_object($cv))
        {
            $offre =$em->getRepository("GestionPfeBundle:Offre")->findOneById($request->get("idOffre"));
            $today = new \DateTime('now');
            $today->format('Y-m-d H:i:s');
            $demande->setIdOffre($offre);
            $demande->setConfirmation(null);
            $demande->setEtatDemande(null);
            $demande->setEtatEntretien(null);
            $demande->setMethodeCommunication(null);
            $demande->setDateDemande($today);
            var_dump($demande);
            $em->persist($demande);
            $em->flush();
            $response=new Response("GG");
        }
        else
        {
            $response=new Response("Remplissez Votre Cv avant de postuler !");
        }
    return $response;
    }

    public function SupprimerDemandeAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $demande=new Demandes();
        $em=$this->getDoctrine()->getManager();


        //$demande->setIdUser($user);
        $demande =$em->getRepository("GestionPfeBundle:Demandes")->findOneById($request->get("id"));



        $demande->setEtatDemande(false);
        $em->persist($demande);
        $em->flush();
        $response=new Response("GG");
        return $response;
    }
    public function afficherDemandeAction()
    {
        $use = $this->getUser();
        if (!is_object($use) || !$use instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $em=$this->getDoctrine()->getManager();


        $offres =$em->getRepository("GestionPfeBundle:Offre")->findBy(array("idUser"=>$user->getId()));
         $demandes=$em->getRepository("GestionPfeBundle:Demandes")->findBy(array("idOffre"=>$offres));
         //$idetudiant=$em->getRepository("GestionPfeBundle:User")->findOneById($demandes->getIdUser());


        //$tech=$em->getRepository("GestionPfeBundle:CompetencesTechniques")->findBy(array("idcv"=>$cv->getId()));





        // var_dump($demandes);
        return $this->render('GestionPfeBundle:Demandes:afficher_demande.html.twig', array(
            "demandes"=>$demandes
            // ...
        ));
    }
   public function rechercheajaxAction(Request $Request)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("GestionPfeBundle:User")->findOneById($Request->get('idc'));
        $demande=$em->getRepository("GestionPfeBundle:Demandes")->findOneById($Request->get('idd'));
        $cv=$em->getRepository("GestionPfeBundle:Cv")->findOneBy(array("idUser"=>$user->getId()));
        //var_dump($cv);
        $formation=$em->getRepository("GestionPfeBundle:formations")->findBy(array("idcv"=>$cv->getId()));
        $langue=$em->getRepository("GestionPfeBundle:langues")->findBy(array("idcv"=>$cv->getId()));
        $centre=$em->getRepository("GestionPfeBundle:centresInterets")->findBy(array("idcv"=>$cv->getId()));
        $tech=$em->getRepository("GestionPfeBundle:CompetencesTechniques")->findBy(array("idCv"=>$cv->getId()));


       $html=$this->render("GestionPfeBundle:Demandes:recherchePartial.html.twig",array(
          "cv"=>$cv,"formation"=>$formation ,"langue"=>$langue ,"centre"=>$centre,"tech"=>$tech,"demande"=>$demande));
        $response=new Response($html->getContent());
        return $response;
    }//FindAction*/

public function listAccepteAction(){

    $use = $this->getUser();
    if (!is_object($use) || !$use instanceof UserInterface) {
        throw new AccessDeniedException('This user does not have access to this section.');
    }
    $user = $this->container->get('security.token_storage')->getToken()->getUser();
    $em=$this->getDoctrine()->getManager();
    $offres =$em->getRepository("GestionPfeBundle:Offre")->findBy(array("idUser"=>$user->getId()));
    $demandes=$em->getRepository("GestionPfeBundle:Demandes")->findBy(array("idOffre"=>$offres));



    // var_dump($demandes);
    return $this->render('GestionPfeBundle:Demandes:listAccept.html.twig', array(
        "demandes"=>$demandes
        // ...
    ));
}
    public function ValiderEntretienAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $demande=new Demandes();
        $em=$this->getDoctrine()->getManager();


        //$demande->setIdUser($user);
        $demande =$em->getRepository("GestionPfeBundle:Demandes")->findOneById($request->get("id"));

        $demande->setEtatEntretien(true);
        $em->persist($demande);
        $em->flush();
        $response=new Response("GG");
        return $response;
    }
    public function SupprimerEntretienAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $demande=new Demandes();
        $em=$this->getDoctrine()->getManager();


        //$demande->setIdUser($user);
        $demande =$em->getRepository("GestionPfeBundle:Demandes")->findOneById($request->get("id"));
        $demande->setDateEntretien(null);
        $demande->setEtatEntretien(null);
        $demande->setMethodeCommunication(null);
        $demande->setEtatDemande(null);
        $em->persist($demande);
        $em->flush();
        $response=new Response("GG");
        return $response;
    }
    public function FixerEntretienAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $demande=new Demandes();
        $em=$this->getDoctrine()->getManager();


        //$demande->setIdUser($user);
        $demande =$em->getRepository("GestionPfeBundle:Demandes")->findOneById($request->get("id"));


        $date= \DateTime::createFromFormat('d/m/Y H:i',$request->get('date'));
        $date->format('Y-m-d H:i');
        $demande->setEtatDemande(true);
        $demande->setEtatEntretien(null);
        $demande->setMethodeCommunication($request->get("methode"));
       $demande->setDateEntretien($date);
        $em->persist($demande);
        $em->flush();
        $response=new Response("GG");
        return $response;
    }
    public function pdfAction(Request $request)
    {
            $demande=new Demandes();

        $em=$this->getDoctrine()->getManager();
            $idDemande=$request->get('idDemande');
            $demande=$em->getRepository("GestionPfeBundle:Demandes")->findOneById($idDemande);
            $offre=$em->getRepository("GestionPfeBundle:Offre")->findOneById($demande->getIdOffre());
            $etudiant=$em->getRepository("GestionPfeBundle:User")->findOneById($demande->getIdUser());
            $entreprise=$em->getRepository("GestionPfeBundle:User")->findOneById($offre->getIdUser());

        $today = new \DateTime('now');
        $today->format('Y-m-d H:i:s');


        $html = $this->renderView('GestionPfeBundle:Demandes:lettreConfirmation.html.twig', array(
            'etudiant'=>$etudiant,'offre'=>$offre,'demande'=>$demande,'entreprise'=>$entreprise,'date'=>$today
        ));

        return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            '+216'.$etudiant->getNumeroTel().'.pdf'
        );
    }
}
