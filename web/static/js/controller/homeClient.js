/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp = angular.module("GLApp");

GLApp.controller("homeClient",["$scope","$uibModal","demandeService","$timeout","session",
    function ($scope,$uibModal,demandeService,$timeout,session){
        
        $scope.demandes = [];
        demandeService.demandesOfClient(session.user()).then(function (reponse){
            $scope.demandes = reponse.data;
            $scope.$apply();
        },function (){
            GLApp.openErrorConnexionDialog($uibModal);
        });
        
}]);