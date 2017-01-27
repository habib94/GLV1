<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Projet\UserBundle\Controller;

use Projet\UserBundle\Response\JsonResponse;
use Projet\UserBundle\Security\Encoder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of SecurityController
 *
 * @author el-habib
 */
class SecurityController extends Controller{
    
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request){
        return JsonResponse::getJsonResponse(true);  
    }
    
    /**
     * 
     * @Route("/password")
     */
    public function encodePassword(Request $request) {
        $autService = $this->get('security.authentication.manager');
       
        return JsonResponse::getJsonResponse($autService);
    }
    
    /**
     * @Route("/service/userinsession")
     * @Method({"GET"})
     */
    public function getUserInSession(){
        $user = $this->getUser();
        return JsonResponse::getJsonResponse($user);
    }
    
    
}
