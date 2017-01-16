<?php

namespace Projet\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Projet\UserBundle\Entity\Prestation;
use Projet\UserBundle\Entity\Demande;

class DemandeController extends Controller
{
    
     /**
     * @Route("/visiteur/demandes")
     * @Method({"GET"})
     */
    public function addDemande(\Projet\UserBundle\Entity\Demande $demande){
  return $this->render('ProjetUserBundle:visiteur:login.html.twig');
    }
}
