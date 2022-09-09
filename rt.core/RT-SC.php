<?php /* RT-Security v. 1.0 */
define("USK","-.!¡@:ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_=*");
if(!isset($_SESSION["_¬RMC_x34"])){$_SESSION["_¬RMC_x34"]=0;}
function _¬rt_KEY_V($K=''){if(!_¬IsNE($K)){_¬WErrEx("El adaptador de RT a PHP, no integra algoritmos de encriptacion/desencriptación dinamicos, basado en Claves Privadas, por el nivel de seguridad que implica, si desea utilizar su aplicativo RT, en un servidor PHP, use la clave por defecto(que es de uso Publico).");return true;}return false;}
function _¬rt_KEY_G($C,$K=''){if(_¬rt_KEY_V($K)){return USK;}
 if($C==300391||$C==301991){_¬WErrEx("No se puede Utilizar la clave '".$C."', por que esta vinculada a un certificado de seguridad RT y el servidor PHP, no soporta certificados RT digitales.");return USK;}
 $nK='';$BS=USK;$i=0;$CL=strlen($C);
 while(strlen($BS)>0){$l=intval(_¬IntToStr($C,$i%$CL))+$CL;$l=$l%strlen($BS);$CH=substr($BS,$l,1);$nK=$nK.$CH;$BS=str_replace($CH,'',$BS);$i++;}return $nK;
}
function _¬Encrip($S,$C=128,$E=0,$R3=false,$K=''){if(_¬rt_KEY_V($K)){return "";}if(_¬IsNE($S)){return "";}if($E==0||$E==1){if($E==0){$S=_¬Escape($S);}if($C==300391){$C=3003;}$KYA=0;
  if(!$R3){$KYA=$_SESSION["_¬RMC_x34"];$KYA=$KYA+_¬Aleatorio(strlen(USK)-$KYA)+1;if($KYA>=strlen(USK)){$KYA=_¬Aleatorio(strlen(USK)-20);}$_SESSION["_¬RMC_x34"]=$KYA;}$KS=_¬rt_KEY_G($C+$KYA);$O='';$NC2=false;$NC3=false;$i=0;$SL=strlen($S);
  do{try{$C1=ord(substr($S,$i,1));
    try{if($i+1<$SL){$C2=ord(substr($S,$i+1,1));}else{$NC2=true;}}catch(Exception $ex){$NC2=true;}
	try{if($i+2<$SL){$C4=ord(substr($S,$i+2,1));}else{$NC3=true;}}catch(Exception $ex){$NC3=true;}
   }catch(Exception $ex){}$i=$i+3;
   try{$E1=$C1 >> 2;$E2=(($C1 & 3) << 4) | ($C2 >> 4);$E3=(($C2 & 15) << 2) | ($C4 >> 6);$E4=$C4 & 63;if($NC2){$E4=64;$E3=64;}elseif($NC3){$E4=64;}$O=$O.substr($KS,$E1,1).substr($KS,$E2,1).substr($KS,$E3,1).substr($KS,$E4,1);}catch(Exception $ex){$O=$O."E!";}
  }while($i<$SL);
  return ($R3?'':substr(USK,$KYA,1)).$O;
 }else{_¬WErrEx("El Adaptador de Seguridad RT, para PHP. no soporta el Nivel de Encriptación: ".$E);return "";}
}
function _¬Decrip($S,$C=128,$E=0,$K=''){if(_¬rt_KEY_V($K)){return "";}if($C==301991){$C=3091;}if(_¬IsNE($S)){return "";}if($E==0||$E==1){$KYA=_¬IndexOf(USK,substr($S,0,1));$i=1;if(strlen($S)%4==0){$i=0;$KYA=0;}$KS=_¬rt_KEY_G($C+$KYA);$O='';
  do{
   try{$E1=_¬IndexOf($KS,substr($S,$i,1));$E2=_¬IndexOf($KS,substr($S,$i+1,1));$E3=_¬IndexOf($KS,substr($S,$i+2,1));$E4=_¬IndexOf($KS,substr($S,$i+3,1));}catch(Exception $ex){}$i=$i+4;
   try{$C1=($E1 << 2) | ($E2 >> 4);$C2=(($E2 & 15) << 4) | ($E3 >> 2);$C4=(($E3 & 3) << 6) | $E4;$O=$O.chr($C1);if($E3!=64){$O=$O.chr($C2);}if($E4!=64){$O=$O.chr($C4);}}catch(Exception $ex){$O=$O.'E!';}
  }while($i<strlen($S));
  if($E==1){return $O;}else{return _¬Unescape($O);}
 }else{_¬WErrEx("El Adaptador de Seguridad RT, para PHP. no soporta el Nivel de Encriptación: ".$E);return "";}
}
?>