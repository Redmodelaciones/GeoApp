<?php $_u星=array();foreach($_GET as $_u春=>$_u染){array_push($_u星,$_u春.(is_null($_u染)||$_u染==''?'':'='.$_u染));}
if($_u星[0]=="APP"||$_u星[0]=="CSS"||$_u星[0]=='CLASS'){$_GET=array();$SESION_ID=$_u星[1];}else{/*XFN*/$_u星[0]='XFN';$SESION_ID=$_GET["_u-SID"];$_uX政=$_GET["_u-F"];$_uX星=$_POST["_POP_"];unset($_POST["_POP_"]);unset($_GET["_u-SID"]);unset($_GET["_u-F"]);unset($_GET["_u-DT"]);}
/*CORE*/global $_m施ncLV;global $_m斫TML;global $_m昱ASync;global $_m映ED;
global $_m昤S;global $_m星LG;
global $_m昤MTP;global $_m星OP3;global $_m施MAPI;
if(!isset($_m施ncLV)){$_m施ncLV=0;}
if(!isset($_m昱ASync)){$_m昱ASync=array();}
if(!isset($_m映ED)){$_m映ED=array();}
require_once("洵PTLV洵rt.core/Kernel.php");$_m星HP_CMPL=true;$_m既SIN=false;
/*RUN*/$_m斫TML=true;
if($_u星[0]=='XFN'){$_uX政X=$_m昤S->LoadFUN(_柞etPath($_uX政),_星rop($_uX星));$_uX昱S='';
 if(isset($_uX政X)){$_m施ncLV++;$_uX昱S=eval($_uX政X->CD);$_m施ncLV--;}
 $_u斫TML=ob_get_contents();ob_end_clean();
 echo($_uX昱S."<X-RT:VIRTUAL:HTML/>".$_u斫TML);
}else{/*Deco*/$_uX星N=strtoupper($_u星[2]);$_uX星LG=$_m昤S->PLG[$_uX星N];$_uX施D=strtoupper($_u星[3]);
 if(is_null($_uX星LG)){_柱Error('No se Localiza el PlugIns: '.$_uX星N);
 }elseif($_u星[0]=='APP'){
  if(method_exists($_uX星LG,'a'.$_uX施D)){eval('$'.'_uX星LG->a'.$_uX施D.'("'.$_u星[4].'");');}else{_柱Error('No se localiza la entrada Applet("'.$_uX施D.'"), en el objeto: '.$_u星[2]);}
 }elseif(!is_file($_uX星LG->PTH)){$_u昭I='Memory:';foreach($_m昤S->PLG as $ID=>$VL){$_u昭I.=vbCr.$ID.' => '.$VL->PTH;}
  _柱Error('No se Localiza el Puntero de Acceso("'.$_uX星LG->PTH.'"), en memoria.',$_u昭I);
 }elseif($_u星[0]=='CSS'){header('Content-type: text/css; charset=iso-8859-1');
  /*Load-Script*/$C='';$PLG=str_replace('.php','/',$_uX星LG->PTH);
  if(is_file($PLG.'CSS.rt-bsc')){$C=file_get_contents($PLG.'CSS.rt-bsc');}
  /*Render*/
  echo(str_replace('洵#CREF#洵',_柞etCoreRef(),str_replace('洵#SID#洵',$SESION_ID,str_replace('洵#XID#洵',$_uX星N,$C))));
 }elseif($_u星[0]=='CLASS'){header('Content-type: application/javascript; charset=iso-8859-1');
  /*Load-Script*/$C='';$PLG=str_replace('.php','/',$_uX星LG->PTH);
  if(is_file($PLG.'JS.rt-bsc')){$C=file_get_contents($PLG.'JS.rt-bsc');}
  /*Render*/
  echo(str_replace('洵#CREF#洵',_柞etCoreRef(),str_replace('洵#SID#洵',$SESION_ID,str_replace('洵#XID#洵',$_uX星N,$C))));
 }else{_柱Error('No se localiza el CODEC: '.$_u星[0]);}
}
$_m昤S->EndRun();
?>