<?php

namespace Projet\UserBundle\Controller;

use DateTime;
use Projet\UserBundle\Entity\Client;
use Projet\UserBundle\Entity\Compte;
use Projet\UserBundle\Entity\Demande;
use Projet\UserBundle\Entity\Prestation;
use Projet\UserBundle\Entity\Role;
use Projet\UserBundle\Response\JsonResponse as JsonResponse2;
use Projet\UserBundle\Security\Encoder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DemandeController extends Controller
{
    
    /**
     * @Route("/client/{idClient}/demandes")
     * @Method({"GET"})
     */
    public function getClientDemande($idClient){

        
        
        $em = $this->getDoctrine()->getManager();

        $demandes = $em->getRepository('ProjetUserBundle:Demande')->findByClient($idClient);

       
        return JsonResponse2::getJsonResponse($demandes);
    }
     
    
     /**
    * @Route("/visiteur/demandes")
    * @Method({"POST"})
     */
    public function addDemande(Request $request){
        $dem = $request->get('demande');
         $demande = json_decode($dem);   
         $client = new Client();
         $client->setNom($demande->nom);
         $client->setPrenom($demande->prenom);
         $client->setAdresse($demande->adresse);
         $client->setTel($demande->tel);
        
         $em = $this->getDoctrine()->getManager();
         
         $encoderService = $this->get('security.password_encoder');
          Encoder::setEncoder($encoderService);
         $compte = Compte::construct($demande->email,  Encoder::codePassword($demande->motdepasse));
         $role = $em->getRepository(Role::class)->findOneBy(array('nom'=>Role::$ROLE_CLIENT));
         $compte->setRole($role);
         $client->setCompte($compte);
         $em->persist($client);
         $em->persist($compte);
         
         $demandePrestation = new Demande();
         $demandePrestation->setClient($client);
         $demandePrestation->setDescription($demande->description);
         $demandePrestation->setDateDemande(new DateTime());

         $demandePrestation->setDatePrestation(DateTime::createFromFormat('d/m/Y', $demande->datePrestation));
         $demandePrestation->setEtat("nouvelle");
         foreach($demande->prestations as $pres){
             $prestation = $em->getRepository(Prestation::class)->find($pres->id);
             $demandePrestation->addPrestation($prestation);
         }
         $em->persist($demandePrestation);
         $em->flush();
         return new JsonResponse(true);
    }
    
    
    /**
     * @Route("/agent_technique/demandes")
     * @Method({"GET"})
     */
    public function getdemandeByEtatAction(Request $request){
        $etat= $request->get('etat');
        $em = $this->getDoctrine()->getManager();
        $demandes = $em->getRepository('ProjetUserBundle:Demande')->findbyet($etat);
        return JsonResponse2::getJsonResponse($demandes);
    }
        /**
     * @Route("/agent_technique/demandes/{idDemande}")
     * @Method({"PUT"})
     */
    public function modifierEtatAction(Request $request,$idDemande){
        $etat= $request->get('etat');
        $em = $this->getDoctrine()->getManager();
        $demande = $em->getRepository('ProjetUserBundle:Demande')->findOneById($idDemande);
        $demande->setEtat($etat);
        $em->persist($demande);
         $em->flush();
         return new JsonResponse(true);
    }
    
    /**
     * @Route("/client/{idClient}/demandes")
     * @Method({"POST"})
     */
    public function addDemandeClient(Request $request,$idClient){
         $dem = $request->get('demande');
         $demande = json_decode($dem);  
        $em = $this->getDoctrine()->getManager();

        $client = $em->getRepository('ProjetUserBundle:Client')->findOneById($idClient);
         $demandePrestation = new Demande();
         $demandePrestation->setClient($client);
         $demandePrestation->setDescription($demande->description);
         $demandePrestation->setDateDemande(new DateTime());

         $demandePrestation->setDatePrestation(DateTime::createFromFormat('d/m/Y', $demande->datePrestation));
         $demandePrestation->setEtat("nouvelle");
         foreach($demande->prestations as $pres){
             $prestation = $em->getRepository(Prestation::class)->find($pres->id);
             $demandePrestation->addPrestation($prestation);
         }
         $em->persist($demandePrestation);
         $em->flush();
         return new JsonResponse(true);
    }
}
