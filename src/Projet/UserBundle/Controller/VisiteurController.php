<?php

namespace Projet\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Projet\UserBundle\Entity\Prestation;

class VisiteurController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('indexVisiteur.html.twig');
    }


    /**
     * @Route("/visiteur/prestations")
     * @Method({"GET"})
     */
    public function getPrestationsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $prest = $em->getRepository('ProjetUserBundle:Prestation')->findAll();

        
        return new JsonResponse($prest);
    }
    
}
