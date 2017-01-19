/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var GLApp= angular.module("GLApp");

GLApp.factory("session",function (){
   
    var user = {id:1};
    
    return {
       user : function (){
            return user;
        },
        setUser : function (newUser){
            user = newUser;
        }
    };
        
});
