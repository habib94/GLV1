<?php

namespace Projet\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ClientController extends Controller
{
    
     /**
     * @Route("/client/demandes")
     * @Method({"GET"})
     */
    public function getClientDemande(){

        $user=$this->container->get('security.token_storage')->getToken()->getUser();
        
        $em = $this->getDoctrine()->getManager();

        $demandes = $em->getRepository('ProjetUserBundle:Demande')->findByClient($user);

       
        return new JsonResponse($demandes);
    }
    
    
}