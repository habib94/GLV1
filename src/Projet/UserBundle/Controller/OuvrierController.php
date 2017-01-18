<?php

namespace Projet\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Projet\UserBundle\Entity\Demande;
use Projet\UserBundle\Entity\Ouvrier;

class OuvrierController extends Controller
{
     /**
     * @Route("/agent_administratif/ouvriers")
     * @Method({"GET"})
     */
    public function getOuvriersAction(){
        $em = $this->getDoctrine()->getManager();
        $o = $em->getRepository('ProjetUserBundle:Ouvrier')->findAll();
        return new JsonResponse($o);
    }
   
}