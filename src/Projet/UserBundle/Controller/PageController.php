<?php

namespace Projet\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;



class PageController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('indexVisiteur.html.twig');
    }

    /**
     * @Route("/agent_technique")
     */
    public function indexAgentTechniqueAction()
    {
        return $this->render('agentTechnique.html.twig');
    }
   
    /**
     * @Route("/agent_administratif")
     */
    public function index_agent_administratifAction()
    {
        return $this->render('agent_administratif.html.twig');
    }
    
}
