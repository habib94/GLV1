<?php

namespace Projet\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


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
}
