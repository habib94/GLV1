<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Projet\UserBundle\Response;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Description of JsonResponse
 *
 * @author el-habib
 */
class JsonResponse {
    
    
  
    
    public static function getJsonResponse ($obj){
        $encoder = new JsonEncoder();
        $normalizer = new GetSetMethodNormalizer();

        
        $callback = function ($dateTime) {
            return $dateTime instanceof \DateTime
                ? $dateTime->format(\DateTime::ISO8601)
                : '';
        };

        $normalizer->setCallbacks(array('datePrestation' => $callback,"dateDemande"=>$callback));
        
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        
        $serializer = new Serializer(array($normalizer), array($encoder));
        
        $json =$serializer->serialize($obj, 'json');
        return new Response($json,200,array(
            'Content-Type'=> 'application/json'
        ));
    }
    
}
