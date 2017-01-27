/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp = angular.module("GLApp");

GLApp.controller("satisfaction",["$scope","$uibModal","$uibModalInstance",
        "demande","satisfactionService",
    function ($scope,$uibModal,$uibModalInstance,demande,satisfactionService){
    
    $scope.demande = demande;
    $scope.satisfaction = {qualite:0,proprote:0,respect:0};
    
    $scope.ok = function (){
        satisfactionService.save($scope.demande,$scope.satisfaction).then(function (){
           GLApp.openInformationDialog($uibModal,"Merci"); 
           $uibModalInstance.close();
        },function (){
            GLApp.openErrorConnexionDialog($uibModal);
        });
    };
    
    $scope.cancel = function (){
        $uibModalInstance.dismiss();
    };
        
}]);