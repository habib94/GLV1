/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp = angular.module("GLApp");

GLApp.controller("choisirExpertDialog",["$scope","$uibModal","$uibModalInstance",
        "demande","expertService","demandeService",
    function ($scope,$uibModal,$uibModalInstance,demande,expertService,demandeService){
    
    $scope.demande = demande;
    
    $scope.experts = [];
    $scope.expertChosie = {};
    
    expertService.getTous().then(function (reponse){
        $scope.experts = reponse.data;
    },function (){
        GLApp.openErrorConnexionDialog($uibModal);
    });
    
    $scope.ok = function (){
        if($scope.expertChosie.id){
            demandeService.setExpert($scope.demande,$scope.expertChosie).then(function (){
                $uibModalInstance.close();
            },function (){
               GLApp.openErrorConnexionDialog($uibModal); 
            });
        }
    };
    
    $scope.cancel = function (){
        $uibModalInstance.dismiss();
    };
        
}]);