<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Projet\UserBundle\Controller;

use Projet\UserBundle\Entity\Satisfaction;
use Projet\UserBundle\Response\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of SatisfactionController
 *
 * @author el-habib
 */
class SatisfactionController extends Controller{
    
    /**
     * @Route("/client/{idDemande}/satisfactions")
     * @Method({"POST"})
     */
    public function saveSatisfaction($idDemande,Request $request) {
        $em = $this->getDoctrine()->getManager();
        $demande = $em->getRepository('ProjetUserBundle:Demande')->findOneById($idDemande);
        $satisfactionStd = json_decode($request->get('satisfaction'));
        $satisfaction = new Satisfaction();
        $satisfaction->setQualite($satisfactionStd->qualite);
        $satisfaction->setProprote($satisfactionStd->proprote);
        $satisfaction->setRespect($satisfactionStd->respect);
        $satisfaction->setCommande($demande->commande);
        $em->persist($satisfaction);
        $em->flush();
        return JsonResponse::getJsonResponse(true);
    }
    
}
