var medecinApp=angular.module("medecinApp");

medecinApp.directive('myfile',["$parse","$timeout",function ($parse,$timeout){
    return {
        restrict: 'E',
        link: function(scope, element, attrs) {
            var fileElement = jQuery($(element).find("input[type=file]"))[0];
            var buttonElement = jQuery($(element).find("button"))[0];
            if(attrs.multiple !== undefined){
                $(fileElement).attr("multiple",attrs.multiple);
            }
            if(attrs.accept !== undefined){
                $(fileElement).attr("accept",attrs.accept);
            }
            if(attrs.directory !== undefined){
                $(fileElement).attr("multiple","");
                $(fileElement).attr("directory","");
                $(fileElement).attr("webkitdirectory","");
                $(fileElement).attr("mozdirectory","");
            }
            $(fileElement).change(function (){
                    if(attrs.ngName !== undefined){
                        var nameSetter = $parse(attrs.ngName).assign;
                        nameSetter(scope,fileElement.files[0].name);
                    }
                    if(attrs.ngUrl !== undefined){
                        var urlSetter = $parse(attrs.ngUrl).assign;
                        if(attrs.multiple !== undefined){
                            var array = [];
                            for(var i=0;i<fileElement.files.length;i++){
                                array[i] = medecinApp.createURL(fileElement.files[i]);
                            }
                            urlSetter(scope,array);
                        }else{
                            urlSetter(scope,medecinApp.createURL(fileElement.files[0]));
                        }
                    }
                    if(attrs.indice !== undefined){
                        var nbElement = parseInt(scope.form.get(attrs.form+"NB"));
                        for(var i=0;i<nbElement;i++){
                            scope.form.delete(attrs.form+"["+i+"]");
                        }
                        scope.form.set(attrs.form+"NB",fileElement.files.length);
                        for(var i=0;i<fileElement.files.length;i++){
                            scope.form.set(attrs.form+"["+i+"]",fileElement.files[i]);
                        }
                    }else{
                        if(attrs.directory !== undefined){
                            var directory = attrs.directory;
                            var valeurs = [];
                            scope.form.delete(attrs.form+"[]");
                            for(var i=0;i<fileElement.files.length;i++){
                                var file = fileElement.files[i];
                                var webkitRelativePath = file.webkitRelativePath;
                                var index = webkitRelativePath.indexOf("/");
                                webkitRelativePath = webkitRelativePath.substring(index+1);
                                index = webkitRelativePath.lastIndexOf("/");
                                if(index === -1){
                                    valeurs[i] = "";
                                }else{
                                    valeurs[i] = webkitRelativePath.substring(0,index);
                                }
                                scope.form.append(attrs.form+"[]",file);
                            }
                            var pathRelatifSetter = $parse(directory).assign;
                            pathRelatifSetter(scope,valeurs);
                        }
                        else if(attrs.multiple !== undefined){
                            scope.form.delete(attrs.form+"[]");
                            for(var i=0;i<fileElement.files.length;i++){
                                scope.form.append(attrs.form+"[]",fileElement.files[i]);
                            }
                        }else{
                            scope.form.set(attrs.form,fileElement.files[0]);
                        }     
                    }
                    $timeout(function (){
                        scope.$apply();
                    },1);
                    
                                   
            });
            $(buttonElement).click(function (){
                $(fileElement).click(); 
            });
        },
        template : "<input type='file' class='fileElement'/>"+
                "<button class='btn btn-default' >"+
                    "<i class='fa fa-upload' aria-hidden='true'></i>"+
                "</button>"
    };
}]);