<?php

namespace Projet\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Projet\UserBundle\Entity\Client;
use Projet\UserBundle\Entity\Demande;
use Projet\UserBundle\Entity\Prestation;
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
         $demande = json_decode($request->get('demande'));   
         $client = new Client();
         $client->setEmail($demande->email);
         $client->setNom($demande->nom);
         $client->setAdresse($demande->adresse);
         $client->setMotdepasse($demande->motdepasse);
         $client->setTel($demande->tel);
        
         $em = $this->getDoctrine()->getManager();
         $em->persist($client);
         $demandePrestation = new Demande();
         $demandePrestation->setClient($client);
         $demandePrestation->setDateDemande(new DateTime());
         $demandePrestation->setDatePrestation(new DateTime($demande->datePrestation));
         $demandePrestation->setEtat("nouveau");
         foreach($demande->prestations as $pres){
             $prestation = $em->getRepository(Prestation::class)->find($pres->id);
             $demandePrestation->prestations->add($prestation);
         }
         $em->persist($demandePrestation);
         $em->flush();
         return new JsonResponse(true);
    }
}
