/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp = angular.module("GLApp");

GLApp.controller("etablirDevis",["$scope","$uibModal","$uibModalInstance",
        "demande","ouvrierService","devisService",
    function ($scope,$uibModal,$uibModalInstance,demande,ouvrierService,devisService){
    
    $scope.demande = demande;
    $scope.demande.devis = {lignesDevis:[]};
    
    $scope.ouvriers = [];
    
    ouvrierService.getOuvriersDisponile().then(function (reponse){
        $scope.ouvriers = reponse.data;
    });
    
    for(var i=0;i<$scope.demande.prestations.length;i++){
        $scope.demande.devis.lignesDevis = $scope.demande.devis.lignesDevis.concat({
           prestation : $scope.demande.prestations[i] 
        });
    }
    
    $scope.ok = function (){
        devisService.etablirDevis($scope.demande,$scope.demande.devis).then(function (){
            ouvrierService.affectOuvrierAuDemande($scope.demande,$scope.demande.ouvrier).then(function (){
                GLApp.openInformationDialog($uibModal,"Devis a été bien créé");
                 $uibModalInstance.close();
            },function (){
                GLApp.openErrorConnexionDialog($uibModal);
            });
          
        },function (){
            GLApp.openErrorConnexionDialog($uibModal);
        });
    };
    
    $scope.cancel = function (){
        $uibModalInstance.dismiss();
    };
        
}]);