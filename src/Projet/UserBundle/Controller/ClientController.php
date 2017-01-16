<?php

namespace Projet\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Projet\UserBundle\Entity\Prestation;
use Projet\UserBundle\Entity\Demande;

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

              $formatted = [];
        foreach ($demandes as $p) {
            $formatted[] = [
               'id' => $p->getIdDemande(),
               'datePrestation' => $p->getDatePrestation(),
               'dateDemande' => $p->getDateDemande(),
               'etat' => $p->getEtat(),
            ];
        }

        return new JsonResponse($formatted);
        //return new json_encode($prest);
    }
    
    
}