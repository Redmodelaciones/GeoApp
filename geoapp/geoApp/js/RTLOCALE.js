/* RTLOCALE_MPB v 1.0 */
/* Modulo Integrador de GeoLocalización con API MAPBOX y RT
 Creador: Ing. Sergio Condori Mamani (Desarrollador Interactivo de Tecnologias de Información)
*/
var TokenMPB='',ThemeMPB='',DefLatitude=0,DefLongitude=0;
function UnivLocalize(f,lt,lg,df,p,tk){if(!tk){tk=window.TokenMPB;}getXML('https://api.mapbox.com/geocoding/v5/mapbox.places/'+lg+','+lt+'.json?access_token='+tk,function(h){if(f){f(1,JSON.parse(h),p);}},function(){if(f){f(0,df,p);}},null,null,false,1);}
function RTLOCALE_MPB(o,lt,lg,tk){var I=this;if(!tk){tk=window.TokenMPB;}I.lt=lt;I.lg=lg;I._o=OB(o);I._ld=0;I._m=0;if(!I._o){return 0;}if(I._o.id==null||I._o.id==''){I._o.id='RT_dsg_MAP_DF';}I._o.I=I;I._tk=tk;I._mrk=new Array;
 /*Eventos*/I.oninit;I.onmouseover;I.onmouseout;I.ongeolocalize;
 I._o.innerHTML='<iframe src="about:blank" width="100%" height="100%" onload="Parent(this).I._c=CPanel(this);" frameborder="no" scrolling="no"></iframe>';
 if(navigator.geolocation){navigator.geolocation.getCurrentPosition(function(ps){I.lt=ps.coords.latitude;I.lg=ps.coords.longitude;if(I.ongeolocalize){I.ongeolocalize(I,I.lt,I.lg);}},function(msg){console.log(msg);});}
 I._pd=new Array;
 /*Eventos*/I.oninit;
 I.AddCss=function(s){if(!I._m){I._pd[I._pd.length]={tp:1,s:s};return 0;}cssEngine(s,I._c);}
 I.FlyTo=function(lt,lg,z){if(!I._m){I._pd[I._pd.length]={tp:2,lt:lt,lg:lg,z:z};return 0;}if(!z){z=15;}I._m.flyTo({center:[lg,lt], zoom:z});};
 I.PopUp=function(lt,lg,h){if(!I._m){I._pd[I._pd.length]={tp:3,lt:lt,lg:lg,h:h};return 0;}var popUps=I._c.document.getElementsByClassName('mapboxgl-popup');
  if(popUps[0]){popUps[0].remove();}
  var popup=new I._c.mapboxgl.Popup({closeOnClick: false })
      .setLngLat([lg,lt])
      .setHTML(h)
      .addTo(I._m);
 }
 I.AddMarker=function(lt,lg,el,rx,ry,cs,fn){if(!I._m){I._pd[I._pd.length]={tp:3,lt:lt,lg:lg,el:el,rx:rx,ry:ry,cs:cs,fn:fn};return 0;}if(!rx){rx=0;}if(!ry){ry=0;}
  if(!el.style){el=CreateOB('div',el,cs||'marker','');el.dis=999999;}else if(cs!=null){el.className=cs;}
  el.Marker=new I._c.mapboxgl.Marker(el,{offset: [rx,ry]})
   .setLngLat([lg,lt])
   .addTo(I._m);
  el.latitude=lt;el.longitude=lg;
  el.Fly=function(z){I.FlyTo(el.latitude,el.longitude,z);};
  el.PopUp=function(h){I.PopUp(el.latitude,el.longitude,h);}
  I._mrk[I._mrk.length]=el;
  if(fn){fn(el);}
  return el;
 }
 I.NearMarker=function(f,cs,lt,lg,ff){/*Marcador Cercano*/if(!lt){lt=I.lt;}if(!lg){lg=I.lg;}var d=new Array,v,ds,e;
  /*Distancias*/for(var u=0;u<I._mrk.length;u++){e=I._mrk[u];e.dis=Math.sqrt(Math.pow(lt-e.latitude,2)+Math.pow(lg-e.longitude,2));if(!cs||(" "+e.className+" ").indexOf(" "+cs+" ")>=0){if(!ff||ff(e)){d[u]=e.dis;}}else{d[u]=null;}}
  /*Mas Cercano*/e=null;for(var u=0;u<d.length;u++){v=d[u];if(v!=null){if(!e||ds>v){e=I._mrk[u];ds=v;}}}
  if(e&&f){f(e,e.latitude,e.longitude);}
 };
 I.ForEach=function(f,cs,ff){var e,rs=null,cc=0;if(f){for(var u=0;u<I._mrk.length;u++){e=I._mrk[u];if(!cs||(" "+e.className+" ").indexOf(" "+cs+" ")>=0){if(!ff||ff(e)){rs=f(e);if(rs==null||rs){cc=cc+1;}}}}}return cc;};
 I.ScrollEnabled=function(e){if(e!=null){if(!I._m){I._pd[I._pd.length]={tp:5,e:e};return 0;}if(e){I._m.scrollZoom.enable();}else{I._m.scrollZoom.disable();}}try{return I._m.scrollZoom.isEnabled();}catch(ed){return 1;}};
 I.AddPosition=function(){var c=new I._c.mapboxgl.GeolocateControl({positionOptions: {enableHighAccuracy: true},trackUserLocation: true,showUserHeading: true});I._m.addControl(c);return c;}
 I.AddFullScreen=function(){I._m.addControl(new mapboxgl.FullscreenControl());}
 I.Localize=function(f,lt,lg,df,p){if(!lt){lt=I.lt;}if(!lg){lg=I.lg;}UnivLocalize(f,lt,lg,df,p,I._tk);}
 I.Active=function(){try{I._c.focus();}catch(e){window.focus();}};
 I.Init=function(){if(I._ld){return 0;}var tmo=new Date();tmo.setSeconds(tmo.getSeconds() + 10);tmo=tmo.getTime();I._ld=setInterval(function(){if(I.lt==null){I.lt=DefLatitude;}if(I.lg==null){I.lg=DefLongitude;}if(I._c){clearInterval(I._ld);
  I._c.document.write('<html><head><meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" /><script src="'+window.nfo_PROTOCOL+'://api.tiles.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.js"></script><link href="'+window.nfo_PROTOCOL+'://api.tiles.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.css" rel="stylesheet" /><style type="text/css">body{color: #404040;font: 400 15px/22px \'Source Sans Pro\', \'Helvetica Neue\', Sans-serif;margin: 0;padding: 0;-webkit-font-smoothing: antialiased;}*{-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}.map{position: absolute;left: 0%;width: 100%;top: 0;bottom: 0;}</style></head><body><script src="'+window.nfo_PROTOCOL+'://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><div id="map" class="map"></div><script type="text/javascript">if(!("remove" in Element.prototype)){Element.prototype.remove=function(){if(this.parentNode){this.parentNode.removeChild(this);}};}var map=document.getElementById("map"),xmap;mapboxgl.accessToken ="'+I._tk+'";var map=new mapboxgl.Map({container: "map", style:"mapbox://styles/mapbox/'+(ThemeMPB?ThemeMPB:'light-v10')+'", center:['+I.lg+','+I.lt+'],zoom: 12,scrollZoom: true});/*Otros*/var nav = new mapboxgl.NavigationControl();map.addControl(nav,"top-right");/*End*/map.on("load",function(e){xmap=map;});</script></body></html>');I._c.document.close();
  /*Init*/I._ld=setInterval(function(){if(I._c&&I._c.xmap){clearInterval(I._ld);I._m=I._c.map;/*RedirEvents*/AddEvent(I._c,'mousewheel',function(o,e){if(window.rtmousewheel){return rtmousewheel(e);}},{passive:false});var cv=I._m.getCanvasContainer();AddEvent(cv,'keydown',function(o,e){if(window.rtkeydown){return rtkeydown(e);}});AddEvent(cv,'keyup',function(o,e){if(window.rtkeyup){return rtkeyup(e);}});AddEvent(cv,'mouseover',function(o,e){if(I.onmouseover){I.onmouseover(o,e);}});AddEvent(cv,'mouseout',function(o,e){if(I.onmouseout){I.onmouseout(o,e);}});/*Lib*/var r;while(I._pd.length>0){r=I._pd[0];if(r){switch(r.tp){case 1:I.AddCss(r.s);break;case 2:I.FlyTo(r.lt,r.lg,r.z);break;case 3:I.AddMarker(r.lt,r.lg,r.el,r.rx,r.ry,r.cs,r.fn);break;case 4:I.PopUp(r.lt,r.lg,r.h);break;case 5:I.ScrollEnabled(r.e);break;}I._pd.splice(0,1);}}/*Eve*/if(I.oninit){I.oninit(1);}}},100);
 }else if(tmo<new Date().getTime()){clearInterval(I._ld);if(I.oninit){I.oninit(0);}}},100);};
}