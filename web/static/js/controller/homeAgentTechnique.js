/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp = angular.module("GLApp");

GLApp.controller("homeAgentTechnique",["$scope","$uibModal","demandeService","$timeout",
    "session","$routeParams","devisService",
    function ($scope,$uibModal,demandeService,$timeout,session,$routeParams,devisService){
        
        $scope.demandes = [];
        
        $scope.etat = $routeParams.etat;
        
        $scope.getDemandes = function (){
            GLApp.openWaitDialog($uibModal);
            demandeService.getDemandeByEtat($scope.etat).then(function (response){
                GLApp.closeWaitDialog();
                $scope.demandes = response.data;
                GLApp.apply($scope,$timeout);
            },function (){
                GLApp.openErrorConnexionDialog($uibModal);
            });
        };
        
        $scope.getDemandes();
        
        $scope.accepterDevis = function (demande){
            GLApp.openWaitDialog($uibModal);
            devisService.accepterDevis(demande).then(function (){
                GLApp.closeWaitDialog();
                GLApp.openInformationDialog($uibModal,"La commande a été générée avec succès");
                $scope.getDemandes();
            },function (){
                GLApp.openErrorConnexionDialog($uibModal); 
            });
        };
        
        $scope.etablirDevis = function (demande){
            var uibModalInstance = $uibModal.open({
                animation: true,
                templateUrl: '/static/template/dialog/etablirDevis.html',
                controller: 'etablirDevis',
                resolve: {
                  demande: function () {
                    return demande;
                  }
                }
            });
            uibModalInstance.result.then(function (){
                $scope.getDemandes();
            },function (){
                
            });
        };   
        
        $scope.accepter = function (demande){
            var uibModalInstance = $uibModal.open({
                animation: true,
                templateUrl: '/static/template/dialog/choisirExpert.html',
                controller: 'choisirExpertDialog',
                resolve: {
                  demande: function () {
                    return demande;
                  }
                }
            });
            uibModalInstance.result.then(function (){
                $scope.getDemandes();
            },function (){
                
            });
        };
        
        $scope.refuser = function (demande){
           GLApp.openWarningDialog($uibModal,"est ce que vous êtes sûre de vouloir annuler cette demande",function (){
               demandeService.setEtatDemande(demande,"annulé").then(function (){
                   $scope.getDemandes();
               },function (){
                   GLApp.openErrorConnexionDialog($uibModal);
               });
           },function (){
           });  
        };
}]);