<?php $_u�P=array();foreach($_GET as $_u�K=>$_u�V){array_push($_u�P,$_u�K.(is_null($_u�V)||$_u�V==''?'':'='.$_u�V));}
if($_u�P[0]=="APP"||$_u�P[0]=="CSS"||$_u�P[0]=='CLASS'){$_GET=array();$SESION_ID=$_u�P[1];}else{/*XFN*/$_u�P[0]='XFN';$SESION_ID=$_GET["_u-SID"];$_uX�F=$_GET["_u-F"];$_uX�P=$_POST["_POP_"];unset($_POST["_POP_"]);unset($_GET["_u-SID"]);unset($_GET["_u-F"]);unset($_GET["_u-DT"]);}
/*CORE*/global $_m�IncLV;global $_m�HTML;global $_m�RASync;global $_m�MED;
global $_m�SS;global $_m�PLG;
global $_m�SMTP;global $_m�POP3;global $_m�IMAPI;
if(!isset($_m�IncLV)){$_m�IncLV=0;}
if(!isset($_m�RASync)){$_m�RASync=array();}
if(!isset($_m�MED)){$_m�MED=array();}
require_once("��PTLV��rt.core/Kernel.php");$_m�PHP_CMPL=true;$_m�JSIN=false;
/*RUN*/$_m�HTML=true;
if($_u�P[0]=='XFN'){$_uX�FX=$_m�SS->LoadFUN(_�getPath($_uX�F),_�Prop($_uX�P));$_uX�RS='';
 if(isset($_uX�FX)){$_m�IncLV++;$_uX�RS=eval($_uX�FX->CD);$_m�IncLV--;}
 $_u�HTML=ob_get_contents();ob_end_clean();
 echo($_uX�RS."<X-RT:VIRTUAL:HTML/>".$_u�HTML);
}else{/*Deco*/$_uX�PN=strtoupper($_u�P[2]);$_uX�PLG=$_m�SS->PLG[$_uX�PN];$_uX�ID=strtoupper($_u�P[3]);
 if(is_null($_uX�PLG)){_�WError('No se Localiza el PlugIns: '.$_uX�PN);
 }elseif($_u�P[0]=='APP'){
  if(method_exists($_uX�PLG,'a'.$_uX�ID)){eval('$'.'_uX�PLG->a'.$_uX�ID.'("'.$_u�P[4].'");');}else{_�WError('No se localiza la entrada Applet("'.$_uX�ID.'"), en el objeto: '.$_u�P[2]);}
 }elseif(!is_file($_uX�PLG->PTH)){$_u�LI='Memory:';foreach($_m�SS->PLG as $ID=>$VL){$_u�LI.=vbCr.$ID.' => '.$VL->PTH;}
  _�WError('No se Localiza el Puntero de Acceso("'.$_uX�PLG->PTH.'"), en memoria.',$_u�LI);
 }elseif($_u�P[0]=='CSS'){header('Content-type: text/css; charset=iso-8859-1');
  /*Load-Script*/$C='';$PLG=str_replace('.php','/',$_uX�PLG->PTH);
  if(is_file($PLG.'CSS.rt-bsc')){$C=file_get_contents($PLG.'CSS.rt-bsc');}
  /*Render*/
  echo(str_replace('��#CREF#��',_�getCoreRef(),str_replace('��#SID#��',$SESION_ID,str_replace('��#XID#��',$_uX�PN,$C))));
 }elseif($_u�P[0]=='CLASS'){header('Content-type: application/javascript; charset=iso-8859-1');
  /*Load-Script*/$C='';$PLG=str_replace('.php','/',$_uX�PLG->PTH);
  if(is_file($PLG.'JS.rt-bsc')){$C=file_get_contents($PLG.'JS.rt-bsc');}
  /*Render*/
  echo(str_replace('��#CREF#��',_�getCoreRef(),str_replace('��#SID#��',$SESION_ID,str_replace('��#XID#��',$_uX�PN,$C))));
 }else{_�WError('No se localiza el CODEC: '.$_u�P[0]);}
}
$_m�SS->EndRun();
?>