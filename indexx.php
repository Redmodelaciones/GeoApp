<?php global $_m¬IncLV;global $_m¬HTML;global $_m¬RASync;global $_m¬MED;global $_m¬CCERR;global $_m¬SS;global $_m¬PLG;global $_m¬SMTP;global $_m¬POP3;global $_m¬IMAPI;if(!isset($_m¬IncLV)){$_m¬IncLV=0;}if(!isset($_m¬RASync)){$_m¬RASync=array();}if(!isset($_m¬MED)){$_m¬MED=array();}if($_m¬IncLV<=0){setlocale(LC_ALL,'es_PE.iso-8859-1');setlocale(LC_TIME,'es_PE.iso-8859-1');$_u¬KrnFil="../rt.core/Kernel.php";require_once(isset($_m¬KrnFil)?$_m¬KrnFil:(is_file($_u¬KrnFil)?$_u¬KrnFil:'rt.core/Kernel.php'));$_m¬PHP_CMPL=true;$_m¬JSIN=false;$_m¬CCERR=0;}if(_¬IsNE($VIEW)){$VIEW="999999";}$_m¬HTML=true;if(!_¬IsHttps()){_¬ReDir(_¬MyUrl('https'));}$MPU=(_¬True((_¬Exists("../js/RTLOCALE.js")?'True':'False'))?"../":"");echo("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">".vbCr."<html xmlns=\"http://www.w3.org/1999/xhtml\">".vbCr."<head>".vbCr."<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />".vbCr."<title>Geolocalizador</title>".vbCr."<meta name=\"robots\" content=\"noindex, nofollow\" />".vbCr."<meta name=\"viewport\" content=\"initial-scale=1,maximum-scale=1,user-scalable=no\" />".vbCr."<link href=\"//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700\" rel=\"stylesheet\" />".vbCr."<style type=\"text/css\">".vbCr."html,body{ overflow:hidden;}".vbCr."body {color: #404040;margin: 0;padding: 0;-webkit-font-smoothing: antialiased;}".vbCr."body,button{font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', Sans-serif;}".vbCr."* {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}".vbCr.".sidebar {position: absolute;width: 30%;height: 100%;top: 0;left: 0;overflow: hidden; border-style:solid; border-color:rgba(0, 0, 0, 0.25);border-right-width: 1px; border-bottom-width:0px; border-top-width:0px; border-left-width:0px; background-color:#FFFFFF;}".vbCr.".pad2 {padding: 20px;}".vbCr.".map {position: absolute;left: 30%;width: 70%;top: 0;bottom: 0;}".vbCr."h1 {font-size: 22px;margin: 0;font-weight: 400;line-height: 20px;padding: 20px 2px;}".vbCr."a {color: #404040;text-decoration: none;}".vbCr."a:hover {color: #101010;}".vbCr.".heading {".vbCr."background: #fff;".vbCr."border-bottom: 1px solid #eee;".vbCr."min-height: 60px;".vbCr."line-height: 60px;".vbCr."padding: 0 10px;".vbCr."color: #fff;".vbCr."}".vbCr.".nearbox {".vbCr."border-bottom: 2px solid #eee;".vbCr."padding: 0 10px;".vbCr."color: #fff;".vbCr."position:fixed;".vbCr."bottom:15px;".vbCr."right:5px;".vbCr."cursor:pointer;".vbCr."}".vbCr.".listings {height: 100%;overflow: auto;padding-bottom: 60px;}".vbCr.".listings .item {display: block;border-bottom: 1px solid #eee;padding: 10px;text-decoration: none; text-align:left;}".vbCr.".listings .item:last-child {border-bottom: none;}".vbCr.".listings .item .title {display: block;color: #2F3B59;font-weight: 700;}".vbCr.".listings .item .title small {font-weight: 400;}".vbCr.".listings .item.active .title, .listings .item .title:hover {color: #8cc63f;}".vbCr.".listings .item.active {background-color: #f8f8f8;}".vbCr.".clearfix {display: block;}".vbCr.".clearfix:after {content: '.';display: block;height: 0;clear: both;visibility: hidden;}".vbCr."/* Marker tweaks */".vbCr.".mapboxgl-popup {padding-bottom: 50px;}".vbCr.".mapboxgl-popup-close-button {display: none;}".vbCr.".mapboxgl-popup-content {font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', Sans-serif;padding: 0;width: 275px;}".vbCr.".mapboxgl-popup-content-wrapper {padding: 1%;}".vbCr.".mapboxgl-popup-content h3 {background: #a29bfe;color: #fff;margin: 0;display: block;padding: 10px;border-radius: 3px 3px 0 0;font-weight: 700;margin-top: -15px;}".vbCr.".mapboxgl-popup-content h4 {margin: 0;display: block;padding: 10px 10px 10px 10px;font-weight: 400;}".vbCr.".mapboxgl-popup-content div {padding: 10px;}".vbCr.".mapboxgl-container .leaflet-marker-icon {cursor: pointer;}".vbCr.".mapboxgl-popup-anchor-top > .mapboxgl-popup-content {margin-top: 15px;}".vbCr.".mapboxgl-popup-anchor-top > .mapboxgl-popup-tip {border-bottom-color: #a29bfe;}".vbCr.".text-center{text-align:center}".vbCr."h2{".vbCr."padding:0px;".vbCr."margin:0px;".vbCr."height: 24px;".vbCr."width: 32px;".vbCr."display: block;".vbCr."overflow: hidden;".vbCr."background-size: 100% 100%;".vbCr."background-repeat: no-repeat;".vbCr."}".vbCr.".btflo, h2{float: right;margin-bottom: -8px;}".vbCr.".SCRLL{".vbCr."overflow:auto;".vbCr."display:block;".vbCr."padding: 2px;".vbCr."}".vbCr.".SCRLL div{".vbCr."width:160px;".vbCr."float:left;".vbCr."margin:3px;".vbCr."padding:2px;".vbCr."display:block;".vbCr."border: 1px solid #DFDFDF;".vbCr."}".vbCr.".SCRLL div:hover{ background-color:#F5F4FF;}".vbCr.".allpais{ background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAYCAYAAACbU/80AAABrklEQVR42mP8DwQMAwgYsTng5MmnDOvX32A4e/YZw5499yiywMVFicHYWIohMFCDwdxcGr8D3rz5zlBdvZdBRISLISpKl0FZWYiBjY2ZgYmJPMv//WNg+PXrL8Pdu+8Yli27DDT/G0NrqzPQfE5MB4Asj4xcw9DQ4MBgbS1Lk+A+evQx0PwDDMuXh8AdAXdAevoWhrg4fZpZjuyIRYsuMsyc6YNwACjON226CQweJ5paDgPV1fsY/PzUwWkC7ICKir0MsbF6DNraonRxwNWrrxkWL77E0NHhDHGAq+tihs2boxg4OJgxFDMyNsLZ///XY5VDFyck9+PHXwZf32UMu3fHQhwAUvz3bz3W1E4LB4ByBzNzI1gO7gBChmAzkFwHwOQHtwOIsZAuDsAG6OqAAQkBYg2mqgOQsyGpDsAWRfjkMLIhvoKIFgCjIBrwohhbZdTYeJAhIkKHQV1dmOHmzbcMmZlbGaZP9yabv2LFFYb6enuw2RiVEUgQvToGadLQmMKwfXsMg6fnEorpGzdywI7BWh2DGNgaJNTwOTIfb4ME5ogBa5IhgwFrlA4EAADGzPbIbdN+ygAAAABJRU5ErkJggg==');}".vbCr.".clsico{ background-image:url('data:image/png;base64,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');}".vbCr.".HDCBS{display:none;}".vbCr.".heading button{margin-top:-5px; margin-left:0px; margin-right:0px; margin-bottom:0px;; padding:0px;}".vbCr.".nfoSldFull{ z-index:9;".vbCr."transition: opacity 1s ease-in-out;".vbCr."-webkit-transition: opacity 1s;".vbCr."-o-transition: opacity 1s ease-in-out;".vbCr."-moz-transition: opacity 1s ease-in-out;".vbCr."color: #FFFFFF;display: flex;".vbCr."justify-content: center;".vbCr."align-items: center; font-size:14pt;font-weight:bold; padding:15px;".vbCr."}".vbCr."@media (max-width:".$VIEW."px){".vbCr.".map {left: 0px;width: 100%;top: 50px;bottom: 0;}".vbCr.".sidebar {width: 100%;height: 50px;top: 0;left: 0;border-right-width: 0px;border-bottom-width: 1px; padding:0px;}".vbCr.".listings{position:fixed; left:0px; top:50px; width:100%; bottom:0px; z-index:9;background-color:#FFFFFF;}".vbCr.".HDTIT{ display:none;}".vbCr.".HDCBS{display:inline-block;}".vbCr.".heading {min-height: 50px;line-height: 50px;height: 50px;padding: 6px 2px;}".vbCr.".heading button{margin:0px; padding:0px;height:32px; font-weight:bold;}".vbCr."h1{ padding:0px;}".vbCr."}".vbCr."</style>".vbCr."<link href=\"".$MPU."css/style.css\" rel=\"stylesheet\" type=\"text/css\" />".vbCr."</head>".vbCr."<body>");$_x¬DBt='';$_m¬DBdfc="";$__¬DB=_¬Directorio((_¬True((_¬Exists("DBMYSQL.rt-odbc")?'True':'False'))?"DBMYSQL":"../DBMYSQL"));if(_¬Odbc($__¬DB,'_x¬DB')){$_m¬DB->Name=_¬ClearIns($__¬DB);_¬DSet('_i¬DB_'.$_m¬DB->Name,$_m¬DB,false);}else{_¬WErrEx('No Existe el Origen de Datos: '.str_ireplace('.rt-odbc.php','',$__¬DB));}_¬LoadAdapter(_¬True(""));include('_F_.0.php');$_u¬FN=strtoupper("REGCLINAV");$_m¬SS->JSFUN(strtoupper(_¬getPath($_u¬FN)),$_u¬FN);echo("<script type=\"text/javascript\" src=\"".$MPU."js/RTLOCALE.js?11\"></script><script type=\"text/javascript\" src=\"".$MPU."js/NEO.POPUP.js\"></script>".vbCr."<div id=\"LOCDAT\" class=\"map\" style=\"color:#FFFFFF\">Su Navegador no Soporta el Diseñador de Mapas Interactivos !!, Consulte con el Desarrollador del Adaptador: <a href=\"https://wa.me/51936718237\" target=\"_blank\">https://wa.me/51936718237</a></div>".vbCr."<p>&nbsp;</p>".vbCr."<div class=\"sidebar\">".vbCr."<div class=\"heading dark-header\">".vbCr."<h1><span class=\"HDTIT\">Sucursales</span><span class=\"HDCBS\"><button type=\"button\" id=\"BTSLSUC\" onclick=\"swrs=!swrs;ATACH();ClearFilter();\">Buscar..</button></span>".vbCr."<button type=\"button\" class=\"btflo\" title=\"Cambiar de Sucursal\" onclick=\"XSelPais()\"><h2 id=\"GICO\" class=\"allpais\" style=\"float:none; margin:0px;\"></h2></button></h1>".vbCr."</div>".vbCr."<div id=\"listings\" class=\"listings\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"5\">".vbCr."<tr>".vbCr."<td width=\"40\">Filtro:</td>".vbCr."<td><input type=\"text\" id=\"filter\" style=\"width:100%;\" placeholder=\"Escribe la Localidad o Nombre del Negocio\"/></td>".vbCr."</tr>".vbCr."</table>".vbCr."<span id=\"listcnt\"></span></div>".vbCr."</div>".vbCr."<div id=\"NRSUC\" class=\"nearbox dark-header\">Buscando el Mas Cercano ...</div>".vbCr."<div id=\"PNNFOKEY\" class=\"map nfoSldFull FrmDisa\" style=\"display:none;opacity:0;\" onmousedown=\"PNNFOKEY.style.display='none';\">Mantén pulsada la tecla Ctrl mientras te desplazas para acercar o alejar el mapa</div>");$_m¬HTML=false;?><script type="text/javascript">var milatitud=null,milongitude=null,dfpais='**',lspais=new Array,csucu=0,nlpais=0,rgfch='',fstRG=1;lspais['**']='Todos',swrs=0;<?php 
echo("var MPU=\"".$MPU."\",vwsiz="._¬SqlNull($VIEW,"FL").";");?>var PNNFOKEY=OB("PNNFOKEY"),listings=OB('listings'),listcnt=OB("listcnt"),filter=OB("filter"),NRSUC=OB("NRSUC"),GICO=OB("GICO"),BTSLSUC=OB("BTSLSUC");var LokCtxMenu=location.href.indexOf('?DEBUG')<0||(location.href.indexOf('://localhost')<0&&location.href.indexOf('://127.0.0.1')<0);AddContext(window,function(){return !window.LokCtxMenu;});/* https://api.mapbox.com/geocoding/v5/mapbox.places/-73.989,40.733.json?access_token=pk.eyJ1Ijoiam9hcXVpbm9iZWQiLCJhIjoiY2s4bW1hcndqMHA0ODNmcHpycGJvNmNlZSJ9.8Qm1EduT8JbAHRCA0Xjrwg *//*Creando Diseñador de Mapa*/TokenMPB='pk.eyJ1Ijoiam9hcXVpbm9iZWQiLCJhIjoiY2s4bW1hcndqMHA0ODNmcHpycGJvNmNlZSJ9.8Qm1EduT8JbAHRCA0Xjrwg';ThemeMPB='streets-v11';var MP=new RTLOCALE_MPB("LOCDAT",milatitud,milongitude);/*Eventos*/MP.oninit=function(ok){console.log('Mapa Graficado !!');/* Asociate Links References */MP.ForEach(function(o){var listing=OB(o.id.replace(/marker/g,'listing'));listing.omk=o;o.item=listing;});/* Localizador */MP.AddPosition();/* Calculo el Mas Cercano */MP.NearMarker(onCalcNear,'marker');/* Graficando Mi Posicion */var o=RegSuc(null,'Ubicación Inicial','','','',MP.lt,MP.lg,'miumk');/*Registro UNS*/RegBS0(o);SortItems();};function getOLink(o){return OB(o.id.replace('marker-','link-'));}function SelMarker(o,e){o.Fly();var ro=getOLink(o);o.PopUp(ro?ro.msgpop:'Mi Ubicación');if(ro){/* Resaltar listado en la barra lateral */var activeItem = document.getElementsByClassName('active');e.stopPropagation();if(activeItem[0]){activeItem[0].classList.remove('active');}var listing=document.getElementById('listing-'+ro.xid);listing.classList.add('active');}}AddEvent(NRSUC,'click',function(o,e){o.o.click();});function onCalcNear(o,lt,lg){NRSUC.style.display=o?'':'none';if(o){var ro=getOLink(o);NRSUC.o=o;NRSUC.innerHTML='<h2 style="width:34px;height:26px;float:right;border:2px solid #FF8000;background-image:url(\''+nfo_PROTOCOL+'://flagcdn.com/h20/'+ro.nnac+'.png'+'\');"></h2>Remodelador Mas Cercano:<br>'+ro.msgpop;}SortItems();}/* Estilo de Marca */MP.AddCss('.marker{border: none;cursor: pointer;height: 66px;width: 66px;background-image: url('+MPU+'img/marker.png);background-color: rgba(255, 128, 0, 0);}.miumk{border: none;cursor: pointer;height: 56px;width: 56px;background-image: url('+MPU+'img/miumk.png) !important;background-color: rgba(255, 128, 0, 0);}');/*Metodos*/function RegSuc(id,storeName,address,city,phone,latitude,longitude,cs){csucu=csucu+1;if(id==null){id='X'+getId();}if(!cs){cs='marker';}/* Marcador */var omk=MP.AddMarker(latitude,longitude,'marker-'+id,0,-23,cs,function(o){/* Al Crear el Marcador */AddEvent(o,'click',SelMarker);});/* Link en la Lista */var listing=CreateOB('div','listing-'+id,'item','',listcnt);/* Link Reference */if(omk){listing.omk=omk;omk.item=listing;}var link=CreateOB('a','link-'+id,'title','<h2>Remodelador:</h2>'+storeName,listing);link.href='#';link.xid=id;link.ico=link.firstChild;link.cs=cs;link.hdt=CreateOB('div','','','',listing);link.ndir=Trim(address+' '+city);link.ntel=phone;link.Upd=function(){var o=this||link;o.ico.style.backgroundImage='url(\''+(o.nnac?nfo_PROTOCOL+'://flagcdn.com/h20/'+o.nnac+'.png':'')+'\')';o.ico.title=o.nncd;o.hdt.innerHTML=(o.ndir?o.ndir:(o.nadr?'RF&gt; '+o.nadr:'&laquo; Ubicación Desconocida &raquo;'))+(o.ntel?'<br> Teléfono: '+o.ntel:'');};link.Upd();link.latitude=latitude;link.longitude=longitude;link.msgpop='<h3 class="text-center">'+storeName+'</h3> <h4>'+(address?''+address+'<br>':'')+(phone?'<b>Teléfono: </b>'+phone:'')+'</h4>';/* Click en el Item */AddEvent(link,'click',function(o,e){XRndPais(o.nnac);MP.FlyTo(o.latitude,o.longitude);MP.PopUp(o.latitude,o.longitude,o.msgpop);var activeItem = document.getElementsByClassName('active');if(activeItem[0]){activeItem[0].classList.remove('active');}this.parentNode.classList.add('active');if(swrs){swrs=0;ATACH();}});/* Discover Nationaly */UnivLocalize(function(ok,r,o){var p,f;for(p=0;p<r.features.length;p++){f=r.features[p];if(f&&f.id){if(f.id.indexOf('poi.')==0){/*Direccion Relativa*/o.nadr=f.place_name;}else if(f.id.indexOf('country.')==0){/*Pais*/o.nnac=f.properties.short_code;o.nncd=f.text;}}}o.Upd();/*G-SNK*/if(o.cs=='marker'){lspais[o.nnac]=o.nncd;}else if(o.cs=='miumk'){dfpais=o.nnac;RegBS0(o);}nlpais=nlpais+1;if(csucu==nlpais){XRndPais(dfpais);}},latitude,longitude,null,link);return link;}/* Registro BASE */function RegBS0(o){if(!fstRG&&!rgfch){setTimeout(function(){RegBS0(o);},100);return 0;}fstRG=0;REGCLINAV(function(r,h){if(h=='OK'){rgfch=r;}else{RXGenError(h);}},o.nnac||'',o.nncd||'',o.nadr||'',MP.lt,MP.lg,rgfch);}/* Cambio Filtro de Pais */function XRndPais(ps){if(!ps||ps=='**'||!lspais[ps]){GICO.className='allpais';GICO.style.backgroundImage='';ps='**'}else{GICO.className='';GICO.style.backgroundImage='url('+nfo_PROTOCOL+'://flagcdn.com/h20/'+ps+'.png'+')';}GICO.ps=ps;/*Filtrando Pais*/var tg=listcnt.getElementsByTagName('a'),u,o;for(u=0;u<tg.length;u++){o=tg[u];Parent(o).style.display=ps=='**'||ps==o.nnac||o.cs=='miumk'?'':'none'}/* RE-Calculo el Mas Cercano, filtrando el Pais */MP.NearMarker(onCalcNear,'marker',null,null,function(o){o=getOLink(o);return ps=='**'||ps==o.nnac;});}/* PopUp - Selector de Pais */function XSelPais(){var h='<table border="0" cellspacing="0" cellpadding="0" width="100%"><tr><th class="heading dark-header"><h1>Pais</h1></th><th width="10" class="heading dark-header"><h2 style="float:none; margin:0px;height:32px;" class="clsico" title="Cerrar" onclick="FrmBack.hide()"></h2></th></tr><tr><td colspan="2"><div id="tmppcs" class="SCRLL">';for(ps in lspais){h=h+'<div onclick="XRndPais(\''+ps+'\');FrmBack.hide();"><table width="100%" cellspacing="5" cellPadding="0" border="0"><tr><td width="10"><h2 style="float:none; margin:0px;'+(ps=='**'?'" class="allpais"':'background-Image:url('+nfo_PROTOCOL+'://flagcdn.com/h20/'+ps+'.png'+');')+'"></h2></td><td>'+lspais[ps]+'</td></tr></table></div>';}h=h+'</div></td></tr></table>';FrmHtml(h,520,400,1,0);tmppcs=OB("tmppcs");if(IsDroid()){PopMax(1);}ATACH();}/*Filtros y Organización*/function SortItems(){var n=MP._mrk.length,i,k,o1,o2,aux;for(k=1;k<n;k++){for(i=0;i<(n-k);i++){o1=MP._mrk[i];o2=MP._mrk[i+1];if(o1.dis>o2.dis){InterchangeOB(o1.item,o2.item);aux=MP._mrk[i];MP._mrk[i]=MP._mrk[i+1];MP._mrk[i+1]=aux;}}}}function ClearFilter(){filter.value='';filter.focus();MP.ForEach(function(o){if(o&&o.item){o.item.style.display='';}});}var AFFIL='';AddKeys(filter,function(k,o,e){if(AFFIL!=o.value){AFFIL=o.value;MP.ForEach(function(o){if(o&&o.item){o.item.style.display=!filter.value||o.item.innerText.toLowerCase().indexOf(filter.value.toLowerCase())>=0?'':'none';}});}},1);/*Control Dinamizador RT*/var tmppcs;var ATACH=atcWinSize(function(SS,HH,WW){FrmAtch(SS,HH,WW);if(tmppcs){HH=PoHt-60;tmppcs.style.height=HH+'px';}BTSLSUC.style.width=(WW-42)+'px';listings.style.display=WW>vwsiz||swrs?'':'none';});/*Constructor*/MP.Init();<?php 
if(_¬True($EMBED)){?>MP.ScrollEnabled(0);var WP=Parent(window),SHWNSC=0,SNKDLG,IsCtr=0;MP.onmouseover=function(o,e){SHWNSC=1;TestWheel();};MP.onmouseout=function(o,e){SHWNSC=0;TestWheel();};function TestWheel(){MP.ScrollEnabled(IsCtr);if(IsCtr){hideDLG();}}function hideDLG(){clearTimeout(SNKDLG);PNNFOKEY.style.display='none';PNNFOKEY.style.opacity=0;}function showDLG(){clearTimeout(SNKDLG);PNNFOKEY.style.display='';PNNFOKEY.style.opacity=1;SNKDLG=setTimeout(hideDLG,3000);}function ONSNKDLG(o,e){var PsCT=IsCtr||e.ctrlKey;if(PsCT){e.preventDefault();}if(SHWNSC&&PNNFOKEY.style.display=='none'&&!PsCT){showDLG();};}function _KeyDown(k,o,e){if(k==17&&!IsCtr){IsCtr=1;TestWheel();}}function _KeyUp(k,o,e){if(k==17&&IsCtr){IsCtr=0;TestWheel();}}AddEvent(WP,'scroll',ONSNKDLG);AddEvent(WP,'mousewheel',ONSNKDLG,{passive:false});AddEvent(window,'mousewheel',ONSNKDLG,{passive:false});AddKeys(WP,_KeyDown);AddKeys(window,_KeyDown);AddKeys(WP,_KeyUp,1);AddKeys(window,_KeyUp,1);showDLG();<?php }try{$_u¬JSFls='';$_u¬CRWFls=0;$_u¬TB=null;$_t¬DB=$_m¬DB;if($_u¬CRWFls<1){$_u¬CRWFls=(_¬IsNE($_u¬JSFls)?60:1);}$_u¬HTML="RegSuc('{id}',unescape('{storeName:escape}'),unescape('{address:escape}'),unescape('{city:escape}'),unescape('{phoneFormatted:escape}'),\"{latitude}\",\"{longitude}\");";$_u¬SQL=trim("select * from stores");$_u¬MDVarSet=false;$_u¬VAR=trim("");if($_u¬MDVarSet){_¬DSet($_u¬VAR,'');}if(_¬IndexOf($_u¬SQL,'BUFFER:',true)==0){$_u¬TB=_¬DGet('_BF¬'.strtoupper(trim(substr($_u¬SQL,7))));}if(!isset($_t¬DB)&&!isset($_u¬TB)){_¬WErrEx('Primero debe generar un Schema, abrir una Base de Datos con DBOPEN o usar una Herramienta de Terceros, tambien puede usar DBCHANGE, si ya aperturo una conexion activa !!','DBHTML X-SQL: select * from stores X-HTML: RegSuc(\'{id}\',unescape(\'{storeName:escape}\'),unescape(\'{address:escape}\'),unescape(\'{city:escape}\'),unescape(\'{phoneFormatted:escape}\'),\"{latitude}\",\"{longitude}\");');}elseif(_¬IsNE($_u¬SQL)){_¬WError("No se localiza el comando SQL, utilize la sintaxis 'X-SQL:' y 'X-HTML:'");}elseif(!_¬IsNE($_u¬HTML)){$_u¬XHT=explode('{',$_u¬HTML);$_u¬XPR=array();$_u¬XTP=array();$_u¬StP=1;$_u¬CCL=count($_u¬XHT);while($_u¬StP<$_u¬CCL){_¬ParseA($_u¬XHT[$_u¬StP],'}',$_u¬LX);$_u¬P=explode(':',$_u¬LX.'::::');$_u¬XPR[$_u¬StP]=$_u¬P;$_u¬HTPc=strtoupper($_u¬P[1]);if($_u¬HTPc=='ESCAPE'){$_u¬TP=1;}else{$_u¬TP=0;}$_u¬XTP[$_u¬StP]=$_u¬TP;$_u¬StP=$_u¬StP+1;}if(!_¬IsNE($_u¬JSFls)&&_¬IndexOf($_u¬JSFls,'(')<0){$_u¬JSFls=$_u¬JSFls.'()';}$_u¬CNT='';$_u¬PSR=0;$_u¬RErr=false;if(!isset($_u¬TB)){$_u¬TB=$_t¬DB->LectorSQL($_u¬SQL,$_u¬RErr);}if($_u¬RErr){_¬WError('SQL-FETCH-ERROR: '.$_t¬DB->GetError(),$_u¬SQL);}else{try{foreach($_u¬TB->RWS->C as $RW){$_u¬CNT=$_u¬CNT.$_u¬XHT[0];$_u¬StP=1;while($_u¬StP<$_u¬CCL){$_u¬P=$_u¬XPR[$_u¬StP];if(!_¬IsNE($_u¬P[0])){if($_u¬XTP[$_u¬StP]==0){$_u¬CNT=$_u¬CNT.$RW->Cells($_u¬P[0]);}else{$_u¬CNT=$_u¬CNT._¬PreStrTip($RW->Cells($_u¬P[0]),$_u¬XTP[$_u¬StP],$_u¬PSR,$_u¬P);}}$_u¬CNT=$_u¬CNT.$_u¬XHT[$_u¬StP];$_u¬StP=$_u¬StP+1;}$_u¬PSR++;if($_u¬PSR%$_u¬CRWFls==0){if(!_¬IsNE($_u¬JSFls)){$_u¬CNT=$_u¬CNT.'<script type="text/javascript">'.$_u¬JSFls.';</script>';}if($_u¬MDVarSet){_¬DSet($_u¬VAR,_¬DGet($_u¬VAR).$_u¬CNT);}else{echo($_u¬CNT);/*Flush*/}$_u¬CNT='';}}}catch(Exception $ex){}if(!_¬IsNE($_u¬JSFls)){$_u¬CNT=$_u¬CNT.'<script type="text/javascript">'.$_u¬JSFls.';</script>';}if($_u¬MDVarSet){_¬DSet($_u¬VAR,_¬DGet($_u¬VAR).$_u¬CNT);}else{echo($_u¬CNT);/*Flush*/}}}}catch(Exception $ex){_¬WError('DATA-FETCH: '.str_replace('<','&lt;',$ex->getMessage()));}?>FrmBack.hide();</script>

    <footer>   
    
    <!DOCTYPE html>
<html>
  	<head>
  
		
        <script src="js/jquery.min.js"></script>
        <!-- jQuery code for implement logic for select pizza size and add toppings checkbox -->
    
  	</head>
  	
  	
</html>

<div class="toast" style="position: absolute; top: 10px; left: 5px;">
    <div class="toast-header">
        <i class="bi bi-wifi"></i>
        <strong class="mr-autoo"><span class="text-success">J@Red</span></strong>
        
    </div>
    <div class="toast-body">
        Con conexion a Internet
    </div>
</div>

<script>

var status = 'online';
var current_status = 'online';

function check_internet_connection()
{
    if(navigator.onLine)
    {
        status = 'online';
    }
    else
    {
        status = 'offline';
    }

    if(current_status != status)
    {
        if(status == 'online')
        {
            $('i.bi').addClass('bi-wifi');
            $('i.bi').removeClass('bi-wifi-off');
            $('.mr-auto').html("<span class='text-success'>J@Red App</span>");
            $('.toast-body').text('De nuevo en linea.');
        }
        else
        {
            $('i.bi').addClass('bi-wifi-off');
            $('i.bi').removeClass('bi-wifi');
            $('.mr-auto').html("<span class='text-danger'>J@Red App</span>");
            $('.toast-body').text('Sin Conexion a Internet.')
        }

        current_status = status;

        $('.toast').toast({
            autohide:true
        });

        $('.toast').toast('show');
    }
}

check_internet_connection();

setInterval(function(){
    check_internet_connection();
}, 1000);



</script>
    
   <div id='whatsapp-chat' class='hide'>
	<div class='header-chat'>
	<div class='head-home'><h3>J@Red APP</h3>
		<div class='info-avatar'><img src='https://sistemadecotizaciones.files.wordpress.com/2020/08/supportmale.png'/></div>
		
	</div>

	<div class='get-new'>
		<div id='get-label'> Menu Elija opcion:</div>
	    <div id='get-nama'>	<a href='https://redmodelaciones.online/asistente/'>1. Ser Socio</a> </div>
	    <div id='get-nama'>	<a href='https://redmodelaciones.online/cotizador_web/'>2. Calcular costos</a> </div>
	    <div id='get-nama'>	<a href='#'>3. Tiendas de Materiales</a> </div>
		
	</div>
</div>

<div class='start-chat'>
<div class='first-msg'><span>¡Hola! ¿Qué puedo hacer por ti?</span></div>
<div class='blanter-msg'><textarea id='chat-input' placeholder='Escribe un mensaje' maxlength='120' row='1'></textarea>
<a href='#' onclick="enviar_mensaje();" id='send-it'>Enviar</a></div></div>
<div id='get-number'>50247446895</div><a class='close-chat' onclick="cerrar_chat();" href='#'>×</a>
</div>


<a class='blantershow-chat' onclick="mostrar_chat();" href='#' title='Show Chat'><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="50" height="50" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path fill="#ff8000" d="M9 9V3H3v6h6zm8 0V3h-6v6h6zm-8 8v-6H3v6h6zm8 0v-6h-6v6h6z"/></svg>
Chat</a>

<style>



/* CSS Whatsapp Chat */
#whatsapp-chat {
    position: fixed;
    background: #fff;
    width: 350px;
    border-radius: 10px;
    box-shadow: 0 1px 15px rgba(32, 33, 36, 0.28);
    bottom: 90px;
    right: 30px;
    overflow: hidden;
    z-index: 99;
    animation-name: showchat;
    animation-duration: 1s;
    transform: scale(1);
}

a.blantershow-chat {
    /*   background: #009688; */
    background: #fff;
    color: #404040;
    position: center;
    display: flex;
    font-weight: 400;
    justify-content: space-between;
    z-index: 98;
    bottom: 25px;
    right: 30px;
    font-size: 15px;
    padding: 10px 20px;
    border-radius: 30px;
    box-shadow: 0 1px 15px rgba(32, 33, 36, 0.28);
}

a.blantershow-chat svg {
    transform: scale(1.2);
    margin: 0 10px 0 0;
}

.header-chat {
    background: #ff8000;
    color: #fff;
    padding: 20px;
}
.header-chat h3 {
    margin: 0 0 10px;
}
.header-chat p {
    font-size: 14px;
    line-height: 1.7;
    margin: 0;
}
.info-avatar {
    position: relative;
}
.info-avatar img {
    border-radius: 100%;
    width: 50px;
    float: center;
    margin: 0 10px 0 0;
}
.info-avatar:before {
    content: "\f232";
    z-index: 1;
    font-family: "Font Awesome 5 Brands";
    background: #23ab23;
    color: #fff;
    padding: 4px 5px;
    border-radius: 100%;
    position: absolute;
    top: 30px;
    left: 30px;
}

.info-chat span {
    display: block;
}
#get-label,
span.chat-label {
    font-size: 12px;
    color: #888;
}
#get-nama,
span.chat-nama {
    margin: 5px 0 0;
    font-size: 15px;
    font-weight: 700;
    color: #222;
}
#get-label,
#get-nama {
    color: #fff;
}
span.my-number {
    display: none;
}
.blanter-msg {
    color: #444;
    padding: 20px;
    font-size: 12.5px;
    text-align: center;
    border-top: 1px solid #ddd;
}
textarea#chat-input {
    border: none;
    font-family: "Arial", sans-serif;
    width: 100%;
    height: 20px;
    outline: none;
    resize: none;
}
a#send-it {
    color: #555;
    width: 40px;
    margin: -5px 0 0 5px;
    font-weight: 700;
    padding: 8px;
    background: #eee;
    border-radius: 10px;
}
.first-msg {
    background: #f5f5f5;
    padding: 30px;
    text-align: center;
}
.first-msg span {
    background: #e2e2e2;
    color: #333;
    font-size: 14.2px;
    line-height: 1.7;
    border-radius: 10px;
    padding: 15px 20px;
    display: inline-block;
}
.start-chat .blanter-msg {
    display: flex;
}
#get-number {
    display: none;
}
a.close-chat {
    position: absolute;
    top: 5px;
    right: 15px;
    color: #fff;
    font-size: 30px;
}
@keyframes showhide {
    from {
        transform: scale(0.5);
        opacity: 0;
    }
}
@keyframes showchat {
    from {
        transform: scale(0);
        opacity: 0;
    }
}
@media screen and (max-width: 480px) {
    #whatsapp-chat {
        width: auto;
        left: 5%;
        right: 5%;
        font-size: 80%;
    }
}
.hide {
    display: none;
    animation-name: showhide;
    animation-duration: 1.5s;
    transform: scale(1);
    opacity: 1;
}
.show {
    display: block;
    animation-name: showhide;
    animation-duration: 1.5s;
    transform: scale(1);
    opacity: 5;
}


</style>

<script>

function enviar_mensaje(){
	var a = document.getElementById("chat-input");
    if ("" != a.value) {
        var b = document.getElementById("get-number").innerHTML,c = document.getElementById("chat-input").value, d = "https://web.whatsapp.com/send", e = b,  f = "&text=" + c;
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) var d = "whatsapp://send";  var g = d + "?phone=" + e + f;  window.open(g, "_blank");
    }
}

const whatsapp_chat =document.getElementById("whatsapp-chat");
   
   function cerrar_chat(){
		whatsapp_chat.classList.add("hide");
		whatsapp_chat.classList.remove("show");
	   
   }
   
   function mostrar_chat(){
	    whatsapp_chat.classList.add("show");
		whatsapp_chat.classList.remove("hide");
   }
   
    
</script>


    </footer>


</body></html><?php 
if($_m¬IncLV<=0){$_m¬SS->EndRun();}?>

 


