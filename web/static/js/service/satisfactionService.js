/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp=angular.module("GLApp");

GLApp.service("satisfactionService",['$http',function ($http){
   
   
   this.save = function (demande,satisfaction){
       return $http.post("/client/"+demande.id+"/satisfactions",{
           satisfaction : JSON.stringify(satisfaction)
       });
   };
        
    
}]);