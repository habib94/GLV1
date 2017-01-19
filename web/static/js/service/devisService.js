/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp=angular.module("GLApp");

GLApp.service("devisService",['$http',function ($http){
   
   
   this.etablirDevis = function (demande,devis){
       return $http.post("agent_technique/demandes/"+demande.id+"/devis",{
          devis : JSON.stringify(devis) 
       });
   };
   
   this.accepterDevis = function (demande){
       return $http.put("agent_technique/demandes/"+demande.id+"/devis");
   };
        
    
}]);