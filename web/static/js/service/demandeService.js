/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp=angular.module("GLApp");

GLApp.service("demandeService",['$http',function ($http){
   
  this.save = function (demande){
      return $http.post("/visiteur/demande",{
          demande : JSON.stringify(demande)
      });
  };
  
  this.demandesOfClientInSession = function (){
      return $http.get("/client/demandes");
  };
        
    
}]);