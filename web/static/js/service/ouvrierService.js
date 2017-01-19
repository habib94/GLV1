/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp=angular.module("GLApp");

GLApp.service("ouvrierService",['$http',function ($http){
   
   this.affectOuvrierAuDemande = function (demande,ouvrier){
       return $http.post("/agent_technique/demandes/"+demande.id+"/ouvrier/"+ouvrier.id);
   };
   
   this.getOuvriers= function (){
       return $http.get("/agent_administratif/ouvriers");
   };
   
   this.getOuvriersDisponile= function (){
       return $http.get("/agent_administratif/ouvriers?disponible=true");
   };
   
   this.save = function (ouvrier){
       return $http.post("/agent_administratif/ouvriers",{
           ouvrier : JSON.stringify(ouvrier)
       });
   };
        
    
}]);