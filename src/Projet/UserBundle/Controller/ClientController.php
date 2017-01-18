<?php

namespace Projet\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Projet\UserBundle\Entity\Demande;

class ClientController extends Controller
{
    
    /**
     * @Route("/client")
     */
    public function clientPage() {
        return $this->render("client.html.twig");
    }
    
     /**
     * @Route("/client/{idClient}/demandes")
     * @Method({"GET"})
     */
    public function getClientDemande($idClient){

        
        
        $em = $this->getDoctrine()->getManager();

        $demandes = $em->getRepository('ProjetUserBundle:Demande')->findByClient($idClient);

       
        return new JsonResponse($demandes);
    }
     /**
     * @Route("/client/{idClient}/demandes")
     * @Method({"POST"})
     */
    public function addDemandeClient($idClient){
         $dem = $request->get('demande');
         $demande = json_decode($dem);  
        $em = $this->getDoctrine()->getManager();

        $client = $em->getRepository('ProjetUserBundle:Client')->findOneById($idClient);
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
    
    
}