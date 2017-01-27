/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var GLApp=angular.module("GLApp");

GLApp.service("loginService",['$http',function ($http){
   
   
   this.login = function (compte,callS,callF){
       var data = new FormData();
       data.set("_username",compte.email);
       data.set("_password",compte.motdepasse);
       jQuery.ajax({
            url: '/login',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
               return xhr;
            },
            success: function(data, textStatus, xhr){
              
                callS(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                callF();
            }
        });
   };   
        
    
}]);