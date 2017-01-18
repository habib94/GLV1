<?php

namespace Projet\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Projet\UserBundle\Entity\Demande;
use Projet\UserBundle\Entity\Ouvrier;
use Projet\UserBundle\Entity\Tarif;
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
    /**
     * @Route("/agent_administratif/ouvriers")
     * @Method({"POST"})
     */
    public function enregisterOuvrierAction(){
           $em = $this->getDoctrine()->getManager();
         $o = $request->get('ouvrier');
         $ouvrier = json_decode($o);   
         $ouv = new Ouvrier();
         $ouv->setNom($ouvrier->nom);
         $ouv->setPrenom($ouvrier->prenom);
         $ouv->setAdresse($ouvrier->adresse);
         $ouv->setTel($ouvrier->tel);
         
          foreach($ouvrier->tarifs as $t){
              $tarif= new Tarif();
             $prestation = $em->getRepository(Prestation::class)->find($t->prestation->id);
             $tarif->setPrestation($prestation);
             $tarif->setPrix($t->prix);
           
             $em->persist($tarif);
             $ouv->addTarif($tarif);
         }
         
         $em->persist($ouv);
         $em->flush();
         return new JsonResponse(true);
    }
}