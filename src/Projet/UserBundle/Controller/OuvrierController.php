<?php

namespace Projet\UserBundle\Controller;

use Projet\UserBundle\Entity\Demande;
use Projet\UserBundle\Entity\Ouvrier;
use Projet\UserBundle\Entity\Prestation;
use Projet\UserBundle\Entity\Tarif;
use Projet\UserBundle\Response\JsonResponse as JsonResponse2;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class OuvrierController extends Controller
{
     /**
     * @Route("/agent_administratif/ouvriers")
     * @Method({"GET"})
     */
    public function getOuvriersAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if($request->get('disponible') !== null){
             $o = $em->getRepository('ProjetUserBundle:Ouvrier')->findDispo(true);      
        }else{
            $o = $em->getRepository('ProjetUserBundle:Ouvrier')->findAll();
        }
        return JsonResponse2::getJsonResponse($o);
    }
    
    /**
     * @Route("/agent_technique/demandes/{idDemande}/ouvrier/{idOuvrier}")
     * @Method({"POST"})
     */
    public function affectOuvrierAuDemande($idDemande,$idOuvrier) {
        $em = $this->getDoctrine()->getManager();
        $demande = $em->getRepository(Demande::class)->find($idDemande);
        $ouvrier = $em->getRepository(Ouvrier::class)->find($idOuvrier);
        $demande->setOuvrier($ouvrier);
        $em->persist($demande);
        $em->flush();
        return JsonResponse2::getJsonResponse(true);
    }
    
    /**
     * @Route("/agent_administratif/ouvriers")
     * @Method({"POST"})
     */
    public function enregisterOuvrierAction(Request $request){
         $em = $this->getDoctrine()->getManager();
         $o = $request->get('ouvrier');
         $ouvrier = json_decode($o);   
         $ouv = new Ouvrier();
         $ouv->setNom($ouvrier->nom);
         $ouv->setPrenom($ouvrier->prenom);
         $ouv->setTel($ouvrier->tel);
         $ouv->setAdresse($ouvrier->adresse);
         $em->persist($ouv);
         foreach($ouvrier->tarifs as $t){
             $tarif= new Tarif();
             $prestation = $em->getRepository(Prestation::class)->find($t->prestation->id);
             $tarif->setPrestation($prestation);
             $tarif->setPrix($t->prix);
             $tarif->setOuvrier($ouv);
             $em->persist($tarif);
             $ouv->addTarif($tarif);
         }
         
         $em->flush();
         return new JsonResponse(true);
    }
}