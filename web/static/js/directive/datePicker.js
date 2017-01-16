/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var medecinApp=angular.module("medecinApp");

medecinApp.directive("datePicker",function ($parse){
   
    var directive = {
        restrict : "A",
        require :['ngModel'],
        link : link
    };
    
    return directive;
    
    function link(scope,element,attr,ctrls){
        
        var ctrl = ctrls[0];
        
        ctrl.$parsers.push(function (viewValue){
            return new Date(viewValue.getTime() - (60000*viewValue.getTimezoneOffset()));
        });
    }
    
});

