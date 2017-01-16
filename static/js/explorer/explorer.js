var immeubleApp=angular.module("immeubleApp",["ngRoute","ui.bootstrap"]);immeubleApp.nbProjetsParPage=10;immeubleApp.urlProjetSimple="/projetsimple/";immeubleApp.urlProjet="/projet/";immeubleApp.closeDialog=function(){var a=$("#dialog .dialog");$("#dialogs-div").append(a)};immeubleApp.openDialog=function(a){var d=$("#dialog");a=$(a);d.append(a)};immeubleApp.changeZoom=function(a,d){a.css("zoom",d);a.css("-ms-zoom",d);a.css("-webkit-zoom",d);a.css("-moz-transform","scale("+d+","+d+")")};
immeubleApp.adjestWidthHeightFenetreHandler=function(){var a=$(window).width(),d=.5625*a,e=$(window).height()-50;d>e&&(d=e,a=16/9*d);var e=a-80,c=.5625*e;$(".planDimension").css("width",e+"px").css("height",c);e/=1920;immeubleApp.changeZoom($(".zoomPlan"),e);$(".fenetreDimensionWidth").css("width",a+"px");$(".fenetreDimension").css("width",a+"px");$(".fenetreDimension").css("height",d+"px");$("#content object").attr("width",a+"px");$("#content object").attr("height",d+"px");a/=1920;immeubleApp.changeZoom($(".zoom"),
a)};immeubleApp.createURL=function(a){return(window.URL?URL:webkitURL).createObjectURL(a)};immeubleApp.closeModalDialog=function(){var a=$("#modalDialog .dialog");$("#dialogs-div").append(a);a=$("#modalDialog");$(a).css("display","none")};immeubleApp.openModalDialog=function(a){var d=$("#modalDialog");a=$(a);$(d).append(a);$(d).css("display","block")};
immeubleApp.openDescriptionDialog=function(a,d,e){$("#descriptionDialog p").html(a);a=$("#descriptionDialog");$(a).css("display","block");$(a).css("top",e+"px");$(a).css("left",d+"px")};immeubleApp.closeDescriptionDialog=function(){var a=$("#descriptionDialog");$(a).css("display","none")};
immeubleApp.sendAjaxRequest=function(a,d,e,c,b){jQuery.ajax({url:a,data:d,cache:!1,contentType:!1,processData:!1,type:"POST",xhr:function(){var a=new window.XMLHttpRequest;void 0!==b&&(a.upload.addEventListener("progress",function(a){a.lengthComputable&&b(a.loaded/a.total*100)},!1),a.addEventListener("progress",function(a){a.lengthComputable&&b(a.loaded/a.total*100)},!1));return a},success:function(a){e(a)},error:function(a,b,e){void 0!==c&&c()}})};
immeubleApp.openWaitDialog=function(a){if(void 0===immeubleApp.waitDialog||null===immeubleApp.waitDialog)immeubleApp.waitDialog=a.open({animation:!0,templateUrl:"/static/framework/template/wait.html",windowClass:"wait"})};immeubleApp.closeWaitDialog=function(){void 0!==immeubleApp.waitDialog&&null!==immeubleApp.waitDialog&&(immeubleApp.waitDialog.close(),immeubleApp.waitDialog=null)};immeubleApp.openErrorConnexionDialog=function(a){immeubleApp.openErrorDialog(a,"Erreur de connexion")};
immeubleApp.apply=function(a,d){d(function(){a.$apply()},2)};immeubleApp.go=function(a,d,e){d(function(){a.path(e)},2)};immeubleApp.openErrorDialog=function(a,d){a.open({animation:!0,templateUrl:"/static/framework/template/errorDialog.html",controller:"errorDialog",resolve:{message:function(){return d}}}).result.then(function(a){},function(){})};
immeubleApp.openInformationDialog=function(a,d,e){var c=a.open({animation:!0,templateUrl:"/static/framework/template/informationDialog.html",controller:"informationDialog",resolve:{message:function(){return d}}});setTimeout(function(){c.close();void 0!==e&&e()},3E3);c.result.then(function(a){},function(){})};
immeubleApp.openWarningDialog=function(a,d,e,c){a.open({animation:!0,templateUrl:"/static/framework/template/warningDialog.html",controller:"warningDialog",resolve:{message:function(){return d}}}).result.then(function(a){e()},function(){c()})};immeubleApp.controller("warningDialog",function(a,d,e){a.message=e;a.ok=function(){d.close("ok")};a.cancel=function(){d.dismiss("cancel")}});immeubleApp.controller("informationDialog",function(a,d,e){a.message=e;a.ok=function(){d.close("ok")};a.cancel=function(){d.dismiss("cancel")}});
immeubleApp.controller("errorDialog",function(a,d,e){a.message=e;a.ok=function(){d.close("ok")};a.cancel=function(){d.dismiss("cancel")}});(function(){var a=1===angular.version.major&&0===angular.version.minor;angular.module("immeubleApp").directive("rangeSlider",function(d,e,c){var b=window.navigator.pointerEnabled?{start:"pointerdown",move:"pointermove",end:"pointerup",over:"pointerdown",out:"mouseout"}:window.navigator.msPointerEnabled?{start:"MSPointerDown",move:"MSPointerMove",end:"MSPointerUp",over:"MSPointerDown",out:"mouseout"}:{start:"mousedown touchstart",move:"mousemove touchmove",end:"mouseup touchend",over:"mouseover touchstart",
out:"mouseout"},f=b.start+".rangeSlider",h=b.move+".rangeSlider",g=b.end+".rangeSlider",w=b.over+".rangeSlider",z=b.out+".rangeSlider",u=function(a){try{return[a.clientX||a.originalEvent.clientX||a.originalEvent.touches[0].clientX,a.clientY||a.originalEvent.clientY||a.originalEvent.touches[0].clientY]}catch(b){return["x","y"]}},v=function(a){return 0>a?0:100<a?100:a},x=function(a){return!isNaN(parseFloat(a))&&isFinite(a)},b={disabled:"=?",min:"=",max:"=",modelMin:"=?",modelMax:"=?",onHandleDown:"&",
onHandleUp:"&",orientation:"@",step:"@",decimalPlaces:"@",filter:"@",filterOptions:"@",showValues:"@",pinHandle:"@",preventEqualMinMax:"@",attachHandleValues:"@",getterSetter:"@"};a&&(b.disabled="=",b.modelMin="=",b.modelMax="=");return{restrict:"A",replace:!0,template:'<div class="ngrs-range-slider"><div class="ngrs-runner"><div class="ngrs-handle ngrs-handle-min"><i></i></div><div class="ngrs-handle ngrs-handle-max"><i></i></div><div class="ngrs-join"></div></div><div class="ngrs-value-runner"><div class="ngrs-value ngrs-value-min" ><div>{{filteredModelMin}}</div></div><div class="ngrs-value ngrs-value-max" ><div>{{filteredModelMax}}</div></div></div></div>',
scope:b,link:function(a,b,q,K){function k(b){return a.getterSetter?arguments.length?a.modelMin(b):a.modelMin():arguments.length?a.modelMin=b:a.modelMin}function l(b){return a.getterSetter?arguments.length?a.modelMax(b):a.modelMax():arguments.length?a.modelMax=b:a.modelMax}function I(a){"min"===a?(angular.element(m[0]).css("display","none"),angular.element(m[1]).css("display","block")):"max"===a?(angular.element(m[0]).css("display","block"),angular.element(m[1]).css("display","none")):(angular.element(m[0]).css("display",
"block"),angular.element(m[1]).css("display","block"))}function J(a){a?p.addClass("ngrs-disabled"):p.removeClass("ngrs-disabled")}function F(){a.min>a.max&&C("min must be less than or equal to max");angular.isDefined(a.min)&&angular.isDefined(a.max)&&(x(a.min)||C("min must be a number"),x(a.max)||C("max must be a number"),t=a.max-a.min,D())}function D(){k()>l()&&(c.warn("modelMin must be less than or equal to modelMax"),k(l()));if((angular.isDefined(k())||"min"===a.pinHandle)&&(angular.isDefined(l())||
"max"===a.pinHandle)){x(k())||("min"!==a.pinHandle&&c.warn("modelMin must be a number"),k(a.min));x(l())||("max"!==a.pinHandle&&c.warn("modelMax must be a number"),l(a.max));var b=v((k()-a.min)/t*100),f=v((l()-a.min)/t*100),d,h;a.attachHandleValues&&(d=b,h=f);k(Math.max(a.min,k()));l(Math.min(a.max,l()));if(a.filter&&a.filterOptions)a.filteredModelMin=e(a.filter)(k(),a.filterOptions),a.filteredModelMax=e(a.filter)(l(),a.filterOptions);else if(a.filter){var g=a.filter.split(":"),p=a.filter.split(":")[0],
r=g.slice().slice(1),r=r.map(function(a){if(x(a))return+a;if('"'==a[0]&&'"'==a[a.length-1]||"'"==a[0]&&"'"==a[a.length-1])return a.slice(1,-1)}),g=r.slice(),r=r.slice();g.unshift(k());r.unshift(l());a.filteredModelMin=e(p).apply(null,g);a.filteredModelMax=e(p).apply(null,r)}else a.filteredModelMin=k(),a.filteredModelMax=l();a.min===a.max&&k()==l()?(angular.element(m[0]).css(n,"0%"),angular.element(m[1]).css(n,"100%"),a.attachHandleValues&&(angular.element(y[0]).css(n,"0%"),angular.element(y[1]).css(n,
"100%")),angular.element(G).css(n,"0%").css(A,"0%")):(angular.element(m[0]).css(n,b+"%"),angular.element(m[1]).css(n,f+"%"),a.attachHandleValues&&(angular.element(y[0]).css(n,d+"%"),angular.element(y[1]).css(n,h+"%"),angular.element(y[1]).css(A,"auto")),angular.element(G).css(n,b+"%").css(A,100-f+"%"),95<b&&angular.element(m[0]).css("z-index",3))}}function H(b){var e=m[b];e.bind(f+"X",function(c){var f=(0===b?"ngrs-handle-min":"ngrs-handle-max")+"-down",m=((0===b?k():l())-a.min)/t*100,n=u(c),r=n,
q=!1;if(angular.isFunction(a.onHandleDown))a.onHandleDown();angular.element("body").bind("selectstart.rangeSlider",function(){return!1});a.disabled||(E=!0,e.addClass("ngrs-down"),p.addClass("ngrs-focus "+f),angular.element("body").addClass("ngrs-touching"),d.bind(h,function(c){c.preventDefault();c=u(c);var f,d,h=a.step/t*100,g=((0===b?l():k())-a.min)/t*100;"x"!==c[0]&&(c[0]-=n[0],c[1]-=n[1],f=[r[0]!==c[0],r[1]!==c[1]],d=m+100*c[B]/(B?p.height():p.width()),d=v(d),a.preventEqualMinMax&&(0===h&&(h=1/
t*100),0===b?g-=h:1===b&&(g+=h)),0===b?d=d>g?g:d:1===b&&(d=d<g?g:d),0<a.step&&100>d&&0<d&&(d=Math.round(d/h)*h),95<d&&0===b?e.css("z-index",3):e.css("z-index",""),f[B]&&d!=q&&(0===b?k(parseFloat(parseFloat(d*t/100+a.min).toFixed(a.decimalPlaces))):1===b&&l(parseFloat(parseFloat(d*t/100+a.min).toFixed(a.decimalPlaces))),a.$apply(),q=d),r=c)}).bind(g,function(){if(angular.isFunction(a.onHandleUp))a.onHandleUp();d.off(h);d.off(g);angular.element("body").removeClass("ngrs-touching");E=!1;e.removeClass("ngrs-down");
e.removeClass("ngrs-over");p.removeClass("ngrs-focus "+f)}))}).on(w,function(){e.addClass("ngrs-over")}).on(z,function(){E||e.removeClass("ngrs-over")})}function C(b){a.disabled=!0;throw Error("RangeSlider: "+b);}var p=angular.element(b),m=[b.find(".ngrs-handle-min"),b.find(".ngrs-handle-max")],y=[b.find(".ngrs-value-min"),b.find(".ngrs-value-max")],G=b.find(".ngrs-join"),n="left",A="right",B=0,t=0,E=!1;a.filteredModelMin=k();a.filteredModelMax=l();q.$observe("disabled",function(b){angular.isDefined(b)||
(a.disabled=!1);a.$watch("disabled",J)});q.$observe("orientation",function(b){angular.isDefined(b)||(a.orientation="horizontal");b=a.orientation.split(" ");for(var e=0,c=b.length;e<c;e++)b[e]="ngrs-"+b[e];b=b.join(" ");p.addClass(b);if("vertical"===a.orientation||"vertical left"===a.orientation||"vertical right"===a.orientation)n="top",A="bottom",B=1});q.$observe("step",function(b){angular.isDefined(b)||(a.step=0)});q.$observe("decimalPlaces",function(b){angular.isDefined(b)||(a.decimalPlaces=0)});
q.$observe("showValues",function(b){angular.isDefined(b)?a.showValues="false"===b?!1:!0:a.showValues=!0});q.$observe("pinHandle",function(b){angular.isDefined(b)?a.pinHandle="min"===b||"max"===b?b:null:a.pinHandle=null;a.$watch("pinHandle",I)});q.$observe("preventEqualMinMax",function(b){angular.isDefined(b)?a.preventEqualMinMax="false"===b?!1:!0:a.preventEqualMinMax=!1});q.$observe("attachHandleValues",function(e){angular.isDefined(e)?"true"===e||""===e?(a.attachHandleValues=!0,b.find(".ngrs-value-runner").addClass("ngrs-attached-handles")):
a.attachHandleValues=!1:a.attachHandleValues=!1});a.$watch("min",F);a.$watch("max",F);a.$watch(function(){return k()},D);a.$watch(function(){return l()},D);a.$on("$destroy",function(){p.off(".rangeSlider");angular.element("body").off(".rangeSlider");d.off(".rangeSlider");for(var a=0,b=m.length;a<b;a++)m[a].off(".rangeSlider"),m[a].off(".rangeSliderX")});p.bind("selectstart.rangeSlider",function(a){return!1}).bind("click",function(a){a.stopPropagation()});H(0);H(1)}}});window.requestAnimFrame=function(){return window.requestAnimationFrame||
window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(a){window.setTimeout(a,1E3/60)}}()})();immeubleApp=angular.module("immeubleApp");
immeubleApp.service("appartementService",function(){var a={},d=null;this.removeAppartement=function(a,c,b){var f=new FormData;f.set("id",c);f.set("idProjet",a);immeubleApp.sendAjaxRequest("/admin/appartement/remove",f,function(a){b(a)})};this.getAppartement=function(e,c){if(null===e)void 0===a.id?d=c:c(a);else if(void 0===a.id||a.id!=e){var b=new FormData;b.set("id",e);immeubleApp.sendAjaxRequest("/appartement.json",b,function(b){a=b;c(a);null!==d&&d(a)})}else c(a)};this.rechercheAppartements=function(a,
c,b){var f=new FormData;f.set("idProjet",a);f.set("condition",JSON.stringify(c));immeubleApp.sendAjaxRequest("/rechercheappartements.json",f,function(a){b(a)})};this.getAppartementsProjet=function(a,c){var b=new FormData;b.set("idProjet",a);immeubleApp.sendAjaxRequest("/appartements.json",b,function(a){c(a)})}});immeubleApp=angular.module("immeubleApp");immeubleApp.service("etageService",function(){var a={},d=null;this.removeEtage=function(a,c){var b=new FormData;b.set("id",a);immeubleApp.sendAjaxRequest("/admin/etage/remove",b,c)};this.getEtage=function(e,c){if(null===e)void 0===a.id?d=c:c(a);else if(void 0===a.id||a.id!=e){var b=new FormData;b.set("id",e);immeubleApp.sendAjaxRequest("/etage.json",b,function(b){a=b;c(a);null!==d&&d(a)})}else c(a)}});immeubleApp=angular.module("immeubleApp");immeubleApp.service("immeubleService",function(){var a={},d=null;this.getImmeuble=function(e,c){if(null===e)void 0===a.id?d=c:c(a);else if(void 0===a.id||a.id!=e){var b=new FormData;b.set("id",e);immeubleApp.sendAjaxRequest("/immeuble.json",b,function(b){a=b;c(a);null!==d&&d(a)})}else c(a)};this.removeImmeuble=function(a,c,b){var f=new FormData;f.set("id",c);f.set("idProjet",a);immeubleApp.sendAjaxRequest("/admin/immeuble/remove",f,function(a){b(a)})}});immeubleApp=angular.module("immeubleApp");immeubleApp.directive("stringToNumber",function(){return{require:"ngModel",link:function(a,d,e,c){c.$parsers.push(function(a){return""+a});c.$formatters.push(function(a){return parseFloat(a)})}}});
immeubleApp.directive("myfile",function(a,d){return{restrict:"E",link:function(e,c,b){var f=jQuery($(c).find("input[type=file]"))[0];c=jQuery($(c).find("button"))[0];void 0!==b.multiple&&$(f).attr("multiple",b.multiple);void 0!==b.accept&&$(f).attr("accept",b.accept);void 0!==b.directory&&($(f).attr("multiple",""),$(f).attr("directory",""),$(f).attr("webkitdirectory",""),$(f).attr("mozdirectory",""));$(f).change(function(){if(void 0!==b.ngName){var c=a(b.ngName).assign;c(e,f.files[0].name)}if(void 0!==
b.ngUrl){var g=a(b.ngUrl).assign;if(void 0!==b.multiple){for(var w=[],c=0;c<f.files.length;c++)w[c]=immeubleApp.createURL(f.files[c]);g(e,w)}else g(e,immeubleApp.createURL(f.files[0]))}if(void 0!==b.indice){g=parseInt(e.form.get(b.form+"NB"));for(c=0;c<g;c++)e.form["delete"](b.form+"["+c+"]");e.form.set(b.form+"NB",f.files.length);for(c=0;c<f.files.length;c++)e.form.set(b.form+"["+c+"]",f.files[c])}else if(void 0!==b.directory){w=b.directory;g=[];e.form["delete"](b.form+"[]");for(c=0;c<f.files.length;c++){var z=
f.files[c],u=z.webkitRelativePath,v=u.indexOf("/"),u=u.substring(v+1),v=u.lastIndexOf("/");g[c]=-1===v?"":u.substring(0,v);e.form.append(b.form+"[]",z)}c=a(w).assign;c(e,g)}else if(void 0!==b.multiple)for(e.form["delete"](b.form+"[]"),c=0;c<f.files.length;c++)e.form.append(b.form+"[]",f.files[c]);else e.form.set(b.form,f.files[0]);d(function(){e.$apply()},1)});$(c).click(function(){$(f).click()})},template:"<input type='file' class='fileElement'/><button class='btn btn-default' ><i class='fa fa-upload' aria-hidden='true'></i></button>"}});immeubleApp=angular.module("immeubleApp");
immeubleApp.service("projetService",function(){var a={},d=null;this.modifierAppartements=function(a,c,b){var f=new FormData;f.set("appartements",JSON.stringify(a));immeubleApp.sendAjaxRequest("/promoteur/modifierappartements",f,c,b)};this.donneAcces=function(a,c,b,f){var d=new FormData;d.set("nomProjet",a);d.set("nomPromoteur",c);immeubleApp.sendAjaxRequest("/admin/donneacces",d,b,f)};this.envoyerEmail=function(a,c,b,f,d){var g=new FormData;g.set("login",a);g.set("password",c);g.set("email",b);immeubleApp.sendAjaxRequest("/admin/email",
g,function(){f()},function(){d()})};this.dupliquerProjet=function(a,c,b){var d=new FormData;d.set("idProjet",a);immeubleApp.sendAjaxRequest("/admin/projet/dupliquer",d,function(){c()},function(){b()})};this.rechercherProjets=function(a,c){var b=new FormData;b.set("nom",a);immeubleApp.sendAjaxRequest("/admin/projet/recherche",b,function(a){c(a)})};this.removeProjetAllDiaporama=function(a,c){var b=new FormData;b.set("idProjet",a);immeubleApp.sendAjaxRequest("/admin/projet/removealldiaporama",b,function(a){c()})};
this.removeProjetDiaporama=function(a,c,b){var d=new FormData;d.set("diaporama",c);d.set("idProjet",a);immeubleApp.sendAjaxRequest("/admin/projet/removediaporama",d,function(a){b()})};this.isProjetExist=function(a,c,b,d){var h=new FormData;h.append("nom",a);immeubleApp.sendAjaxRequest("/admin/projet/isExist",h,function(a){JSON.parse(a)?c():b()},function(){d()})};this.getProjet=function(e,c,b){null===e&&void 0===a.id?d=c:null===e?c(a):void 0!==b||void 0===a.id||a.id!=e?(b=new FormData,b.set("id",e),
immeubleApp.sendAjaxRequest("/projet.json",b,function(b){a=b;c(a);null!==d&&d(a)})):c(a)};this.getProjets=function(a,c){var b=new FormData;b.set("page",a);b.set("nb",immeubleApp.nbProjetsParPage);immeubleApp.sendAjaxRequest("/projets.json",b,function(a){c(a)})};this.removeProjet=function(a,c,b){var d=new FormData;d.append("id",a);immeubleApp.sendAjaxRequest("/admin/projet/remove",d,function(){c()},function(){b()})};this.addProjet=function(a,c,b,d,h){c.set("projet",JSON.stringify(a));immeubleApp.sendAjaxRequest("/admin/projet/formAjouter",
c,function(a){b(a)},function(){d()},function(a){h(a)})};this.modifierProjet=function(a,c,b,d,h){c.set("projet",JSON.stringify(a));immeubleApp.sendAjaxRequest("/admin/projet/formModifier",c,function(){b()},function(){d()},function(a){h(a)})}});immeubleApp=angular.module("immeubleApp");
immeubleApp.service("projetSimpleService",function(){var a={},d=null;this.rechercherProjets=function(a,c){var b=new FormData;b.set("nom",a);immeubleApp.sendAjaxRequest("/admin/projetsimple/recherche",b,function(a){c(a)})};this.removeProjetAllDiaporama=function(a,c){var b=new FormData;b.set("idProjet",a);immeubleApp.sendAjaxRequest("/admin/projetsimple/removealldiaporama",b,function(a){c()})};this.removeProjetDiaporama=function(a,c,b){var d=new FormData;d.set("diaporama",c);d.set("idProjet",a);immeubleApp.sendAjaxRequest("/admin/projetsimple/removediaporama",
d,function(a){b()})};this.getProjet=function(e,c,b){null===e&&void 0===a.id?d=c:null===e?c(a):void 0!==b||void 0===a.id||a.id!=e?(b=new FormData,b.set("id",e),immeubleApp.sendAjaxRequest("/projetsimple.json",b,function(b){a=b;c(a);null!==d&&d(a)})):c(a)};this.getProjets=function(a,c){var b=new FormData;b.set("page",a);b.set("nb",immeubleApp.nbProjetsParPage);immeubleApp.sendAjaxRequest("/projetssimples.json",b,function(a){c(a)})};this.isProjetExist=function(a,c,b,d){var h=new FormData;h.append("nom",
a);immeubleApp.sendAjaxRequest("/admin/projetsimple/isExist",h,function(a){JSON.parse(a)?c():b()},function(){d()})};this.addProjet=function(a,c,b,d,h){c.set("projet",JSON.stringify(a));immeubleApp.sendAjaxRequest("/admin/projetsimple/formAjouter",c,function(){b()},function(){d()},function(a){h(a)})};this.modifierProjet=function(a,c,b,d,h){c.set("projet",JSON.stringify(a));immeubleApp.sendAjaxRequest("/admin/projetsimple/formModifier",c,function(){b()},function(){d()},function(a){h(a)})};this.removeProjet=
function(a,c,b){var d=new FormData;d.append("id",a);immeubleApp.sendAjaxRequest("/admin/projetsimple/remove",d,function(){c()},function(){b()})}});immeubleApp=angular.module("immeubleApp");immeubleApp.config(["$interpolateProvider",function(a){a.startSymbol("[[[");a.endSymbol("]]]")}]);