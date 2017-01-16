/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var GLApp=angular.module("GLApp");

GLApp.directive('validation', function (){ 
    /**
     * exemple validation="" regex="^[A-Za-z ]{2,25}$" et/ou required=""  et/ou valeur
     */
   return {
      require: 'ngModel',
      link: function(scope, elem, attr, ngModel) {
          if(attr.required){
              ngModel.$setValidity("required",false);
          }
          
          var regex = attr.regex;

          //For DOM -> model validation
          ngModel.$parsers.unshift(function(value) {
             if(value === undefined){
                    return undefined;
              }
              if(regex !== undefined){
                    if(attr.norequired !== undefined && value===''){
                        ngModel.$setValidity('regex',true);
                        ngModel.$setValidity('required',true);
                        return value;
                    }else{
                        var isValid = value.match(regex) !== null;
                        ngModel.$setValidity('regex', isValid);
                    }
              }else if(attr.valeur !== undefined){
                  var v = attr.valeur;
                  ngModel.$setValidity('equal',value===v);
              }else if(attr.objet !== undefined){
                   
                    var isValid = false;
                    ngModel.$setValidity('require',isValid);
              }
              var isValid = value !== null;
              ngModel.$setValidity('required',isValid);
              return value;
          });

          //For model -> DOM validation
          ngModel.$formatters.unshift(function(value) {
             if(value === undefined){
                    return undefined;
              }
              if(regex !== undefined){
                    if(attr.norequired !== undefined && value===''){
                        ngModel.$setValidity('regex',true);
                        ngModel.$setValidity('required',true);
                        return value;
                    }else{
                        var isValid = value.match(regex) !== null;
                        ngModel.$setValidity('regex', isValid);
                    }
              }else if(attr.valeur !== undefined){
                  var v = scope.valeur;
                  ngModel.$setValidity('equal',value===v);
              }else if(attr.objet !== undefined){
                    var isValid = value !== '';
                    ngModel.$setValidity('require',isValid);
              }
              ngModel.$setValidity('required',value !== null);
              
              return value;
          });
      }
   };
});

GLApp.directive('erreur',["EVENTS",function (EVENTS){ 
   return {
      restrict: 'A',
      require: '^form',
      link: function(scope, el, attr, formCtrl) {
                    
            // find the text box element, which has the 'name' attribute
          var inputEl   = el[0].querySelector("[name]");
          // convert the native text box element to an angular element
          var inputNgEl = angular.element(inputEl);
          // get the name on the text box so we know the property to check
          // on the form controller
          var inputName = inputNgEl.attr('name');

          // only apply the has-error class after the user leaves the text box
          inputNgEl.bind('blur', function() {
            el.toggleClass('has-error', formCtrl[inputName].$invalid);
          });
          
          scope.$on(EVENTS.CHECK_VALIDATION, function() {
            el.toggleClass('has-error', formCtrl[inputName].$invalid);
          });  
         
      }
   };
}]);
