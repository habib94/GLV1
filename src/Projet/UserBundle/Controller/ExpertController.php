<?php

namespace Projet\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Projet\UserBundle\Entity\Prestation;
use Projet\UserBundle\Entity\Expert;


class ExpertController extends Controller
{
    
    /**
     * @Route("/agent_technique/experts")
     * @Method({"GET"})
     */
    public function getExpertsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $prest = $em->getRepository('ProjetUserBundle:Expert')->findDispo(true);

        return new JsonResponse($prest);
    }
}
