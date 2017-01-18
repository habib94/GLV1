/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp = angular.module("GLApp");

GLApp.controller("homeAgentTechnique",["$scope","$uibModal","demandeService","$timeout","session",
    function ($scope,$uibModal,demandeService,$timeout,session){
        
        $scope.demandes = [];
        
        $scope.getDemandes = function (){
            demandeService.getDemandeByEtat("nouveau").then(function (response){
                $scope.demandes = response.data;
                $scope.$apply();
            },function (){
                GLApp.openErrorConnexionDialog($uibModal);
            });
        };
        
        $scope.getDemandes();
        
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