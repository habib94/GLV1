<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Projet\UserBundle\Security;

use Projet\UserBundle\Entity\Compte;


/**
 * Description of Encoder
 *
 * @author el-habib
 */
class Encoder {
   
    public static $encoderService;
    
    public static function setEncoder($encoderService){
        self::$encoderService = $encoderService;
    }
    
    public static function codePassword($password){
        $user = new Compte();
        return self::$encoderService->encodePassword($user, $password);
    }
    
}
