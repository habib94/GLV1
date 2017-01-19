<?php

namespace Projet\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Projet\UserBundle\Entity\Expert;
use Projet\UserBundle\Entity\Demande;

class ExpertController extends Controller
{
    
    /**
     * @Route("/agent_technique/experts")
     * @Method({"GET"})
     */
    public function getExpertsAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $experts = $em->getRepository('ProjetUserBundle:Expert')->findDispo(true);
        return new JsonResponse($experts);
    }
    /**
     * @Route("/agent_technique/demandes/{idDemande}/expert/{idExpert}")
     * @Method({"POST"})
     */
    public function affecterExpertAction(Request $request,$idDemande, $idExpert){
       
          $em = $this->getDoctrine()->getManager();
          $expert=$em->getRepository('ProjetUserBundle:Expert')->findOneById($idExpert);
          $demande=$em->getRepository('ProjetUserBundle:Demande')->findOneById($idDemande);
          $expert->setDisponible(false);
          $demande->setExpert($expert);
          $demande->setEtat("encours");
          $em->persist($demande);
          $em->persist($expert);
          $em->flush();
         return new JsonResponse(true);
    }
}
  
