/* -- WIN->POPUP v1.2 -- */
/*CSS-IMPORT*/
function cssEngine(r,w){if(!w){w=window;}var css=w.document.createElement('style');css.type='text/css';if(css.styleSheet){css.styleSheet.cssText=r;}else{css.appendChild(w.document.createTextNode(r));}w.document.getElementsByTagName("head")[0].appendChild(css);}
var _rlcs="#FrmBack{position: fixed;top: 0px;left: 0px;height: 100px;width: 100px;z-index: 999990;margin: 0px;padding: 0px;}";
/*IMG/LGA.png*/
_rlcs+=".FrmBack, .FrmStck, .FrmNull{background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAQklEQVRYhe3OMQEAIAzAsIF/z0NEH45EQc7u3vnY17kZwU6wEqwEK8FKsBKsBCvBSrASrAQrwUqwEqwEK8FKsBKsHmTfA0/UOGHoAAAAAElFTkSuQmCC');cursor:default;}";
_rlcs+=".FrmPopUp,.FrmPopUp table tr td{color:#000000;font-size:10pt;}";
/*IMG/LGB.png*/
_rlcs+=".FrmDisa{background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAARUlEQVRYhe3OMQHAIBAAsQfjtV4JDDfAkCjImplvHrZvB04EK8FKsBKsBCvBSrASrAQrwUqwEqwEK8FKsBKsBCvBSrD6AYE0AM9FhN9ZAAAAAElFTkSuQmCC');cursor:default;}";
_rlcs+="#FrmBack .FrmMenu, #FrmBack .FrmPopUp{position: fixed;left: 0px;top: 0px;z-index: 999999;margin: 0px;padding: 0px;height: 10px;width: 10px;display: block;}";
_rlcs+=".FrmBack .FrmMenu, .FrmBack .FrmPopUp, .FrmGBackPopUp{background-color: #003399;border: 1px solid #C6C6C6;-webkit-box-shadow: 0px 0px 8px #EBEBEB;-moz-box-shadow: 0px 0px 8px #EBEBEB;filter: shadow(color=#EBEBEB, direction=135, strength=2);box-shadow: 0px 0px 8px #EBEBEB;}";
_rlcs+=".FrmStck .FrmMenu, .FrmStck .FrmPopUp{background-color: #FFFFE1;border: 1px solid #000000;-webkit-box-shadow: 3px 3px 3px #9C9C9C;-moz-box-shadow: 3px 3px 3px #9C9C9C;filter: shadow(color=#9C9C9C, direction=135, strength=2);box-shadow: 3px 3px 3px #9C9C9C}";
_rlcs+=".FrmDisa .FrmMenu, .FrmDisa .FrmPopUp{background-color: #003399;border: 1px solid #000000;-webkit-box-shadow: 0px 0px 8px #141414;-moz-box-shadow: 0px 0px 8px #141414;filter: shadow(color=#141414, direction=135, strength=2);box-shadow: 0px 0px 8px #141414;}";
_rlcs+=".FrmSpce{overflow:hidden;display:block;width:3px;height:3px;}";
cssEngine(_rlcs);
/*HTML-DRAW*/
var FrmBack=CreateOB("div","FrmBack","FrmDisa",'<div id="FrmWin"><table id="FrmTab" width="100%" height="100%" border="0" cellpadding="0" cellspacing="0"><tr><td align="center" valign="middle"><div id="FrmPik"></div><div id="FrmFrm"></div></td></tr></table></div>',document.body);if(!document.body){alert("Se debe cargar la Libreria desde el tag 'BODY'");}
AddEvent(FrmBack,"click",FrmDeAc);AddEvent(FrmBack,"mouseup",function(o,e){var f=_FrmAct,CP=CPanel(f.BS);if(CP&&CP.onframeoutclick){CP.onframeoutclick(window,e,f.OBG,f.FN,FrmBack,f.p);}});FrmBack.style.width='100%';FrmBack.style.height='100%';
function FrmIsShow(){return FrmBack.style.display!='none';}
var _FrmReg="",_FrmIx=0,_FrmAct=0,_FmeAct=0,_FrmActF=0,onloadfrmpop=0;
var FrmWin=OB("FrmWin"),FrmTab=OB("FrmTab");
FrmBack.hide=function(v,rof){var POP=_FrmReg.split("|"),RP,APOP=0;if(POP.length>2){APOP=POP[POP.length-(rof&&POP[POP.length-1]!=rof.id?1:2)];}if(POP.length>1||_FrmReg==""){if(rof){POP=rof.id;if(_FrmReg.indexOf("|"+POP)<0){return true;}}else{POP=POP[POP.length-1];}_FrmReg=_FrmReg.replace("|"+POP,"");RemoveOB(POP);}var _xFrC=rof||(FrmWin.className=="FrmMenu"?_FmeAct:_FrmAct);if(_xFrC){if(_xFrC.BTCLOSE){_xFrC.BTCLOSE=0;}if(_xFrC.onHidePop){try{_xFrC=_xFrC.onHidePop(v,_xFrC,FrmBack)||1;}catch(e){_xFrC=1;}}}else{_xFrC=1;}if(APOP){_FrmRstPop(APOP);}else if(_xFrC||_FrmAct==0){FrmBack.className="FrmBack";FrmBack.style.display="none";}};
FrmBack.FullHide=function(v){var POP=_FrmReg.split("|"),_xFrC=(FrmWin.className=="FrmMenu"?_FmeAct:_FrmAct);for(var j=0;j<POP.length;j++){if(POP[j]){RemoveOB(POP[j]);}}_FrmReg='';FrmBack.className="FrmBack";FrmBack.style.display="none";if(_xFrC){if(_xFrC.BTCLOSE){_xFrC.BTCLOSE=0;}if(_xFrC.onHidePop){try{_xFrC.onHidePop(_xFrC,FrmBack,v);}catch(e){}}}};
function FrmCPanel(f){if(f==null){f=_FrmAct;}if(f&&f.BS){f=f.BS;}return CPanel(f);}
function FrmCPScan(f){if(f){var POP=_FrmReg.split("|"),p,fr;for(p=0;p<POP.length;p++){fr=OB(POP[p]);if(fr&&fr.BS){f(CPanel(fr.BS));}}}}
function FrmDeAc(o,e){if(FrmWin.className=="FrmMenu"||_FrmAct.AuCl){FrmBack.hide();}}
function FrmLoad(f){try{var CP=CPanel(f.BS.id);if(CP&&CP.LoadData){CP.LoadData(f.OBG,f.FN,FrmBack,f.p);}}catch(e){}}
/*Ext-Ends Editing Easy*/var FrmFrm=OB("FrmFrm"), FrmPik=OB("FrmPik");
function FrmSelF(F,w,h,fn,p,el){if(_FrmAct&&_FrmAct.id!=F.id){_FrmAct.style.display="none";}FrmBack.style.display='';F.style.display='';F.BS.style.display=F.SD||'';F.style.width=w+'px';if(F.SD){/*Calc. Rel. Asp.*/F.BS.style.whiteSpace='nowrap';w=Math.min(Math.max(w,GetAbsWidth(F)),getWinSize().Width-10);F.BS.style.whiteSpace='normal';F.style.width=w+'px';}F.style.height=h+'px';FrmSize(F,w,h);F.FN=fn;F.OBG=p;w=CPanel(F.BS.id);if((el==null||el)&&w&&w.LoadData){w.LoadData(F.OBG,F.FN,FrmBack);}}
function FrmSize(F,w,h,a){if(F.SD&&w!=null&&!a){w=Math.max(w,GetAbsWidth(F));F.Rw=w;PoWd=w;}if(F.SD&&h!=null&&!a){h=Math.max(h,GetAbsHeight(F));F.Rh=h;PoHt=h;}
 if(w!=null){if(a){F.w=w;}if(F.aj){var x=(F.x>0?F.x:PoX);if(x<0){x=0;}if(w>FW_w-x){w=FW_w-x-6;FrmWin.style.left="2px";}if(w<6){w=6;}}FrmWin.style.width=w+"px";F.setAttribute("width",w);F.style.width=w+"px";}
 if(h!=null){if(a){F.h=h;}if(F.aj){var y=(F.y>0?F.y:PoY);if(y<0){y=0;}if(h>FW_h-y){h=FW_h-y-6;FrmWin.style.top="2px";}if(h<6){h=6;}}FrmWin.style.height=h+"px";F.setAttribute("height",h);F.style.height=h+"px";}
 /*ReCalc*/if(!a&&F.SD&&((w!=null&&w!=Math.max(w,GetAbsWidth(F)))||(h!=null&&h!=Math.max(h,GetAbsHeight(F))))){FrmSize(F,w,h,a);}
 if(a&&_FrmAct.id==F.id){PoWd=F.w;PoHt=F.h;FrmAtch();}
}
function _FrmRstPop(F,el){if(F&&isStr(F)){F=OB(F);}if(!F){return false;}
 _FrmAct=F;PoWd=F.w;PoHt=F.h;PopMX=F.MX;FrmSelF(F,F.w,F.h,F.FN,F.OBG,el);if(FrmWin.className=="FrmMenu"||(F.x!=null&&F.y!=null)){FrmWin.style.left=F.x+"px";FrmWin.style.top=F.y+"px";}else{FrmAtch();}
}
function PopMax(m){if(_FrmAct){_FrmAct.MX=m;PopMX=m;if(!m){FrmSize(_FrmAct,PoWd,PoHt);}FrmAtch();}}
/* Set Resolution especifiquet */
var PoWd=0, PoHt=0, PoX=0, PoY=0, PopMX=0, FW_w=0,FW_h=0;
function FrmAtch(SS,HH,WW){if(SS==null){if(window.rtresize){window.rtresize();return 0;}else{SS=getWinSize();}}if(HH==null){HH=SS.Height;}if(WW==null){WW=SS.Width;}
 FW_h=HH;FW_w=WW;if(!_FrmAct){return 0;}
 if(PopMX){PoY=0;PoX=0;FrmWin.style.top="0px";FrmWin.style.left="0px";FrmSize(_FrmAct,WW,HH);
 }else{
  if(_FrmAct.y==null){PoY=(HH-PoHt)/2;if(PoY<0){PoY=0;}FrmWin.style.top=PoY+"px";}
  FrmBack.style.height=HH+"px";if(_FmeAct&&_FmeAct.y!=null&&_FmeAct.aj){FrmSize(_FmeAct,null,_FmeAct.h);}
  if(_FrmAct.x==null){PoX=(WW-PoWd)/2;if(PoX<0){PoX=0;}FrmWin.style.left=PoX+"px";}
  FrmBack.style.width=WW+"px";if(_FmeAct&&_FmeAct.x!=null&&_FmeAct.aj){FrmSize(_FmeAct,_FmeAct.w,null);}
 }
 if(!PopMX&&_FrmAct.aj){FrmSize(_FrmAct,PoWd,PoHt);}
}
/*EXTs v2*/var _FrmRPo=new Array();
function FrmIndex(ix){if(ix==null){ix=_FrmIx++;}return (FrmIsShow()?999999:99)+ix;}
function FrmAddMenu(n,u,w,h,s,aj){var F=_FrmRPo[n];
 if(!F){F=_FrmAddPop(FrmPik,'width="'+w+'" height="'+h+'"',s);_FrmRPo[n]=F;}
 F.w=w;F.h=h;F.aj=aj;F.MX=0;CPanel(F.BS.id).document.write('&nbsp;<br><center style="font-size:10pt;">Generando Interfaz ...</center>');
 F.BS.src=u;F.style.display='none';return F;
}
function _FrmAddPop(Frc,a,s,HT,BT,TI,BM,BF){var ix=_FrmIx++,sm=(s&&s.toString().toLowerCase()=='visible'?'visible':(s?"auto":"hidden"));var GE=CreateOB("div","","FrmGBackPopUp",'<table id="FrmFrm'+ix+'X" border="0" cellpadding="0" cellspacing="0" style="width:100%;height:100%;">'+(BT?'<tr><td id="FrmFrm'+ix+'T" height="25" colspan="'+(BM?1:2)+'" style="color:#FFFFFF;padding-left:5px;cursor:default;">'+(TI||'&nbsp;')+'</td>'+(BM?'<td width="16" style="background:#003399;"><button type="button" style="width:20px;height:20px;" onclick="OB(\'FrmFrm'+ix+'X\').bmax();">M</button></td>':'')+'<td width="16" align="right" style="background:#003399;"><button type="button" style="width:20px;height:20px;" onclick="OB(\'FrmFrm'+ix+'X\').hide();">X</button></td></tr>':'')+'<tr><td'+(BT?' colspan="3"':'')+' style="background-color:#FFFFFF;">'+(HT?'<div id="FrmFrm'+ix+'" '+a+' style="overflow:'+sm+';display:block;width:100%;height:100%;">'+HT+'</div>':'<iframe id="FrmFrm'+ix+'" frameborder="0" marginheight="0" marginwidth="0" '+(a?a:'')+' scrolling="'+(s?"auto":"no")+'" style="width:100%;height:100%;"></iframe>')+'</tr></table>',BF?document.body:Frc),GF=GE.firstChild;if(!BF){RemoveOB(GF);Frc.replaceChild(GF,GE);}else{GE.style.position='absolute';GF.ZIndex=ix;GF.BTT=OB('FrmFrm'+ix+'T');GF.Active=function(o){if(_FrmActF){_FrmActF.BTT.BMV=false;_FrmActF.ZIndex=_FrmIx;Parent(_FrmActF).style.zIndex=_FrmActF.ZIndex;}_FrmActF=o||GF;_FrmActF.ZIndex=_FrmIx++;Parent(_FrmActF).style.zIndex=FrmIndex(_FrmActF.ZIndex);};GF.BTT.GF=GF;GF.BTT.GE=GE;AddEvent(GF.BTT,'mousedown',function(o,e){e.preventDefault();o.GF.Active(o.GF);o.BMV=1;});AddEvent(GF.BTT,'mouseup',function(o,e){o.BMV=0;});AddEvent(GF.BTT,'mousemove',_FrmMovPop);AddEvent(GF,'click',function(o,e){o.Active(o);});GF.Active(GF);}/* --X-- */GF.IsHTML=!!HT;GF.BS=OB('FrmFrm'+ix);GF.BS.PF=GF;/*ControlFrame*/if(!HT){if(window.AutoPrgPopFrame){try{AutoPrgPopFrame(GF.BS,window.event);}catch(e){}}AddEvent(GF.BS,'load',function(o,e){FrmLoad(o.PF);if(window.AutoPrgPopFrame){AutoPrgPopFrame(o,e);}if(onloadfrmpop){onloadfrmpop(o,e);}});}/*IsFloat*/GF.BF=BF;GF.SD=sm=='visible'&&HT?'block':'';GF.x=-1;GF.y=-1;if(!BF&&_FrmAct){_FrmAct.style.display='none';}if(BF){/*Flotante*/GF.hide=function(){RemoveOB(Parent(GF));};GF.bmax=function(){alert('Funcion no Terminada');};}else{/*Fijo*/GF.hide=function(v){FrmBack.hide(v,GF);};GF.bmax=function(){alert('Funcion no Terminada');};}return GF;}
function _FrmMovPop(o,e){e=e||window.event;var x=Math.round(e.clientX+(window.pageXOffset||document.body.scrollLeft)),y=Math.round(e.clientY+(window.pageYOffset||document.body.scrollTop));
 if(o.BMV){o.GF.x=x-o.RX;o.GF.y=y-o.RY;o.GE.style.left=o.GF.x+'px';o.GE.style.top=o.GF.y+'px';}else{o.x=x;o.y=y;o.RX=x-o.GF.x;o.RY=y-o.GF.y;}
}
function FrmMenu(n,p,fn,x,y,p2){var F=_FrmRPo[n];
 if(F){if(_FmeAct){_FmeAct.style.display='none';}_FmeAct=F;F.FN=fn;F.OBG=p;F.p=p2;F.x=x;F.y=y;_FrmCfg(1);FrmLoad(F);
 }else{alert("No se ha registrado el menu: "+n+"!!");}
}
function _FrmCfg(t,FBC){/*1:Menu; 2:PopUp*/FrmFrm.style.display=(t==1?'none':'');FrmPik.style.display=(t==1?'':'none');FrmBack.className=(FBC?FBC:"FrmBack");FrmWin.className=(t==1?"FrmMenu":(t==2?"FrmPopUp":""));
 if(t==1){if(_FmeAct){_FrmRstPop(_FmeAct,0);}}else{_FmeAct=0;}
}
function FrmProp(u,w,h,p,d,s,x,y,aj,f,p2,BT,TI,BM,BF){if(x==''){x=null;}if(y==''){y=null;}if(!BF){_FrmCfg(2,FrmRCls(d));PoWd=w;PoHt=h;}var F=_FrmAddPop(FrmFrm,'',s,null,BT,TI,BM,BF);F.AuCl=d==2||d==3;if(!BF){_FrmReg=_FrmReg+"|"+F.id;}F.w=w;F.h=h;F.x=x;F.y=y;F.aj=aj;F.FN=f;F.MX=0;F.OBG=p;F.p=p2;if(BF){var G=Parent(F),SS=getWinSize();G.style.width=F.w+'px';G.style.height=F.h+'px';G.style.left=(x!=null?x:SS.Width/2-w/2)+'px';G.style.top=(y!=null?y:SS.Height/2-h/2)+'px';}else{_FrmRstPop(F);}CPanel(F.BS.id).document.write('&nbsp;<br><center style="font-size:10pt;">Generando Panel de Propiedades ...</center>');F.BS.src=u+(u.indexOf('?')>0?'&':'?')+"DT="+new Date().getTime();return F;}
function FrmHtml(HT,w,h,d,s,x,y){if(x==""){x=null;}if(y==""){y=null;}_FrmCfg(2,FrmRCls(d));PoWd=w;PoHt=h;var F=_FrmAddPop(FrmFrm,'',s,HT);F.AuCl=d==2||d==3;_FrmReg=_FrmReg+"|"+F.id;F.w=w;F.h=h;F.x=x;F.y=y;F.FN=0;F.MX=0;_FrmRstPop(F);return F;}
/*Special Menu POP*/
function FrmMenu2(u,x,y,w,h,p,fn,s,p2){var F=FrmAddMenu('__xFrm!Menu2',u,w,h,s);FrmMenu('__xFrm!Menu2',p,fn,x,y,p2);return F;}
function FrmRCls(d){return (d<0||d==3?"FrmNull":(d==2?"FrmStck":(d==1||d==true?"FrmDisa":"FrmBack")));}
function _FrmBlrPZn(o,e){o=document.activeElement;if(o&&o.PF&&o.PF.Active){o.PF.Active(o.PF);if(!o.LKPrgAc){o.LKPrgAc=1;AddEvent(CPanel(o),'blur',_FrmBlrPZn);}}}
var DlgOpenSel=0;
AddEvent(window,'blur',_FrmBlrPZn);
/*DlgPop*/var _xDlgID=0;
function _FrHtCx(h){if(h.indexOf('ERROR')==0){if(h.endsWith&&h.endsWith('OK')){h=h.substr(0,h.length-2);}return h;}if(h.indexOf('X-HTML:')==0){return h.substr(7);}return h.replace(/\</g,'&lt;').replace(/\\\&lt\;/g,'<').replace(/\n/g,'<br>').replace(/\\n/g,'<br>');}
function FrmConfirm(HT,w,h,fn){if(!w||w<200){w=200;}if(!h||h<5){h=60;}_xDlgID++;var i=_xDlgID,o;var F=FrmHtml('<div style="display:block;background:#FFFFFF;padding:5px;width:100%;">'+_FrHtCx(HT)+'<hr><center><input id="_fPOk'+i+'" type="button" value="Aceptar" style="padding:2px;"/>&nbsp;&nbsp;&nbsp;<input id="_fPCn'+i+'" type="button" value="Cancelar" style="padding:2px;"/></center></div>',w,h,1,'visible');o=OB('_fPOk'+i);F.BTOK=o;o.fn=fn;setTimeout(function(){o.focus();},100);AddEvent(o,'click',function(o){FrmBack.hide();if(o.fn){o.fn(1);}});o=OB('_fPCn'+i);F.BTCLOSE=o;o.fn=fn;AddEvent(o,'click',function(o){FrmBack.hide();if(o.fn){o.fn(0);}});if(HT=='AUTO-OK'){FrmBack.hide();if(fn){fn(1);}}return F;}
function FrmAlert(HT,w,h,fn){if(!w||w<200){w=200;}if(!h||h<5){h=60;}_xDlgID++;var i=_xDlgID,o;var F=FrmHtml('<div style="display:block;background:#FFFFFF;padding:5px;width:100%;">'+_FrHtCx(HT)+'<hr><center><input id="_fPOk'+i+'" type="button" value="Aceptar" style="padding:2px;"/></center></div>',w,h,1,'visible');o=OB('_fPOk'+i);F.BTCLOSE=o;o.fn=fn;setTimeout(function(){o.focus();},100);AddEvent(o,'click',function(o){FrmBack.hide();if(o.fn){o.fn();}});return F;}
function FrmInput(HT,DTX,w,h,fn,df,tp,auc){if(!w||w<250){w=250;}if(!h||h<5){h=80;}_xDlgID++;var i=_xDlgID,o,iTX;var F=FrmHtml('<div style="display:block;background:#FFFFFF;padding:5px;width:100%;">'+_FrHtCx(HT)+'<center><input id="_fPTX'+i+'" type="'+(tp?tp:'text')+'" style="width:100%;margin-top:5px;margin-bottom:5px;" '+(auc==null||auc?'':'autocomplete="off"')+'/><br><input id="_fPOk'+i+'" type="button" value="Aceptar" style="padding:2px;"/>&nbsp;&nbsp;&nbsp;<input id="_fPCn'+i+'" type="button" value="Cancelar" style="padding:2px;"/></center></div>',w,h,1,'visible');o=OB('_fPOk'+i);F.BTOK=o;iTX=OB('_fPTX'+i);F.iTX=iTX;o.fn=fn;iTX.value=DTX||'';iTX.df=df||'';setTimeout(function(){iTX.focus();},100);iTX.o=o;AddKeys(iTX,function(k,iTX,e){if(k==13){iTX.o.click();}});AddEvent(o,'click',function(o){FrmBack.hide();if(o.fn){o.fn(iTX.value||iTX.df,1);}});o=OB('_fPCn'+i);F.BTCLOSE=o;o.fn=fn;AddEvent(o,'click',function(o){FrmBack.hide();if(o.fn){o.fn('',0);}});return F;}
function RXGenError(h,f,p,p2){h=h.substr(0,1)=='¬'?h.substr(1):'ERROR: '+h;var _w=window.FrmBack?window:(window.WP&&WP.FrmBack?WP:0);if(_w){_w.FrmAlert(h,200,60,function(){if(f){f(p,p2);}});}else{alert(h);if(f){f(p,p2);}}}