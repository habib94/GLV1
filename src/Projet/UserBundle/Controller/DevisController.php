<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Projet\UserBundle\Controller;

use Projet\UserBundle\Entity\Commande;
use Projet\UserBundle\Entity\Demande;
use Projet\UserBundle\Entity\Devis;
use Projet\UserBundle\Entity\LigneDevis;
use Projet\UserBundle\Entity\Prestation;
use Projet\UserBundle\Response\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of DevisController
 *
 * @author el-habib
 */
class DevisController extends Controller
{
    /**
     * @Route("agent_technique/demandes/{idDemande}/devis")
     * @Method({"PUT"})
     */
    public function accepterDevis($idDemande) {
        $em = $this->getDoctrine()->getEntityManager();
        
        $demande =$em->getRepository(Demande::class)->find($idDemande);
        
        $demande->setEtat("validée");
        
        $commande = new Commande();
        $commande->setOuvrier($demande->getOuvrier());
        $commande->setDemande($demande);
        $demande->setCommande($commande);
        $devis = $demande->getDevis();
        $devis->setEtat("accepté");
        
        $em->persist($devis);
        $em->persist($commande);
        $em->persist($demande);
        $em->flush();
        return JsonResponse::getJsonResponse(true);
    }
    
    
    /**
     * @Route("agent_technique/demandes/{idDemande}/devis")
     * @Method({"POST"})
     */
    public function etablirDevis(Request $request,$idDemande){
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $demande =$em->getRepository(Demande::class)->find($idDemande);
        
        $devisStd = json_decode($request->get('devis'));
        
        $devis = new Devis();
        $devis->setEtat("nouveau");
        $demande->setEtat("réglée");
        $montantTotal = 0;
        foreach ($devisStd->lignesDevis as $ligneStd) {
            $ligneDevis = new LigneDevis();
            $ligneDevis->setMontant($ligneStd->montant);
            $montantTotal = $montantTotal+$ligneStd->montant;
            $prestation = $em->getRepository(Prestation::class)->find($ligneStd->prestation->id);
            $ligneDevis->setPrestation($prestation);
            $devis->addLigneDevis($ligneDevis);
        }
        $devis->setMontantTotal($montantTotal);
        $demande->setDevis($devis);
        $expert = $demande->getExpert();
        $expert->setDisponible(true);
        $em->persist($expert);
        $em->persist($demande);
        $em->persist($devis);
        $em->flush();
        return JsonResponse::getJsonResponse(true);
    }
    
}
