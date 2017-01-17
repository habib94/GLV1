/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var medecinApp = angular.module("medecinApp");

medecinApp.filter("numeroFormulaire",function (){
    
    return function (numeroFormulaire){
        if(numeroFormulaire <= 10)
            return numeroFormulaire;
        return (numeroFormulaire-3)%8+3;
    };
});
