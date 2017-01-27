<?php

namespace Projet\UserBundle\Controller;

use Projet\UserBundle\Entity\Role;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class PageController extends Controller
{
    /**
     * @Route("/",name="index")
     */
    public function indexAction()
    {
        $user = $this->getUser();
        if($user === null){
            return $this->render('indexVisiteur.html.twig');
        }
        $roles = $user->getRoles();
        if(in_array(Role::$ROLE_CLIENT,$roles)){
            return $this->redirectToRoute("indexClient");
        }else if(in_array(Role::$ROLE_AGENT_ADMINISTRATIF,$roles)){
            return $this->redirectToRoute("indexAgentAdministratif");
        }else if(in_array(Role::$ROLE_AGENT_TECHNIQUE,$roles)){
            return $this->redirectToRoute("indexAgentTechnique");
        }
        return $this->render('indexVisiteur.html.twig');
    }

    /**
     * @Route("/agent_technique",name="indexAgentTechnique")
     */
    public function indexAgentTechniqueAction()
    {
        return $this->render('agentTechnique.html.twig');
    }
   
    /**
     * @Route("/agent_administratif",name="indexAgentAdministratif")
     */
    public function index_agent_administratifAction()
    {
        return $this->render('agent_administratif.html.twig');
    }
    
    /**
     * @Route("/client",name="indexClient")
     */
    public function clientPage() {
        return $this->render("client.html.twig");
    }
    
}
