<?php

namespace Projet\UserBundle\Controller;

use DateTime;
use Projet\UserBundle\Entity\Client;
use Projet\UserBundle\Entity\Demande;
use Projet\UserBundle\Entity\Prestation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DemandeController extends Controller
{
    
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
         $em->persist($client);
         $demandePrestation = new Demande();
         $demandePrestation->setClient($client);
         $demandePrestation->setDescription($demande->description);
         $demandePrestation->setDateDemande(new DateTime());

         $demandePrestation->setDatePrestation(DateTime::createFromFormat('d/m/Y', $demande->datePrestation));
         $demandePrestation->setEtat("nouveau");
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
        return new JsonResponse($demandes);
    }
}
