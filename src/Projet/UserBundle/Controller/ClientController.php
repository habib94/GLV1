<?php

namespace Projet\UserBundle\Controller;

use DateTime;
use Projet\UserBundle\Entity\Demande;
use Projet\UserBundle\Entity\Prestation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ClientController extends Controller
{
    
    /**
     * @Route("/client")
     */
    public function clientPage() {
        return $this->render("client.html.twig");
    }
    
     
    
    
}