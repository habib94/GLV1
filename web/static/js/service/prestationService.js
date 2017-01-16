/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp=angular.module("GLApp");

GLApp.service("prestationService",['$http',function ($http){
   
  this.getTous = function (){
      return $http.get("/visiteur/prestations");
  };
        
    
}]);