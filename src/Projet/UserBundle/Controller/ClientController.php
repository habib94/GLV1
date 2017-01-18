<?php

namespace Projet\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

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
    
    
}