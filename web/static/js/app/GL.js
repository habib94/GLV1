/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var GLApp=angular.module("GLApp",
    ['ngRoute','ui.bootstrap','pascalprecht.translate','ngCookies','nvd3',"ngAnimate","rzModule"]);


GLApp.constant("EVENTS",{
    CHECK_VALIDATION : "erreur-check-validity-event"
});


GLApp.openWaitDialog = function ($uibModal){
    if(GLApp.waitDialog === undefined || GLApp.waitDialog ===null){
      GLApp.startWaitDialog = new Date();
        GLApp.waitDialog = $uibModal.open({
            animation: true,
             templateUrl: '/static/template/wait.html',
             windowClass :'wait'
        });
    }
}

GLApp.closeWaitDialog = function (){
        if(GLApp.waitDialog !== undefined && GLApp.waitDialog !== null){
          var b = new Date()-GLApp.startWaitDialog;
          var c = 200 - b;
          if(c < 0){
             c = 0;
          }
          setTimeout(function(){
            GLApp.waitDialog.close("dismiss");
             GLApp.waitDialog = null;     
          },c);
         
       }
}

GLApp.openErrorConnexionDialog = function ($uibModal){
    $uibModal.open({
      animation: true,
      templateUrl: '/static/template/errorConnexionDialog.html',
      controller: 'errorDialog',
      windowClass :'errorConnexion',
      resolve : {
          message : function (){
              return "";
          }
      }
    });

}

GLApp.apply = function ($scope,$timeout){
    $timeout(function (){
           $scope.$apply();
    },2);
}

GLApp.go = function ($location,$timeout,url){
    $timeout(function (){
        $location.path(url);
    },2);
}

GLApp.openErrorDialog = function ($uibModal,message){
     $uibModal.open({
      animation: true,
      templateUrl: '/static/template/errorDialog.html',
      controller: 'errorDialog',
      windowClass :'errorConnexion',
      resolve: {
        message: function () {
          return message;
        }
      }
    });

}

GLApp.openInformationDialog = function ($uibModal,message,f){
    var modalInstance = $uibModal.open({
      animation: true,
      templateUrl: '/static/template/informationDialog.html',
      controller: 'informationDialog',
      resolve: {
        message: function () {
          return message;
        }
      }
    });
    
    setTimeout(function (){
        modalInstance.close();
        if(f !== undefined){
            f();
        }
    },2000);

    modalInstance.result.then(function (returnValue) {
       if(f !== undefined){
            f();
        }
    }, function () {
       if(f !== undefined){
            f();
        }
    });

};

GLApp.openWarningDialog = function ($uibModal,message,oui,non){
    var modalInstance = $uibModal.open({
      animation: true,
      templateUrl: '/static/template/warningDialog.html',
      controller: 'warningDialog',
      resolve: {
        message: function () {
          return message;
        }
      }
    });

    modalInstance.result.then(function (returnValue) {
       oui();
    }, function () {
        if(non !== undefined){
            non();
        }
    });

};

 

GLApp.controller("warningDialog",function ($scope, $uibModalInstance,message) {

  $scope.message= message;

  $scope.ok = function () {
    $uibModalInstance.close('ok');
  };

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };
  
});

GLApp.controller("informationDialog",function ($scope, $uibModalInstance,message) {

  $scope.message= message;
  
  $scope.index = 200;

  $scope.ok = function () {
    $uibModalInstance.close('ok');
  };

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };
  
});

GLApp.controller("errorDialog",function ($scope, $uibModalInstance,message) {

  $scope.message= message;
  $scope.index = 140;

  $scope.ok = function () {
    $uibModalInstance.close('ok');
  };

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };
  
});
