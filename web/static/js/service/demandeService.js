/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp=angular.module("GLApp");

GLApp.service("demandeService",['$http',function ($http){
   
  this.save = function (demande){
      return $http.post("/visiteur/demandes",{
         demande: JSON.stringify(demande)
      });
  };
  
  this.demandesOfClient = function (client){
      return $http.get("/client/"+client.id+"/demandes");
  };
        
   this.getDemandeByEtat = function (etat){
       return $http.get("/agent_technique/demandes",{
           etat : etat
       });
   };
   
   this.setExpert = function (demande,expert){
       return $http.post("/agent_technique/demandes/"+demande.id+"/expert/"+expert.id);
   };
        
    
}]);