//version : ClientWeb3 - RT-CONSOLE R5 v5.0.0.0
this.nfo_GET=location.href.split('?');
this.nfo_URL=nfo_GET[0];
this.nfo_PROTOCOL=this.nfo_URL.toLowerCase();this.nfo_PROTOCOL=(this.nfo_PROTOCOL.indexOf('https:')==0?'https':(this.nfo_PROTOCOL.indexOf('http:')==0?'http':'file'));
this.nfo_PROXY=this.nfo_URL.replace(/http:\/\//g,'').replace(/https:\/\//g,'').replace(/file:\/\//g,'').split('/');
this.nfo_PROXY=this.nfo_PROXY[0]+(this.nfo_PROXY[1]&&(this.nfo_PROXY[1].indexOf("HOST")==0||this.nfo_PROXY[1].indexOf("PORT")==0)?'/'+this.nfo_PROXY[1]:'');
this.nfo_SERVER=this.nfo_PROXY.split('/')[0];
if(this.nfo_PROXY.replace(this.nfo_SERVER,'').replace(this.nfo_SERVER,'').length==6){this.nfo_PROXY=this.nfo_SERVER;}
if(this.nfo_SERVER=="file:")this.nfo_SERVER="localhost:38980";
try{this.nfo_GET=location.href.substr(this.nfo_URL.length+1).split('&');}catch(e){this.nfo_GET=new Array;}
this.nfo_xid=0;this.nfo_xch=new Array;
function getId(){return this.nfo_xid++;}
function FullEsc(t){return escape(t).replace(/\+/g,'%2B').replace(/\-/g,'%2D');}
/* Method */
function OB(n){return document.getElementById(n);}
function COB(m,n){if(isStr(m)){m=OB(m);}try{return m.getElementById(n)}catch(e){return null;}}
function GetAbsLeft(o,aX){var x=0,ni=30;if(o&&o.getBoundingClientRect){x=o.getBoundingClientRect().left+GetScrollLeft(getWIN(o));}else{try{while(ni>0&&o!=null&&o.style!=null){if(ni==30||_$sAbTst(o)){x=x+o.offsetLeft||o.style.pixelLeft;}o=Parent(o);ni--;}/*Adiciono Ajuste - Problema de Calculo*/x=x+(aX||0);}catch(e){}}return x||0;}
function GetAbsTop(o,aY){var y=0,ni=30;if(o&&o.getBoundingClientRect){y=o.getBoundingClientRect().top+GetScrollTop(getWIN(o));}else{try{while(ni>0&&o!=null&&o.style!=null){if(ni==30||_$sAbTst(o)){y=y+o.offsetTop||o.style.pixelTop;}o=Parent(o);ni--;}/*Adiciono Ajuste - Problema de Calculo*/y=y+(aY||0);}catch(e){}}return y||0;}
function _$sAbTst(o){var t='';if(o.tagName){t=o.tagName.toLowerCase();return t!='thead'&&t!='tbody'&&t!='tr'&&!(t=='table'&&Parent(o).firstChild===o);}return 1;}
function GetAbsWidth(o,c){var d,v;try{d=o.style.display,v;if(d=='none'){o.style.display='';}v=(c?o.clientWidth:o.offsetWidth||o.style.pixelWidth);o.style.display=d;}catch(e){}return v||(o.document&&o.document.body?getWinSize(o).Width:0);}
function GetAbsHeight(o,c){var d,v;try{d=o.style.display,v;if(d=='none'){o.style.display='';}v=(c?o.clientHeight:o.offsetHeight||o.style.pixelHeight);o.style.display=d;}catch(e){}return v||(o.document&&o.document.body?getWinSize(o).Height:0);}
function GetScrollTop(w){if(!w){w=window;}var y;if(w){y=w.pageYOffset||w.scrollY||w.scrollTop;if(!y&&w.document){w=w.document;y=w.pageYOffset||w.scrollY||w.scrollTop;if(!y&&w.documentElement){y=w.documentElement.scrollTop;}else if(!y&&w.body){y=w.body.pageYOffset||w.body.scrollY||w.body.scrollTop;}}}return y||0;}
function GetScrollLeft(w){if(!w){w=window;}var x;if(w){x=w.pageXOffset||w.scrollX||w.scrollLeft;if(!x&&w.document){w=w.document;x=w.pageXOffset||w.scrollX||w.scrollLeft;if(!x&&w.documentElement){x=w.documentElement.scrollLeft;}else if(!x&&w.body){x=w.body.pageXOffset||w.body.scrollX||w.body.scrollLeft;}}}return x||0;}
function OverFlow(o,pn,mX,mY,aX,aY,fnRPW,fnRPH){var r,ws=getWinSize(),x=GetAbsLeft(o,aY)+(mX||0),y=GetAbsTop(o,aX)+(mY||0),cw=GetAbsWidth(o),ch=GetAbsHeight(o),ph=GetAbsHeight(pn),pw=GetAbsWidth(pn);if(fnRPW){if((r=fnRPW(o,pn,pw))!=null){pw=r;}}if(fnRPH){if((r=fnRPH(o,pn,ph))!=null){ph=r;}}ws.Left=GetScrollLeft();ws.Top=GetScrollTop();ws.RefX=x;ws.RefY=y;ws.RefWidth=cw;ws.RefHeight=ch;/*Calc*/ws.OVY=y+ch+ph>ws.Top+ws.Height;ws.OVX=x+pw>ws.Left+ws.Width;ws.OHX=x+cw+pw>ws.Left+ws.Width;ws.OHY=y+ph>ws.Top+ws.Height;ws.PanelWidth=pw;ws.PanelHeight=ph;return ws;}
function MoveVR(o,pn,mX,mY,aX,aY){pn.style.position='absolute';o.__aX=aX;o.__aY=aY;var ws=OverFlow(o,pn,mX,mY,aX,aY),x=ws.RefX,y=ws.RefY;if(ws.OVY){y=y-ws.PanelHeight;}else{y=y+ws.RefHeight;}pn.style.left=x+'px';pn.style.top=y+'px';ws.PanelX=x;ws.PanelY=y;return ws;}
function MoveHR(o,pn,mX,mY,aX,aY){pn.style.position='absolute';o.__aX=aX;o.__aY=aY;var ws=OverFlow(o,pn,mX,mY,aX,aY),x=ws.RefX,y=ws.RefY;if(ws.OHX){x=x-ws.PanelWidth;}else{x=x+ws.RefWidth;}pn.style.left=x+'px';pn.style.top=y+'px';ws.PanelX=x;ws.PanelY=y;return ws;}
function AjustVR(o,pn,mX,mY,aX,aY){var ws=OverFlow(o,pn,mX,mY,aX==null?o.__aX:aX,aY==null?o.__aY:aY),x=GetAbsLeft(pn),y=GetAbsTop(pn);if(ws.OHY){y=ws.Top+ws.Height-ws.PanelHeight;if(y<0){y=0;}pn.style.top=y+'px';}ws.PanelX=x;ws.PanelY=y;return ws;}
function AjustHR(o,pn,mX,mY,aX,aY){var ws=OverFlow(o,pn,mX,mY,aX==null?o.__aX:aX,aY==null?o.__aY:aY),x=GetAbsLeft(pn),y=GetAbsTop(pn);if(ws.OVX){x=ws.Left+ws.Width-ws.PanelWidth;if(x<0){x=0;}pn.style.left=x+'px';}ws.PanelX=x;ws.PanelY=y;return ws;}
function Parent(o){try{return o.parentNode||o.parent||o.parentElement||o.parentChild||null}catch(e){}}
function BPanel(n){var PM=window;var H;var L=20;do{H=PM.document.getElementById(n);L=L-1;PM=Parent(PM);}while(!H&&L>0);try{if(H.contentWindow){return H.contentWindow}else if(H.contentDocument){return H.contentDocument}else{return PM.frames[n]}}catch(ed){return H;}}
function CPanel(n){var H=(n&&n.style!=null?n:OB(n));try{if(H.contentWindow){return H.contentWindow}else if(H.contentDocument){return H.contentDocument}else{return window.frames[n]}}catch(ed){return H;}}
function CreateOB(t,i,c,h,p){var t=document.createElement(t);t.name=i;if(i!=null&&i!=''){t.id=i;}t.className=c;try{if(isStr(h)){t.innerHTML=h;}else{t.appendChild(h);}}catch(e){}if(p){p.appendChild(t);}return t;}
function RemoveOB(n){if(isStr(n)){n=OB(n);}var Pn=Parent(n);if(n&&Pn){Pn.removeChild(n);}}
function InterchangeOB(o1,o2){var RO=CreateOB("div","","",""),P1=Parent(o1),P2=Parent(o2);if(P1&&P2){P1.replaceChild(RO,o1);P2.replaceChild(o1,o2);P1.replaceChild(o2,RO);}RO=null;}
function DisplaceOB(o1,dsob){var P1=Parent(o1),P2=Parent(dsob);if(P1&&P2){RemoveOB(dsob);P1.insertBefore(dsob,o1);}}
function isStr(o){return o instanceof String||(typeof o).toLowerCase()=='string'||o==null;}
function isNum(v,dc){for(x=0;x<v.length;x++){v1=v.substr(x,1);v2=parseInt(v1);if((isNaN(v2)||v1=='.')&&!(v1=='.'&&dc)){return 0;}}return 1;}
function Val(v){if(typeof v=="string"){v=v.match(/^-?[.,0-9]*/)[0];}return !isNaN(parseFloat(v))?parseFloat(v):0;}
function Parse(t,c){var r='',i,ok=0;try{i=t.toLowerCase().indexOf(c.toLowerCase());if(i==0){t=t.substr(c.length);}else if(i>0){r=t.substr(0,i);t=t.substr(i+c.length);}else{r=t;t='';}ok=i>=0||r.length>0;}catch(e){if(t===''||t==null){r='';}else{r=t;}t='';ok=r.length>0;}return [t,r,ok];}
function AddEvent(o,e,f,r){if(r==null){r=false;}var scope=function(ev){if(f.apply){f.apply(o,[o,ev]);}else{f(o,ev||window.event);}};try{eval("o.rt"+e+"=scope;");}catch(e){}if(o.addEventListener){o.addEventListener(e,scope,r);}else{o.attachEvent("on"+e,scope);}}
function AddContext(o,f){
 var sce=function(ev){if(f&&(ev.which!=1||ev.button!=1||window.event.button!=1)){if(f.apply){f.apply(o,[o,ev]);}else{f(o,ev||window.event);}return false;}};
 if(document.layers){window.captureEvents(Event.MOUSEDOWN | Event.MOUSEMOVE);o.onMouseDown=sce;}else{o.oncontextmenu=sce;}
}
function AddKeys(o,f,t,r){o.onhelp=function(){return false;};window.onhelp=o.onhelp;if(!f){f=window.onkey;}AddEvent(o,(t==1?"keyup":(t==2?"keypress":"keydown")),function(o,e){try{if(f){return f(e.keyCode||e.which,o,e);}}catch(ex){}},r);}
function AddProp(o,n,fg,fs,p){if(!o){o={};}if(Object.defineProperty){Object.defineProperty(o,n,{set:function(v){if(fs){fs(v,o,p);}},get:function(){if(fg){return fg(o,p);}return null;},enumerable:true,configurable:true});}else{alert("El Navegador no Soporta ProtoType");}return o;}
this.ASCII=new Array;for(i=0;i<256;i++){this.ASCII[i]=String.fromCharCode(i)}
/* unicode Adapter */ASCII[241]="&ntilde;";ASCII[209]="&Ntilde;";
function Chr(n){return String.fromCharCode(n);}
function ChrW(n){return this.ASCII[n];}
function Asc(c){for(j=0;j<256;j++)if(this.ASCII[j]==c){return j}return c.charCodeAt(0);}
function Replace(t,b,r){if(t==null){return '';}t=t.toString();while(t.indexOf(b)!=-1)t=t.replace(b,r);return t;}
function EndsWith(t,c){if(t==null){return false;}t=t.toString();c=c.toString();return t.substr(t.length-c.length)==c;}
function Trim(t){if(t==null){return '';}return t.toString().replace(/^\s+|\s+$/gm,'');}

function IsDroid(){var ua=navigator.userAgent.toLowerCase();return ua.indexOf("android") > -1;}
function _xHost(h,p,a){h=h.split(':');if(p==null){if(h.length>1){p=h[1];}else{p=80;}}h=h[0];if(IsDroid()||a||nfo_PROTOCOL=='https'){/*USA PROXY*/return nfo_SERVER+(a?'/PORT:'+p:'/HOST:'+h+':'+p);}else{return h+':'+p;}}
function _xPort(p,h){h=(h?h:nfo_SERVER.split(':')[0]);if(p==null){p="RT";}if(IsDroid()||nfo_PROTOCOL=='https'){/*USA PROXY*/return nfo_SERVER+'/PORT:'+p}else{if(p=="RT")p=38980;if(p=="GUI")p=38981;return h+':'+p;}}
this.getXHttp=function(tout){var Q;if(window.XMLHttpRequest){Q=new XMLHttpRequest();}else{Q=new ActiveXObject('Microsoft.XMLHTTP');}if(tout){Q.timeout=tout;}return Q;};
this.getXML=function(u,fn,fne,p,sXM,pst,ntv){/*ntv: No usa el Proxy*/if(!ntv&&(u.toLowerCase().indexOf('http')==0||u.toLowerCase().indexOf('file:')==0)&&this.nfo_PROTOCOL){u=u.replace(':///','/').replace('://','/').split('/');u[1]=_xHost(u[1]+(u[1].indexOf(':')<0?(u[0].toLowerCase()=='https'?':443':':80'):''));if(u[1].indexOf('HOST:')==0){u[1]+=':'+u[0].toLowerCase();u[0]=this.nfo_PROTOCOL;}u[0]=u[0]+(u[0].toLowerCase()=='file'?'://':':/');u=u.join('/');}try{if(!sXM){sXM=getXHttp();}sXM.open(pst?'POST':'GET',u,true);sXM.onreadystatechange=function(){if(sXM.readyState==4){try{if(sXM.status>=100&&sXM.status!=503&&sXM.status!=404){u=sXM.responseText;fn(u==" "?"":u,sXM.status,p);}else{fne(sXM,'XML',p);}}catch(e){}}};if(pst){sXM.setRequestHeader('Content-type','application/x-www-form-urlencoded');sXM.send(pst);}else{sXM.send();}return sXM;}catch(e){/*JSX-APP*/getJSX(u,fn,fne,p)}};
this.getRAW=function(u,fn,tp,p,sXM){if(IsDroid()&&u.indexOf('http')==0){u=u.replace('http://','').replace('https://','').split('/');u[0]=nfo_PROTOCOL+'://'+_xHost(u[0]);u=u.join('/');}if(!tp||tp==""){tp="arraybuffer";}try{if(!sXM){sXM=getXHttp();}sXM.open('GET',u,true);sXM.responseType=tp;AddEvent(sXM,'load',function(o,e){if(fn){if(tp=="arraybuffer"&&o.status==200){var uInt8Array=new Uint8Array(o.response),i=uInt8Array.length,biStr=new Array(i);while(i--){biStr[i]=String.fromCharCode(uInt8Array[i]);}var data=biStr.join(''),base64=window.btoa(data);fn(o,e,base64,p);}else{fn(o,e,'',p);}}});sXM.send();return sXM;}catch(e){/*THROW*/if(fn){fn(sXM,e,'',p);}}};
this.getHead=function(){return document.getElementsByTagName('head')[0]};if(!this.PUK)this.PUK=0;
this.getJSX=function(u,fn,fne,p){PUK++;var Instance=PUK;var SC=document.createElement('script');SC.setAttribute('type','text/javascript');SC.setAttribute('src',nfo_PROTOCOL+'://'+_xPort()+'/RT:SCRIPT/JSX '+escape(u).replace(/\//g,'|2F').replace(/%/g,'|')+' '+Instance+'?'+new Date().getTime());var done=false;SC.onload=SC.onreadystatechange=function(){if(!done&&(!this.readyState||this.readyState=='loaded'||this.readyState=='complete')){done=true;try{var OBE;eval('OBE=new RT_JSX_'+Instance);fn(OBE.responseText,'JSX',p)}catch(e){this.status=0;fne(this,'JSX-ERROR: '+(e.message||e),p)}SC.onload=SC.onreadystatechange=null;getHead().removeChild(SC)}};getHead().appendChild(SC);}
function getWIN(o){var W=o||window,MX=30;try{while(((!o&&W.name!='WIN_RT_MAIN')||(o&&!(W.document&&W.document.body)))&&MX>0){W=Parent(W);MX=MX-1};if(MX<=0){W=window;}}catch(e){}return W;}
function Size(){this.Width=0;this.Height=0;}
function getWinSize(w){var T=new Size(),D;if(!w){w=window;}if(typeof w.innerWidth!='undefined'){T.Width=w.innerWidth;T.Height=w.innerHeight}else if(typeof w.document.documentElement!='undefined'&&w.document.documentElement.clientWidth){D=w.document.documentElement;T.Width=D.clientWidth;T.Height=D.clientHeight}else{D=w.document.getElementsByTagName('body')[0];T.Width=D.clientWidth;T.Height=D.clientHeight}return T;}
function atcWinSize(f,w){if(!w){w=window;}var r=function(o,e){var T=getWinSize(o);if(f){f(T,T.Height,T.Width);}};AddEvent(w,'resize',r);r();return r;}
function getCntSize(w){var T=new Size();if(!w){w=window;}T.Width=Math.max(w.document.body.scrollWidth,w.document.documentElement.scrollWidth,w.document.body.offsetWidth,w.document.documentElement.offsetWidth,w.document.documentElement.clientWidth);T.Height=Math.max(w.document.body.scrollHeight,w.document.documentElement.scrollHeight,w.document.body.offsetHeight,w.document.documentElement.offsetHeight,w.document.documentElement.clientHeight);return T;}
function getMouseX(e){e=e||window.event;return Math.round(e.clientX+(window.pageXOffset||document.body.scrollLeft));}
function getMouseY(e){e=e||window.event;return Math.round(e.clientY+(window.pageYOffset||document.body.scrollTop));}
function getPos(o){if(isStr(o)){o=OB(o);}if(!o){return {Top:0,Left:0};}var y=0;var x=0;while(o.offsetParent){x+=o.offsetLeft;y+=o.offsetTop;o=o.offsetParent;}return {Top:y+o.scrollTop,Left:x+o.scrollLeft};}

function WaitExec(fc,fe,tmo){if(!tmo){}}

function SCRIPT_CALL(u,t,FN,ask){if(!t){t='javascript';}if(ask==null){ask=false;}var SC=document.createElement(t=='css'?'link':'script'),done=false;SC.setAttribute('type','text/'+t);SC.setAttribute(t=='css'?'href':'src',u);if(t=='css'){SC.setAttribute('rel','stylesheet');}SC.setAttribute('async',ask);SC.onload=SC.onreadystatechange=function(){try{if(!done&&(this.readyState==null||this.readyState=='loaded'||this.readyState=='complete')){done=true;if(FN){FN(this);}SC.onload=SC.onreadystatechange=null;getHead().removeChild(SC);}}catch(e){alert(e.description||e)}};try{getHead().appendChild(SC);}catch(e){}return SC;
}
function CreateCodeJS(N,CD){var JS=document.createElement('script');JS.setAttribute('type','text/javascript');JS.setAttribute('id','SC'+N);if(document.all){JS.text=CD;}else{JS.appendChild(document.createTextNode(t));}return JS;}
/*CSS*/
function cssEngine(r,w){if(!w){w=window;}var css=w.document.createElement('style');css.type='text/css';if(css.styleSheet){css.styleSheet.cssText=r;}else{css.appendChild(w.document.createTextNode(r));}w.document.getElementsByTagName("head")[0].appendChild(css);}
function cssRule(s,r,/*Opt:sheetName*/n,w){if(!w){w=window;}var b=w.document.styleSheets[w.document.styleSheets.length-1];
 if(n){for(var i in w.document.styleSheets){if(w.document.styleSheets[i].href&&w.document.styleSheets[i].href.indexOf(n)>-1){b=w.document.styleSheets[i];break;}}}
 if(typeof b==='undefined'||b===null){var e=w.document.createElement("style");e.type="text/css";w.document.head.appendChild(e);b=e.sheet;}
 if(b){if(b.insertRule){b.insertRule(s+' {'+r+'}',b.cssRules.length);}else if(b.addRule){b.addRule(s,r);}}
}
//AX-ATM resuelve respuestas !!
function propOK(d){return d.split("|")[0].toUpperCase()=="TRUE"}
function propClass(d){return d.split("|")[1]}
function propData(d,t,df){var r=d.split('|')[2];if(r==null)r=df;if(r==null)r=d;if(t==null||t)r=unescape(r);return r}
function RTQUERY(c,fn,p,h,a){if(a==null){a='';}try{getXML(nfo_PROTOCOL+"://"+_xPort(p,h)+"/RT:SCRIPT/"+escape(c).replace(/\//g,'%2F')+"?"+escape(a)+"&"+new Date().getTime(),function(r){fn(r)},function(v,e){try{fn("|sXML|"+(v?v.readyState:e));}catch(e){alert(e.description||e)}})}catch(e){alert(e.description||e)}}
function RTCMD(p,fn,fne){getXML(nfo_PROTOCOL+'://'+nfo_SERVER+'/RT:SCRIPT/CMD '+escape(p).replace(/\//g,'%2F')+'?'+new Date().getTime(),fn,fne);}
/*function RTCMD(c,fn){RTQUERY("CMD "+escape(c).replace(/\//g,'%2F'),fn);}*/
function RTHOME(S){if(S!=false){S=nfo_URL.split("/");S[S.length-1]=null;return S.join("/");}else{return nfo_PROTOCOL+"://"+_xPort("RT")+"/";}}
/*implementacion de RT-CONSOLE{SUPPORT} desde localhost*/
function CreateCOM(fn,Name,HS,PR,GP){
 SCRIPT_CALL(nfo_PROTOCOL+'://'+_xPort()+'/RT:SCRIPT/JSA?'+new Date().getTime(),null,function(t){try{var rt=new RT_CONSOLE(Name,HS,PR,GP);if(fn){fn(rt);}}catch(e){alert("ERROR-GUI:"+(e.description||e));if(fn){fn(false,t);}}});
}
function IniciarRT(fn){CreateCOM(function(rt){window.rt=rt;if(fn){fn(rt);}});}
if(!window.rt){window.rt=0;try{window.rt=getWIN().rt;}catch(e){}}