<?php 
if(strtolower(ini_get('default_charset'))=='iso-8859-1'||ini_set('default_charset', 'iso-8859-1')){header('Content-Type: text/html; charset=iso-8859-1');}else{header('Content-Type: text/html; charset=UTF-8');}
header('Access-Control-Allow-Origin: *');
define('vbCr',chr(13));define('vbLf',chr(10));define('vbCrLf',vbCr.vbLf);
define('C1',chr(1));define('C2',chr(2));
define('CoreDir',str_ireplace("rt.core/Kernel.php","rt.core/",str_replace('\\','/',__FILE__)));
define('MainDir',str_replace('\\','/',str_ireplace(str_replace('\\','/',$_SERVER['PHP_SELF']),'/',str_replace('\\','/',$_SERVER['SCRIPT_FILENAME']))));
define('SubDir',str_ireplace(MainDir,"","\\"._¬UrlRuta($_SERVER['SCRIPT_FILENAME'])));
define('Developner',strtolower($_SERVER["SERVER_NAME"])=='localhost'||$_SERVER["SERVER_NAME"]=='127.0.0.1');
define('IsThread',class_exists('Threaded'));
if(!IsThread){class Threaded{}}
function _¬getCoreRef(){return str_replace('\\','/',str_ireplace(MainDir,'/',str_ireplace("rt.core/Kernel.php","rt.core/",str_replace('\\','/',__FILE__))));}
ob_start();
/* Import VARS */$_m¬GET=null;
foreach($_COOKIE as $_u¬KY=>$_u¬VL){_¬DSet($_u¬KY,$_u¬VL);}
foreach($_POST as $_u¬KY=>$_u¬VL){_¬DSet('¬09_POST_'.$_u¬KY,$_u¬VL);_¬DSetN($_u¬KY,$_u¬VL);}
foreach($_FILES as $_u¬KY=>$_u¬VL){_¬DSet('¬09_POST_'.$_u¬KY,$_u¬VL['name']);_¬DSetN($_u¬KY,$_u¬VL['name']);_¬DSet('¬09_POST_'.$_u¬KY.'_FILE',$_u¬VL['tmp_name']);_¬DSetN($_u¬KY.'_FILE',$_u¬VL['tmp_name']);_¬DSet('¬09_POST_'.$_u¬KY.'_TYPE',$_u¬VL['type']);_¬DSetN($_u¬KY.'_TYPE',$_u¬VL['type']);}
foreach($_GET as $_u¬KY=>$_u¬VL){_¬DSet($_u¬KY,$_u¬VL);$_m¬GET=(isset($_m¬GET)?$_m¬GET.'&':'').$_u¬KY.'='._¬Escape($_u¬VL,true);}
/* GlobalCode */
function _¬Val($v,$cn=true){if(is_string($v)){preg_match('/^-?[.,0-9]*/',$v,$c);$v=$c[0];}if($cn){$v=floatval($v);}elseif(_¬IsNE($v)){$v='0';}return $v;}
function _¬IncLng($N,$C=1){$N=_¬ArrLng($N,$SN);$C=_¬ArrLng($C,$SC);$CN=count($N);$CC=count($C);if($CN>$CC){array_pad($C,$CN,0);}else{array_pad($N,$CC,0);}if($SN==$SC){/*Suma*/for($p=0;$p<count($N);$p++){$N[$p]+=$C[$p];if($N[$p]>9){$N[$p+1]+=round($N[$p]/10,0,PHP_ROUND_HALF_DOWN);$N[$p]=$N[$p]%10;}}}else{/*Resta*/$CMN=_¬IsMLngArr($N,$C);if($CMN==2){return '0';}elseif($CMN==0){/*Invierto*/$p=$SN;$SN=$SC;$SC=$p;$p=$N;$N=$C;$C=$p;}for($p=0;$p<count($N);$p++){if($N[$p]<0){$N[$p+1]+=$N[$p];$N[$p]=0;}if($N[$p]>=$C[$p]){$N[$p]-=$C[$p];}else{$N[$p]=$N[$p]+10-$C[$p];$N[$p+1]-=1;}}}return ($SN?'':'-').implode('',array_reverse($N));}
function _¬ArrLng($N,&$SF=true){if(_¬IsNE($N)){$N=0;}$N=_¬Val(str_replace('--','',strval($N)),false);$SF=true;if(substr($N,0,1)=='-'){$N=substr($N,1);$SF=false;}$F=array();while(strlen($N)>1){$T=_¬Val(substr($N,-1));$N=substr($N,0,strlen($N)-1);array_push($F,$T);}array_push($F,$N);return $F;}
function _¬IsMLngArr($AN,$ANC){$CAN=count($AN);$CANC=count($ANC);if($CAN>$CANC){return 1;}elseif($CAN<$CANC){return 0;}for($i=$CAN-1;$i>=0;$i--){if($AN[$i]>$ANC[$i]){return 1;}elseif($AN[$i]<$ANC[$i]){return 0;}}return 2;}
function _¬FileSize($f){$s=filesize($f);if($s<0){if(!(strtoupper(substr(PHP_OS,0,3))=='WIN')){$s=trim(`stat -c%s $f`);}else{$fo=new COM("Scripting.FileSystemObject");$f=$fo->GetFile($f);$s=$f->Size;}}return $s;}
function _¬FormatByte($s){$fKB=1024;$fMB=$fKB*1024;$fGB=$fMB*1024;$s=intval($s);$tGB=round($s/$fGB,0,PHP_ROUND_HALF_DOWN);$s=$s%$fGB;$tMB=round($s/$fMB,0,PHP_ROUND_HALF_DOWN);$s=$s%$fMB;$tKB=round($s/$fKB,0,PHP_ROUND_HALF_DOWN);$tBT=$s%$fKB;
 if($tGB>0){$s=$tGB.'.'.substr(_¬Right('000'.$tMB,3),0,2);}elseif($tMB>0){$s=$tMB.'.'.substr(_¬Right('000'.$tKB,3),0,2);}elseif($tKB>0){$s=$tKB.'.'.substr(_¬Right('000'.$tBT,3),0,2);}else{$s=$tBT.' b';}return str_replace('.00 ',' ',$s);
}
function _¬DinV($V,$CU=true){$V=str_replace('.','¬23_',str_replace('=','¬22_',str_replace('<','¬21_',str_replace('>','¬20_',str_replace('¿','¬19_',str_replace('?','¬18_',str_replace(')','¬17_',str_replace('(','¬16_',str_replace('%','¬15_',str_replace('/','¬14_',str_replace('\\','¬13_',str_replace('+','¬12_',str_replace(';','¬11_',str_replace('&','¬10_',str_replace('$','¬09_',str_replace(vbLf,'¬08_',str_replace(vbCr,'¬07_',str_replace("'",'¬06_',str_replace('"','¬05_',str_replace('|','¬04_',str_replace('#','¬03_',str_replace('-','¬02_',str_replace('*','¬01_',str_replace(' ','¬00_',$V))))))))))))))))))))))));if($CU){$V=strtoupper($V);}$VX=substr($V,0,1);if(strval(intval(_¬Val($VX)))===$VX){return '¬¬'.$V;}return $V;}
function _¬DSet($N,$V,$CU=true){$N=_¬DinV($N,$CU);if(!_¬IsNE($N)){eval('global $'.$N.';$'.$N.'=$V;');}}
function _¬DSetN($N,$V,$CU=true){$N=_¬DinV($N,$CU);if(!_¬IsNE($N)){eval('global $'.$N.';if(!isset($'.$N.')){$'.$N.'=$V;}');}}
function _¬DGet($N,$CU=true){$N=_¬DinV($N,$CU);if(_¬IsNE($N)){return '';}return eval('global $'.$N.';if(!isset($'.$N.')){return null;}return $'.$N.';');}
function _¬TGet($N){$N=_¬DinV($N);if(_¬IsNE($N)){return false;}return eval('global $'.$N.';return isset($'.$N.');');}
function _¬CGet($N){$N=_¬DinV($N);return eval('return '.$N.';');}
function _¬AGet($A,$K){if(array_key_exists($K,$A)){return $A[$K];}return null;}
function _¬RemArr(&$A,$K){if(array_key_exists($K,$A)){unset($A[$K]);}}
function _¬NVldMin($N,$MN,$Msg=''){$N=_¬Val($N);$MN=_¬Val($MN);if($N<$MN){if(_¬IsNE($Msg)){$Msg='El numero debe ser mayor o igual a '.$MN;}_¬WError($Msg);return $MN;}return $N;}
function _¬Right($S,$L){return substr($S,-$L);}
function _¬IsNE($T){return is_null($T)||!isset($T)||$T==='';}
function _¬IsNN($T,$D=''){return is_null($T)||!isset($T)?$D:$T;}
function _¬IsCT($V){return !is_null($V)&&$V!==''&&strtoupper($V)!='FALSE';}
function _¬IsDgt($C){return is_numeric($C)&&strpos($C,'-')===false&&strpos($C,'.')===false&&strpos($C,',')===false;}
function _¬EndWith($S,$E,$CI=false){$L=strlen($E);if($L==0){return true;}$S=substr($S,-$L);return ($CI?strcasecmp($S,$E):strcmp($S,$E))===0;}
function _¬IndexOf($S,$F,$CI=false){$F=$CI?stripos($S,$F):strpos($S,$F);return $F===false?-1:(_¬IsNE($F)?0:$F);}
function _¬LastIndexOf($S,$F,$CI=false){$F=$CI?strripos($S,$F):strrpos($S,$F);return $F===false?-1:(_¬IsNE($F)?0:$F);}
function _¬lsFiles($d,$m=0,$r=false,$ft='',&$a=null){/*$m:0(Fil),1(Fol),2(Fil And Fol),11(FolPT),12(Fil And FolPT),20(FilNoExt),22(FilNoExt And FolPT)*/$d=str_replace('\\','/',$d);if(!_¬EndWith($d,'/')){$d.='/';}if(is_null($a)){$a=array();}
 if(is_null($ft)||$ft==''||$ft=='*.*'){$ft='';}elseif(strpos('/i',$ft)===false&&substr($ft,0,1)!='/'){$fr='';foreach(explode(';',str_replace(',',';',$ft)) as $f){$fr.='|(^'.str_replace('?','.',str_replace('*','.*',str_replace('.','\\.',$f))).'$)';}if($fr!=''){$ft='/'.substr($fr,1).'/i';}}
 if(is_dir($d)){if($dr=opendir($d)){
  while(($f=readdir($dr))!==false){if($f!='.'&&$f!='..'){$NR=$d.$f;$IsD=is_dir($NR);
   if(((($m==0||$m==20)&&!$IsD)||(($m==1||$m==11)&&$IsD)||$m==2||$m==12||$m==22)&&($ft==''||preg_match($ft,$f))){$NR=str_replace('/','\\',$NR);if($IsD){if($m==11||$m==12||$m==22){$NR.='\\';}}elseif($m==20||$m==22){$x=_¬GetExtension($f);if(strripos($f,$x)!==false){$NR=substr($NR,0,-strlen($x));}}array_push($a,$NR);}
   if($r&&$IsD){_¬lsFiles($NR,$m,$r,$ft,$a);}
  }}closedir($dr);
 }}else{throw new Exception('No Existe el directorio: '.$d);}		
 return $a;		
}
function _¬dlFolder($d,$r=false){$d=str_replace('\\','/',$d);if(!_¬EndWith($d,'/')){$d.='/';}
 if(is_dir($d)){if($r&&$dr=opendir($d)){
  while($f=readdir($dr)){if($f!='.'&&$f!='..'){if(!is_dir($d.$f)){unlink($d.$f);}else{_¬dlFolder($d.$f,$r);}}}
  closedir($dr);
 }rmdir($d);}
 return true;
}
/*Native:MAIN*/
function _¬Aleatorio($MX,$MN=0){return rand(intval($MN),intval($MX));}
function _¬IntToStr($I,$F=''){if($F==0||$F==''){return strval($I);}return $F;}
function _¬Prop($P,$I=false,$C=1){/*TX*/$C=_¬Val($C);if($C<0){$C=1;}$T=array();if(!_¬IsNE($P)){$T=explode('"',str_replace(' "" ', "  ",str_replace('\\"', "'''",str_replace("\\\\",C2,$P))));for($i=1;$i<count($T);$i=$i+2){$T[$i]=str_replace("''°'",'"',str_replace(" ",C1,$T[$i]));if(!$I){$T[$i]=str_replace("'''",'"',$T[$i]);}}$T=explode(' ',implode('',$T));for($i=0;$i<count($T);$i++){$T[$i]=str_replace(C2,'\\',str_replace(C1,' ',$T[$i]));if(_¬IsNE($T[$i])){$T[$i]='';}}}return array_pad($T,$C,'');}
function _¬ParseA(&$T,$D,&$R,$CI=true){try{$i=_¬IndexOf($T,$D,$CI);if($i==0){$R='';$T=substr($T,strlen($D));}elseif($i>0){$R=substr($T,0,$i);$T=substr($T,$i+strlen($D));}else{$R=$T;$T='';}return $i>=0||strlen($R)>0;}catch(Exception $e){if(_¬IsNE($T)){$R='';}else{$R=$T;}$T='';return strlen($R)>0;}}
function _¬NToHex($N,$ND=0){$N=strtoupper(dechex(_¬Val($N)));$ND=_¬Val($ND);while(strlen($N)<$ND){$N='0'.$N;}return $N;}
function _¬StrHex($H,&$N=0){$H=strtoupper($H);if(_¬IsNE($H)){return false;}$j=0;$cc=strlen($H);while($j<$cc){$C=substr($H,$j,1);if(!_¬IsDgt($C)&&$C!="A"&&$C!="B"&&$C!="C"&&$C!="D"&&$C!="E"&&$C!="F"){return false;}$j++;}$N=hexdec($H);return true;}
function _¬Escape($T,$A=false){if(_¬IsNE($T)){return "";}
 $T=str_replace('%','%25',$T);if($A){$T=str_replace(' ','%20',$T);}
 $i=0;while($i<40){if($i!=32&&$i!=37){$T=str_replace(chr($i),'%'._¬NToHex($i,2),$T);}$i++;}
 $i=58;while($i<64){$T=str_replace(chr($i),'%'._¬NToHex($i,2),$T);$i++;}
 $i=91;while($i<97){$T=str_replace(chr($i),'%'._¬NToHex($i,2),$T);$i++;}
 if($A){$i=123;while($i<126){$T=str_replace(chr($i),'%'._¬NToHex($i,2),$T);$i++;}
  $i=40;while($i<48){$T=str_replace(chr($i),'%'._¬NToHex($i,2),$T);$i++;}
 }else{$T=str_replace(chr(44),'%2C',str_replace("|","%7C",$T));}
 $i=126;while($i<256){$T=str_replace(chr($i),'%'._¬NToHex($i,2),$T);$i++;}
 return $T;
}
function _¬Escsig($T){if(_¬IsNE($T)){return "";}
 return str_replace(vbLf,"%0A",str_replace(vbCr,"%0D",str_replace("\\", "%5C",str_replace("/","%2F",str_replace("'","%27",str_replace("\"","%22",str_replace("!","%21",str_replace(",","%2C",str_replace("¿","%BF",str_replace("?","%3F",str_replace(":","%3A",str_replace(";","%3B",str_replace("|","%7C",str_replace("%","%25",$T))))))))))))));
}
function _¬Unescape($T,$F=true){if(_¬IsNE($T)){return "";}
 $tim=explode("%",$T);$T=$tim[0];$cc=count($tim);$o=1;$nu=0;
 if($F){while($o<$cc){if(_¬StrHex(substr($tim[$o],0,2),$nu)){$T=$T.chr($nu).substr($tim[$o],2);}else{$T=$T.'%'.$tim[$o];}$o++;}
 }else{while($o<$cc){if(_¬StrHex(substr($tim[$o],0,2),$nu)&&($nu==13||$nu==10||$nu>=32&&$nu<=126||$nu>=128&&$nu<=154||$nu>=160&&$nu<=165||$nu==169||$nu>=181&&$nu<=183||$nu>=198&&$nu<=199||$nu>=208&&$nu<=212||$nu>=224||$nu>=226&&$nu<=229)){$T=$T.chr($nu).substr($tim[$o],2);}else{$T=$T.'%'.$tim[$o];}$o++;}}return $T;
}
function _¬UrlRuta($U,$SD=false){if(_¬IsNE($U)){return "";}
 $DR=explode("/",str_replace("\\","/",$U));$CD=count($DR);
 if($CD>1){if($CD>2&&_¬IsNE($DR[1])){$DR[1]=C1;}
  if($SD&&_¬IsNE($DR[$CD-1])&&$CD>2){$DR[$CD-2]="";}
  $DR[$CD-1]="";return str_replace(C1,"",str_replace("//","/",str_replace("///","/",implode("/",$DR))));
 }else{return "/";}
}
function _¬UrlNombre($U,$SD=false){if(_¬IsNE($U)){return "";}
 $DR=explode("/",str_replace("\\","/",$U));$CD=count($DR);
 if($SD&&_¬IsNE($DR[$CD-1])&&$CD>2){return $DR[$CD-2];}else{return $DR[$CD-1];}
}
function _¬GetExtension($P){$E=".";try{$B=explode("/",str_replace("\\", "/",$P));$B=explode(".",$B[count($B)-1]);if(count($B)>1){return ".".$B[count($B)-1];}}catch(Exception $ex){}return $E;}
function _¬InstallMod($F){$PTH=CoreDir.'PlugIns/'.$F;if(is_file($PTH)){return $PTH;}return '';}
/*Native:RED*/
function _¬getHost($M=0){
 if($H=$_SERVER['HTTP_X_FORWARDED_HOST']){$E=explode(',',$H);$H=trim(end($E));}else{if(!$H=$_SERVER['HTTP_HOST']){if(!$H=$_SERVER['SERVER_NAME']){$H=!empty($_SERVER['SERVER_ADDR'])?$_SERVER['SERVER_ADDR']:'';}}}
 $H=trim($H);
 if(strpos($H,':')===false){$H=$H.':'.(_¬IsHttps()?'443':'80');}
 if($M==1||$M==11){$H=explode('/',$H);$H[0]=str_replace((_¬IsHttps()?':443'.C1:':80'.C1),'',$H[0].C1);$H[0]=str_replace(C1,'',$H[0]);if($M==1){$H=implode('/',$H);}else{$H=$H[0];}}elseif($M==3){/*DelPort*/$H=preg_replace('/:\d+$/','',$H);}elseif($M==4){$H=explode(':',$H);$H=$H[1];}
 return $H;
}
function _¬getMod(){$R=_¬UrlNombre($_SERVER['PHP_SELF']);return _¬IsNE($R)?'INDEX':$R;}
function _¬getModAccess(){$MD=_¬UrlNombre(SubDir,true);if(_¬IndexOf($MD,':')>0||_¬IsNE($MD)){$MD='MAIN';}$T0=explode(':',_¬getPath(null,true));$T0=explode('/',$T0[0]);return $T0[0].'_'.$MD;}
function _¬getModRef(){return $_SERVER['PHP_SELF'];}
function _¬getPath($U=null,$IBR=false){$P=explode("/",_¬getHost()."\\/");$P=($IBR?str_replace("\\","/","/".$P[1].SubDir):str_replace("\\","/",SubDir));if(!is_null($U)){return _¬DireCom($P.$U);}return $P;}
function _¬getBaseRef(){return $_SERVER["REQUEST_URI"];}
function _¬IsHttps(){return isset($_SERVER['HTTPS']);}
function _¬IsDroid($F=false){if($F){return true;}return stripos($_SERVER['HTTP_USER_AGENT'],'ANDROID')!==false;}
function _¬DireCom($U){$A=explode("/",str_replace("\\","/",$U));$p=count($A)-2;$n=0;$U=$A[count($A)-1];while($p>=0){if($A[$p]=='..'){$n++;}elseif($n>0){$n--;}elseif($A[$p]!=""||$p==0){$U=$A[$p]."/".$U;}$p--;}return $U;}
function _¬NoExSlv(&$U,$E){if(!is_file($U.$E)){return true;}$U=$U.$E;return false;}
function _¬Directorio($U=''){
 try{if(strlen($U)>0){$RU=trim(str_replace("\\","/",$U));
  if(substr($RU,0,2)=='//'){/*RedAda*/return str_replace("/","\\",$RU);
  }elseif(substr($RU,0,1)!='\\'){$RU=_¬DireCom(_¬IndexOf($RU,":\\")>=0?$RU:MainDir.SubDir.$RU);if(strpos($RU,'\\..\\')!==false){$RU=_¬DireCom($RU);}
   if(!is_file($RU)){if(_¬IsDroid()&&_¬NoExSlv($RU,".droid.rtk")&&_¬NoExSlv($RU,".droid.rtp")&&_¬NoExSlv($RU,".droid.php")&&_¬NoExSlv($RU,".droid.html")){}
    if(!is_file($RU)&&_¬NoExSlv($RU,".rtk")&&_¬NoExSlv($RU,".rtp")&&_¬NoExSlv($RU,".php")&&_¬NoExSlv($RU,".htm")&&_¬NoExSlv($RU,".html")&&_¬NoExSlv($RU,".exe")){}
   }return $RU;
  }else{$RU=_¬DireCom(MainDir.$RU);if(file_exists($RU)){return $RU;}}
 }}catch(Exception $e){}return _¬IsNE($RU)?MainDir:$RU;
}
function _¬WCookie($N,$V,$T='',$P='',$D='',$W=true,$LC='WRITE'){if(_¬IsNE($V)){$T='0';}if($T!==''){$T=_¬Val($T);$T=time()+intval($T);}else{/*1Y*/$T=time()+31536000;}$N=str_replace('=','-',$N);if(headers_sent()){_¬WError('Ya se Enviaron las cabeceras al navegador.',$LC.' COOKIE CODEC');}else{try{if(_¬IsNE($P)){$P='/';}if(version_compare(phpversion(),'7.3.0','>=')){setcookie($N,$V,array('expires'=>$T,'path'=>$P,'domain'=>$D,'secure'=>FALSE,'httponly'=>FALSE,'samesite'=>'strict'));}else{setcookie($N,$V,$T,$P.'; SameSite=strict',$D,FALSE,FALSE);}}catch(Exception $ex){_¬WError("Error-Write-Cookie: ".$ex->getMessage());}}if($W){_¬DSet($N,$V);}}
/*WEB-LIB*/
function _¬Exists($U){return !_¬IsNE($U)&&file_exists(_¬Directorio($U));}
function _¬SqlNull($D,$M=''){try{$M=str_replace("NUMBER","N",str_replace("FORCE","F",str_replace("TEXT","T",strtoupper($M))));
 if(_¬IsNE($D)&&substr($M,0,1)!='F'){return 'NULL';}
 if($M=='T'||$M=='FT'){return "'".str_replace("'","''",$D)."'";}
 if($M=='N'||$M=='FN'||$M=='L'||$M=='FL'){return _¬Val($D,false);}
 return $D;
}catch(Exception $ex){if($M=='FL'){return '0';}return 'NULL';}}
function _¬SqlDate($T,$TP,$EX,$FR){try{$T=str_replace(';',':',trim($T));
 if(_¬IsNE($FR)){if(_¬IsNE($TP)){$TP='SQL';}$TPX=strtoupper($TP);
  if($TPX=="ACCESS"||$TP=="#"){$TP="#";$EX="#";$FR="Y-m-d H:i:s";
  }elseif($TPX=="MYSQL"||$TP=="$"){$TP="STR_TO_DATE('";$EX="', '%d/%m/%Y %T')";$FR="d/m/Y H:i:s";
  }elseif($TPX=="TF"){$TP='"';$EX='"';$FR="Y-m-d";
  }else{/*SQL Server*/$TP="CONVERT(DATETIME,'";$EX="',121)";$FR="Y-m-d H:i:s.u";}
  $T=_¬getDate($T)->format($FR);
  return $TP.$T.$EX;
 }else{return $TP._¬frtDate(_¬getDate($T),$FR).$EX;}
}catch(Exception $e){return "ERROR('".$T."':".str_replace(" ","&nbsp;",$e->getMessage())."')";}}
function _¬Coax($V){if(_¬IsNE($V)){return "";}$SK=str_replace("\\]","/ÿ/",str_replace("\\[","/ÿ/",$V));if(strpos($SK,"[")===false){return str_replace("/ÿ/","\\]",str_replace("/ÿ/","\\[",$V));}$CX='';$RS='';$DX=0;$PQ=array("");$CCS=10;
 while(_¬ParseA($SK,'[',$RS)&&$CCS>0){$CX=$CX.$RS;$RS='';$j=0;$NP=strlen($SK);
  while($j<$NP){$C=substr($SK,$j,1);
   if($C=='['){$RS=$RS.$C;$DX++;}elseif($C==']'){if($DX>0){$RS=$RS.$C;$DX--;}else{$SK=substr($SK,$j+1);break;}
   }elseif($C==':'&&$DX==0){$CC=count($PQ);$PQ[$CC-1]=$RS;$PQ[$CC]='';$RS='';}else{$RS=$RS.$C;}$j++;
  }$CC=count($PQ);$PQ[$CC-1]=$RS;$PQ[$CC]='';
  if(count($PQ)<3&&_¬IndexOf($RS,'[')<0){$CX=$CX._¬SData($RS);}else{$CX=$CX._¬Data($PQ);}
  $PQ=array("");$CCS--;
 }if(_¬IsNE($CX)){return "";}
 return str_replace("/ÿ/","]",str_replace("/ÿ/","[",$CX));
}
function _¬SData($t){$SC=substr($t,0,1);if($SC=='#'){return chr(intval(substr($t,1)));}if($SC=='@'){return ord(substr($t,1,1));}if($SC=='+'){/*AscW*/return ord(substr($t,1,1));}if($SC=='%'){return hexdec(substr($t,1));}$SC=_¬DGet(strtoupper($t));if(_¬IsNE($SC)){return "";}return $SC;}
function _¬Data($q){$c=count($q);if($c==0){return '';}if($c==1||_¬IsNE($q[1])){return _¬DGet(_¬Coax($q[0]));}$D='';try{$q0=strtoupper($q[0]);
 if($q0=='MID'){$S=round(_¬Val($q[2]));if($S<1){$S=1;}if($c>4){return substr(_¬Coax($q[1]),$S-1,_¬NVldMin(round(_¬Val($q[3])),0,"El valor del argumento 'Length' debe ser mayor o igual a cero"));}return substr(_¬Coax($q[1]),$S-1);
 }elseif($q0=='ESCAPE'){return _¬Escape(_¬Coax($q[1]),strtoupper(_¬Coax($q[2]))!='FALSE');
 }elseif($q0=='ESCSIG'){return _¬Escsig(_¬Coax($q[1]));
 }elseif($q0=='UNESCAPE'){return _¬Unescape(_¬Coax($q[1]),strtoupper(_¬Coax($q[2]))!='FALSE');
 }elseif($q0=='URL'){unset($q[0]);return _¬PrsMltFile($q);
 }elseif($q0=='FILE'){return _¬Directorio(_¬Coax($q[1]));
 }elseif($q0=='SAFE'){return _¬SfLn(_¬Coax($q[1]));
 }elseif($q0=='UNSAFE'){return _¬USfLn(_¬Coax($q[1]));
 }elseif($q0=='VAR'){$q[0]="STR";$q[1]='['._¬Coax($q[1]).']';return _¬Data($q);
 }elseif($q0=='STR'){$D=_¬Coax($q[1]);try{$q2=strtoupper($q[2]);if($q2=='TRIM'){return trim($D);}if($q2=='TUPPER'){return strtoupper(trim($D));}if($q2=='TLOWER'){return strtolower(trim($D));}if($q2=='LEFT'){return substr($D,0,_¬Val(_¬Coax($q[3])));}if($q2=='RIGHT'){return _¬Right($D,_¬Val(_¬Coax($q[3])));}if($q2=='UPPER'){return strtoupper($D);}if($q2=='LOWER'){return strtolower($D);}if($q2=='RTRIM'){return rtrim($D);}if($q2=='LTRIM'){return ltrim($D);}if($q2=='LEN'){return strlen($D);}if($q2=='TLEN'){return strlen(trim($D));}if($q2=='MAYUS'){return _¬Mayus($D_¬Val(_¬Coax($q[3])));}if($q2=='BASE64'){return base64_decode($D);}if($q2=='TO-BASE64'){return base64_encode($D);}}catch(Exception $ex){}return $D;
 }elseif($q0=='ALT'){for($j=1;$j<$c;$j++){$D=_¬Coax($q[$j]);if(!_¬IsNE(trim($D))){return $D;}}
 }elseif($q0=='MATH'){return _¬SlvMath(_¬PrsEQ($q[1]));
 }elseif($q0=='ROUND'){if(_¬IsNE($q[2])){$q[2]=-1;}
  return _¬RoundNum(_¬Val(_¬Coax($q[1])),_¬Val(_¬Coax($q[2])),_¬IsNE($q[3])&&strtoupper($q[3]));
 }elseif($q0=='IF'){if(_¬CoaxLgc($q[1])){return _¬Coax($q[2]);}return _¬Coax($q[3]);
 }elseif($q0=='EVENT'){if($c==3){array_pad($q,4,'False');$q[2]='True';$q[3]='False';}if(_¬CoaxLgc($q[1],true)){return _¬Coax($q[2]);}return _¬Coax($q[3]);
 }elseif($q0=='RPL'){return str_replace(_¬Coax($q[2]),_¬Coax($q[3]),_¬Coax($q[1]));
 }elseif($q0=='XRPL'){return str_ireplace(_¬Coax($q[2]),_¬Coax($q[3]),_¬Coax($q[1]));
 }elseif($q0=='EXEC'){
 }elseif($q0=='IMAGE'){
 }elseif($q0=='EXISTS'){$q1=_¬Coax($q[1]);if($c>2&&!_¬IsNE($q[2])){$q1=$q1._¬Coax($q[2]);}return _¬Exists($q1)?'True':'False';
 }elseif($q0=='CASE'){
 }elseif($q0=='XIN'){$D=str_replace(' ','',_¬Coax($q[1]));
  for($k=2;$k<$c-1;$k=$k+2){if(strtoupper($q[k])=='ELSE'||_¬IndexOf($D,_¬Coax($q[k]),true)>=0){return _¬IsNE($D=_¬Coax($q[k+1]))?'':$D;}}
 }elseif($q0=='IN'){$D=_¬Coax($q[1]);
  for($k=2;$k<$c-1;$k=$k+2){if(strtoupper($q[k])=='ELSE'||_¬IndexOf($D,_¬Coax($q[k]),true)>=0){return _¬IsNE($D=_¬Coax($q[k+1]))?'':$D;}}
 }elseif($q0=='PATTERN'){
 }elseif($q0=='DATE'){return _¬getDateX(str_replace(';',':',trim($q[1])),trim($q[2]),$q[3]);
 }elseif($q0=='DATE-ADD'){
 }elseif($q0=='TICKS'){
 }elseif($q0=='DECLARE'){
 }elseif($q0=='SQLDATE'){return _¬SqlDate(_¬Coax($q[1]),$q[2],$q[3],$q[4]);
 }elseif($q0=='SQLNULL'){return _¬SqlNull(_¬Coax($q[1]),_¬Coax($q[2]));
 }elseif($q0=='SQLCOND'){
 }elseif($q0=='SQLMAP'){
 }elseif($q0=='PARSE'){
 }elseif($q0=='SESION'){return $_m¬SS->GVar(trim(_¬Coax($q[1])),_¬Coax($q[2]));
 }elseif($q0=='ITEM'){
 }elseif($q0=='COUNT'){
 }elseif($q0=='RANDOM'){if($c>2){return mt_rand(_¬Val(_¬Coax($q[2])),_¬Val(_¬Coax($q[1])));}else{return mt_rand(0,_¬Val(_¬Coax($q[1])));}
 }elseif($q0=='REPLICATE'){
 }elseif($q0=='TOPVAR'){
 }elseif($q0=='COAX'){return _¬Coax(_¬Coax($q[1]));
 }elseif($q0=='CRLF'){
 }elseif($q0=='HEX'){
 }elseif($q0=='HEADER'){return _¬GetHeader(_¬Coax($q[1]));
 }elseif($q0==''){return ':';}else{return _¬SData(_¬Coax($q[0]));}
 _¬WError('_¬Data('.implode(':',$q).') -> Aun en Desarrollo');return $D;
}catch(Exception $ex){return '';}}
function _¬CoaxLgc($A,$FL=false){$C=false;try{if(!$FL){if(_¬IndexOf($A,"(")<0){return _¬CoaxLgcP($A);}/*Cplx*/$PR=explode("(",$A);$BLK='';$SEC=$PR[count($PR)-1];
  if(_¬ParseA($SEC,")",$BLK)){$PR[count($PR)-2]=$PR[count($PR)-2].trim(_¬CoaxLgcP(trim($BLK)).' '.trim($SEC));unset($PR[count($PR)-1]);return _¬CoaxLgc(implode("(",$PR),$FL);}_¬WError("Falta cierre del Condicional ')'", "IF ".$A);
 }else{/*Exs-Lgc*/$CINV=substr($A,0,1)=='!';
  if($CINV){$A=substr($A,1);}
  if(strtoupper($A)=='ISDROID'){if($CINV){return !_¬IsDroid();}else{return _¬IsDroid();}}
  if(substr($A,0,1)=='*'){$C=!_¬IsNE(_¬DGet(_¬Coax(substr($A,1))));}else{$C=_¬TGet(_¬Coax($A));}
  if($CINV){return !$C;}
 }}catch(Exception $ex){_¬WError("Coax.Logic: ".$ex->getMessage());}return $C;
}
function _¬CoaxLgcP($A){$L=false;$A=str_replace("  "," ",str_replace("   "," ",str_replace("="," = ",str_replace(">"," > ",str_replace("<"," < ",trim($A))))));$A=str_replace("= =","=",str_replace("> =",">=",str_replace("< =","<=",str_replace("< >","<>",$A))));
 if($A!=''){$CD=_¬Prop($A);$SC=array("","","","","");
  for($u=0;$u<count($CD);$u++){$CDu=strtoupper($CD[$u]);
   if($CDu=='AND'){_¬CoaxEasy($L,$SC);$SC[4]='AND';
   }elseif($CDu=='OR'){_¬CoaxEasy($L,$SC);$SC[4]='OR';
   }else{if($CD[$u]==''){$CD[$u]="[]";}
    if($SC[0]==''){
     if($CDu=='NOT'){$SC[3]="NOT";
	 }elseif($CDu=='PAR'){$SC[3]="PAR";
	 }elseif($CDu=='IMPAR'){$SC[3]="IMPAR";
	 }else{$SC[0]=$CD[$u];}
    }elseif($SC[1]==''){$SC[1]=$CD[$u];
	}else{$SC[2]=$CD[$u];}
   }
  }_¬CoaxEasy($L,$SC);
 }return $L;
}
function _¬CoaxEasy(&$L,&$SC){if(!_¬IsNE($SC[0])){try{$RS=false;$SC[0]=_¬Coax($SC[0]);$SC[1]=str_replace(' ','',_¬Coax($SC[1]));$SC[2]=_¬Coax($SC[2]);/*Procesa el Logical*/$SC1=strtoupper($SC[1]);
 if($SC1=="="){if(_¬IsNE($SC[0])){$SC[0]=C1;}if(_¬IsNE($SC[2])){$SC[2]=C1;}$RS=$SC[0]==$SC[2];
 }elseif($SC1=="<>"){if(_¬IsNE($SC[0])){$SC[0]=C1;}if(_¬IsNE($SC[2])){$SC[2]=C1;}$RS=$SC[0]!=$SC[2];
 }elseif($SC1==">"){$RS=_¬Val($SC[0])>_¬Val($SC[2]);
 }elseif($SC1=="<"){$RS=_¬Val($SC[0])<_¬Val($SC[2]);
 }elseif($SC1==">="){$RS=_¬Val($SC[0])>=_¬Val($SC[2]);
 }elseif($SC1=="<="){$RS=_¬Val($SC[0])<=_¬Val($SC[2]);
 }elseif($SC1=="IN"){$RS=_¬IndexOf($SC[2],$SC[0])>=0;
 }elseif($SC1=="XIN"){$RS=_¬IndexOf($SC[2],$SC[0],true)>=0;
 }elseif($SC1==""){$RS=_¬True($SC[0]);
 }else{_¬WError("Coax.Easy:<p>imposible resolver la Logica &lt;".$SC[0]."&gt; &lt;".$SC[1]."&gt; &lt;".$SC[2]."&gt;");$L=false;}/*Cmp Bool*/if($SC[3]=="NOT"){$RS=!$RS;
 }elseif($SC[3]=="PAR"&&_¬IsNE($SC[1])){$RS=_¬Val($SC[0])%2==0;
 }elseif($SC[3]=="IMPAR"&&_¬IsNE($SC[1])){$RS=_¬Val($SC[0])%2==1;
 }if($SC[4]=="AND"){$L=$L&$RS;
 }elseif($SC[4]=="OR"){$L=$L|$RS;
 }else{$L=$RS;}
}catch(Exception $ex){_¬WError("Coax.Easy: ".$ex->getMessage(),'IF "'.implode('" "',$SC).'"');}}/*Vacia Cache*/$SC[0]='';$SC[1]='';$SC[2]='';$SC[3]='';}
function _¬WError($T,$L=''){if(_¬IsNE($L)){$L=debug_backtrace();$L=array_shift($L);$L='PHP-EXE: '.str_ireplace(MainDir,'[root]\\',$L['file']).' (linea: '.$L['line'].')';}
 echo('<div style="background:#FF3300;color:#FFFFFF;"><hr><strong>Error:</strong> '.$T.(Developner?'<p>Linea de Ejecuci&oacute;n:<pre style="white-space:pre-wrap; word-wrap:break-word;">'.str_replace(vbCr,"<br>",str_replace(vbLf,"",str_replace("<","&lt;",str_replace(">","&gt;",$L)))).'</pre>':'').'<hr></div>');
 global $_m¬CCERR;$_m¬CCERR++;
}
function _¬WErrEx($T,$L=''){global $_u¬VErr;$T=str_ireplace(MainDir,'[root]\\',$T);if(_¬IsCT($_u¬VErr)){$_u¬Err=$_u¬Err.$T.vbCr;}else{if(_¬IsNE($L)){$L=debug_backtrace();$L=array_shift($L);$L='PHP-EXE: '.str_ireplace(MainDir,'[root]\\',$L['file']).' (linea: '.$L['line'].')';}_¬WError($T,$L);}return false;}
function _¬PresetFile($U,&$E=false){$U=str_replace("\\","/",_¬Coax($U));$E=false;
 if(strpos($SK,":/")===false){$B=_¬UrlRuta($U);$U=_¬Directorio($U);$E=is_file($U);return str_replace("\\","/",($B=='/'?'':$B)._¬UrlNombre($U));
 }else if(is_file($U)){$E=true;$B=str_replace("\\","/",_¬Directorio());
  if(_¬Right($B,1)!="/"){$B=$B."/";}
  if(_¬IndexOf($U,$B,true)==0){return str_replace("\\","/",substr($U,strlen($B)));}
 }
 return $U;
}
function _¬PrsMltFile($A){$L='';foreach($A as $U){$U=trim($U);if(!_¬IsNE($U)){$L=_¬PresetFile(_¬Coax($U),$E);if($E){return $L;}}}return $L;}
function _¬SfLn($L,$C=true){return str_replace('"',($C?'\\':'').'"',str_replace("'","\\'",str_replace(vbCr,"\\m",str_replace(vbCrLf,"\\n",str_replace("\\","\\\\",$L)))));}
function _¬USfLn($L,$C=true){return str_replace("\\\\", "\\",str_replace("\\n",vbCrLf,str_replace("\\m",vbCr,str_replace("\\'","'",str_replace(($C?'\\':'').'"','"',$L)))));}
function _¬ClearIns($I){$I=str_ireplace('.php','',$I);return strtoupper(str_replace(" ","_",str_replace(_¬GetExtension($I),'',_¬UrlNombre($I))));}
function _¬Event($V,$TS=false){if(_¬IsNE($V)){$L=debug_backtrace();$L=array_shift($L);$L='PHP-EXE: '.str_ireplace(MainDir,'[root]\\',$L['file']).' (linea: '.$L['line'].')';_¬WError('Evento: Debe Especificar un nombre de variable',$L);return false;}else{$V=_¬DinV($V);return eval('global $'.$V.';return isset($'.$V.')'.($TS?'&&!_¬IsNE($'.$V.')':'').';');}}
function _¬True($C){return !_¬IsNE($C)&&$C!==false&&$C!==0&&$C!=='0'&&strtoupper($C)!='FALSE';}
function _¬LoadAdapter($IS=false){if($IS){echo('</script>');}
 global $_m¬PHP_CMPL;if($_m¬PHP_CMPL){echo('<script type="text/javascript" src="RT-ADAPTER.js"></script>');}else{$_u¬LcPrt=$_COOKIE['_$_XALCDT_NT'];if(_¬IsNE($_u¬LcPrt)){$_u¬LcPrt='38980';}echo('<script type="text/javascript" src="http://localhost:'.$_u¬LcPrt.'/RT-ADAPTER.js"></script>');}
 if($IS){echo('<script type="text/javascript">');}
}
function _¬RedPath($U){$U=str_replace('\\\\','\\',str_replace('\\\\\\','\\',str_replace('/','\\',$U)));if(_¬IndexOf($U,'red:\\',true)==0){$U=substr($U,5);}if(_¬IndexOf($U,'\\',true)==0){$U=substr($U,1);}$P=explode('\\',$U);$D=explode(':',$P[0]);try{if(_¬IndexOf($D[0],'.')>=0){$D[0]=gethostbyname($D[0]);}}catch(Exception $ex){}$P[0]=implode(":",$D);return '\\\\'.implode('\\',$P);
}
function _¬Odbc(&$F,$DV,$T='odbc'){if(!is_file($F)){if(!_¬EndWith($F,'.php',true)){if(_¬EndWith($F,'.rt-'.$T,true)){$F=$F.'.php';}else{$F=$F.'.rt-'.$T.'.php';}}}if(is_file($F)){if(!_¬IsNE($DV)){_¬DSet($DV,false);}include($F);return true;}return false;}
function _¬GetInfo($T,&$Esp,$P3){if(false){/*Esta Version no Soporta PersonalInfo*/}else{$T=strtoupper(str_replace('-','',$T));global $_m¬SS;
 if($T=='URL'){$P=$_SERVER['PHP_SELF'];if(strtoupper(_¬Coax($P3))!='TRUE'){$P=_¬UrlRuta($P);}return (_¬IsHttps()?'https://':'http://')._¬getHost(11).$P;
 }elseif($T=='CLIENT'){return (!empty($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'])).":".$_SERVER['REMOTE_PORT'];
 }elseif($T=='CLIENTIP'){return (!empty($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']));
 }elseif($T=='CLIENTPORT'){return $_SERVER['REMOTE_PORT'];
 }elseif($T=='LOGINON'){return $_m¬SS->Login;
 }elseif($T=='LOGINUSER'){return $_m¬SS->LoginUser;
 }elseif($T=='HEADER'){$P=$Esp;$Esp='';if(!_¬IsNE(trim($P3))){$Esp=_¬Coax($P3);}return _¬GetHeader($P);
 }elseif($T=='ERRORSWRITED'){global $_m¬CCERR;return $_m¬CCERR;
 }else{_¬WErrEx('No se puede obtener la Información de: '.$T.' ; '.$P3);}}return "";
}
function _¬GetHeader($H){$H=strtoupper(str_replace('-','_',$H));
 if($H=='USEHTTPS'){return _¬IsHttps()?'True':'';}
 if($H=='ISDROID'){return _¬IsDroid()?'True':'False';}
 $V='';$C=$_SERVER;if(function_exists('apache_request_headers')){$C=apache_request_headers();}foreach($C as $HK=>$HV){if($HK=='HTTP_'.$H||$HK==$H||strtoupper(str_replace('-','_',$HK))==$H){$V=$HV;break;}}return $V;
}
function _¬MyUrl($P=''){if(_¬IsNE($P)){$P=_¬IsHttps()?'https':'http';}return $P.'://'._¬getHost(11)._¬getBaseRef();}
function _¬MyRefUrl($RL='',$P=''){$SC=_¬IsHttps();$HS=str_replace("//","/",str_replace(($SC?':443/':':80/'),'/',_¬getHost().'/')._¬getPath());if(strtoupper($RL)=='TRUE'){$RL=_¬getMod();}elseif(str_replace('\\','/',substr($RL,0,1))=='/'){$HS=explode('/',$HS);$HS=$HS[0];}if(_¬IsNE($P)){$P=_¬IsHttps()?'https':'http';}return $P.'://'.$HS.$RL;}
function _¬ReDir($R,$C=''){global $_m¬SS;$tGet=trim(_¬Coax($R));_¬ParseA($tGet,'?',$R);if(!_¬IsNE($C)){$RS='';do{_¬ParseA($R,$C,$RS);}while((_¬IsNE($RS)||$RS=='*')&&!_¬IsNE($R));$R=($RS=='*'?'':$RS);}
 $P=_¬Directorio($R);if(is_file($P)){$R=str_ireplace(_¬UrlNombre($R).$C1,_¬UrlNombre($P),$R.$C1);}
 if(_¬IndexOf($R,'://')>=6||_¬IndexOf($R,'://')<=0){$R=str_ireplace("\\","/",str_ireplace(_¬Directorio(),'',_¬Directorio($R)));
  if(substr($R,0,1)=='/'){$RX=explode('/',_¬getHost(1));$R=$RX[0].'/'.$R;}else{$R=_¬getHost(1).'/'.$R;}
  $R=(_¬IsHttps()?'https://':'http://').str_replace("//","/",$R);
 }ob_end_clean();$_m¬SS->EndRun('<script type="text/javascript">location.href="'.$R.(_¬IsNE($tGet)?'':'?'.$tGet).'";</script>');
}
$_MT¬MtFn=array("ABS(","ACOS(","ASEN(","ATAN(","CEILING(","COS(","EXP(","FLOOR(","LOG(","ROUND(","SEN(","SQRT(","TAN(","TRUNK(");
$_MT¬MtSu=array("MAX","MIN","LOG");
$_MT¬MtSy=array("%","^","/","*","-","+");
$_MT¬MtNu=array("9","8","7","6","5","4","3","2","1","0",".");
$_MT¬C2551="/ÿ/";$_MT¬C1255="/ÿ/";
function _¬IsEQ($E){$E=str_replace(")+",")",str_replace("+(","(",str_replace(" ","+",trim(strtoupper(_¬Coax($E))))));
 global $_MT¬MtFn;foreach($_MT¬MtFn as $V){$E=str_replace($V,'',$E);}
 global $_MT¬MtSu;foreach($_MT¬MtSu as $V){$E=str_replace("+".$V."+",'',$E);}
 global $_MT¬MtSy;foreach($_MT¬MtSy as $V){$E=str_replace($V,'',$E);}
 global $_MT¬MtNu;foreach($_MT¬MtNu as $V){$E=str_replace($V,'',$E);}
 return _¬IsNE(trim(str_replace(")","",str_replace("(","",$E))));
}
function _¬PrsEQ($E){$E=strtoupper(trim(_¬Coax(str_replace("+ [","+0[",str_replace("+[","+0[",$E)))));if(_¬IsNE($E)){return 0;}
 $E=str_replace("++","+",str_replace("+++","+",str_replace("++++","+",str_replace("+++++","+",str_replace(" ","+",$E)))));
 global $_MT¬MtSu;foreach($_MT¬MtSu as $V){$E=str_replace($V."+",$V." ",str_replace("+".$V," ".$V,$E));}
 global $_MT¬MtSy;foreach($_MT¬MtSy as $V){$E=str_replace($V."+",$V." ",str_replace("+".$V," ".$V,$E));}
 return $E;
}
function _¬RoundNum($n,$d=0,$P=true){$s=strval($n);
 if(_¬IndexOf($s,'.')>=0&&$d>=0){$prs=explode('.',$s);
  if($d==0){if(_¬Val(substr($prs[1],0,1))>=5&&$P){return _¬Val($prs[0]+1);}return $prs[0];
  }elseif($d<=0){return $s;
  }elseif(_¬Val(substr($prs[1],$d,1))>=5&&$P){$ZRB='';$BSN=_¬Val(substr($prs[1],0,$d))+1;
   if(strlen(strval($BSN))>$d){for($u=1;$u<=$d;$u++){$ZRB.='0';}
    $prs[0]=_¬Val($prs[0])+1;$prs[1]=$ZRB;
   }else{for($u=strlen(strval($BSN));$u<$d;$u++){$ZRB.='0';}
    $prs[1]=$ZRB+strval($BSN);
   }
  }else{$prs[1]=substr($prs[1],0,$d);}
  for($j=strlen($prs[1]);$j<$d;$j++){$prs[1].='0';}
  return implode('.',$prs);
 }elseif($d>0){$s.='.';for($j=1;$j<=$d;$j++){$s.='0';}}
 return $s;
}
function _¬SlvMath($E){$E=str_replace(")(",")*(",str_replace("EULER",2.7182818284590451,str_replace("PI",3.1415926535897931,str_replace(" ","",strtoupper($E)))));$EQP=explode("(",str_replace(" ","+",$E));if(count($EQP)<=1){return _¬SlvSec($E);}
 $R='';$UE=$EQP[count($EQP)-1];if(!_¬ParseA($UE,")",$R)){throw new Exception("Falta cierre del Condicional en la EQ: ".$E);}
 $UE=trim($UE)." ";$PE=' '.trim($EQP[count($EQP)-2]);$FU='';$FN=0;$PS=strlen($PE)-1;
 while($PS>=0){if(_¬IsDgt(substr($PE,$PS,1))){$FU='';break;}
  $FU=substr($PE,$PS,1).$FU;if($FU=='ABS'||$FU=='ACOS'||$FU=='ASEN'||$FU=='ATAN'||$FU=='CEILING'||$FU=='COS'||$FU=='EXP'||$FU=='FLOOR'||$FU=='LOG'||$FU=='ROUND'||$FU=='SEN'||$FU=='SQRT'||$FU=='TAN'||$FU=='TRUNK'){$EQP[count($EQP)-2]=substr($EQP[count($EQP)-2],0,strlen($PE)-strlen($FU)-1);break;}$PS--;
 }
 if($PS<=0){$FU='';}
 $EQP[count($EQP)-2]=$EQP[count($EQP)-2].(_¬IsDgt(substr($PE,strlen($PE)-1,1))?'*':'');
 $FN=_¬SlvSec($R);
 if($FU=='ABS'){$FN=abs($FN);}elseif($FU=='ACOS'){$FN=acos($FN);}elseif($FU=='ASEN'){$FN=asin($FN);}elseif($FU=='ATAN'){$FN=atan($FN);}elseif($FU=='CEILING'){$FN=ceil($FN);}elseif($FU=='COS'){$FN=cos($FN);}elseif($FU=='EXP'){$FN=exp($FN);}elseif($FU=='FLOOR'){$FN=floor($FN);}elseif($FU=='LOG'){$FN=log($FN);}elseif($FU=='ROUND'){$FN=round($FN);}elseif($FU=='SEN'){$FN=sin($FN);}elseif($FU=='SQRT'){$FN=sqrt($FN);}elseif($FU=='TAN'){$FN=tan($FN);}elseif($FU=='TRUNK'){$FN=$FN>=0?floor($FN):ceil($FN);}
 $EQP[count($EQP)-2]=$EQP[count($EQP)-2].$FN.(_¬IsDgt(substr($UE,0,1))?'*':'').$UE;unset($EQP[count($EQP)-1]);
 return _¬SlvMath(implode("(",$EQP));
}
function _¬SlvSec($E){$RS='0';$Nu1=0;$Nu2=0;$EQ1='';$EQ2='';$TS=false;
 if($E!=''){$E=str_replace("E",2.7182818284590451,$E);$RS=$E;
  while(_¬Stroyan($RS,"MAX",$Nu1,$Nu2,$EQ1,$EQ2,$TS)){$RS=$EQ1.max($Nu1,$Nu2).$EQ2;}
  while(_¬Stroyan($RS,"MIN",$Nu1,$Nu2,$EQ1,$EQ2,$TS)){$RS=$EQ1.min($Nu1,$Nu2).$EQ2;}
  while(_¬Stroyan($RS,"LOG",$Nu1,$Nu2,$EQ1,$EQ2,$TS)){$RS=$EQ1.log($Nu1,$Nu2).$EQ2;}
  while(_¬Stroyan($RS,"%",$Nu1,$Nu2,$EQ1,$EQ2,$TS)){$RS=$EQ1.($Nu1%$Nu2).$EQ2;}
  while(_¬Stroyan($RS,"^",$Nu1,$Nu2,$EQ1,$EQ2,$TS)){$RS=$EQ1.pow($Nu1,$Nu2).$EQ2;}
  while(_¬Stroyan($RS,"/",$Nu1,$Nu2,$EQ1,$EQ2,$TS)){$RS=$EQ1.($Nu1/$Nu2).$EQ2;}
  while(_¬Stroyan($RS,"*",$Nu1,$Nu2,$EQ1,$EQ2,$TS)){$RS=$EQ1.($Nu1*$Nu2).$EQ2;}
  while(_¬Stroyan($RS,"+",$Nu1,$Nu2,$EQ1,$EQ2,$TS)){$Nu1=$Nu1+$Nu2;$RS=$EQ1.($TS&&$Nu1>=0?'+':'').$Nu1.$EQ2;}
  while(_¬Stroyan($RS,"-",$Nu1,$Nu2,$EQ1,$EQ2,$TS)){$RS=$EQ1.($Nu1-$Nu2).$EQ2;}
 }/*Comprobar operatividad correcta*/
 global $_MT¬MtNu;foreach($_MT¬MtNu as $V){$E=str_replace($V,'',$E);}
 global $_MT¬MtSy;foreach($_MT¬MtSy as $V){$E=str_replace($V,'',$E);}
 if(!_¬IsNE(trim($E))){_¬WError("Operación no valida: ".$RS);$RS=0;}return _¬Val($RS);
}
function _¬Stroyan($E,$S,&$N1,&$N2,&$EQ1,&$EQ2,&$TS){$IX=_¬LastIndexOf($E,$S);$TS=false;
 if($IX<0){return false;}elseif($IX==0){if($S=='-'){return false;}$E='0'.$E;$IX++;}
 $NC1='';$NC2='';
 if(substr($E,$IX-strlen($S),strlen($S))==$S){$IX=$IX-strlen($S);}
 $EQ1=substr($E,0,$IX);$EQ2=substr($E,$IX+strlen($S));
 for($j=strlen($EQ1)-1;$j>=0;$j--){if(substr($EQ1,$j,1)=='-'){$TS=$j>0;$NC1='-'.$NC1;break;}if(!(_¬IsDgt(substr($EQ1,$j,1))||substr($EQ1,$j,1)=='.'||($j>0&&!_¬IsDgt(substr($EQ1,$j-1,1))&&substr($EQ1,$j,1)=='-'))){break;}$NC1=substr($EQ1,$j,1).$NC1;}
 $N1=_¬Val($NC1);$EQ1=substr($EQ1,0,strlen($EQ1)-strlen($NC1));
 for($j=0;$j<strlen($EQ2);$j++){if(!(_¬IsDgt(substr($EQ2,$j,1))||substr($EQ2,$j,1)=='.'||($j==0&&substr($EQ2,$j,1)=='-'))){break;}$NC2=$NC2.substr($EQ2,$j,1);}
 $N2=_¬Val($NC2);$EQ2=substr($EQ2,strlen($NC2));return true;
}
function _¬PreStrTip($OB,$TP,$r,$P){$PTC=$P[2];
 if($TP==0){return strval($OB);}
 if($TP==1){return _¬Escape(strval($OB));}
 if($TP==2){return _¬Unescape(strval($OB));}
 if($TP==3){return strval($r);}
 if($TP==5){return _¬Mayus(strval($OB),intval(_¬Val($PTC)));}
 if($TP==6){return _¬SqlDate(strval($OB),$PTC,'','');}
 if($TP==7){return _¬Decrip(strval($OB),intval(_¬Val($PTC)));}
 if($TP==8){return _¬Decrip(strval($OB),intval(_¬val($PTC)),1);}
 if($TP==9){return _¬Escape(_¬Decrip(strval($OB),intval(_¬Val($PTC))));}
 if($TP==10){return _¬Escape(_¬Decrip(strval($OB),intval(_¬val($PTC)),1));}
 if($TP==11){return _¬Encrip(strval($OB),intval(_¬Val($PTC)));}
 if($TP==12){return _¬Encrip(strval($OB),intval(_¬val($PTC)),1);}
 if($TP==13){return _¬Escape(_¬Encrip(strval($OB),intval(_¬Val($PTC))));}
 if($TP==14){return _¬Escape(_¬Encrip(strval($OB),intval(_¬val($PTC)),1));}
 if($TP==15){return _¬SfLn(strval($OB),strtoupper($PTC)!='FALSE');}
 if($TP==16){return _¬USfLn(strval($OB),strtoupper($PTC)!='FALSE');}
 if($TP==17){return str_replace($PTC,$P[3],strval($OB));}
 if($TP==18){return str_ireplace($PTC,$P[3],strval($OB));}
 if($TP==19){return _¬getDateX(strval($OB),$PTC,$P[3]);}
 if($TP==20){return strtolower(strval($OB))!='false'&&strval($OB)!='0'&&strlen(strval($OB))>0?'1':'0';}
 if($TP==21){if(_¬CoaxLgc('"'.strval($OB).'" '.$PTC,false)){return $P[3];}else{return $P[4];}}
 return strval($r+1);
}
function _¬Mayus($TX,$M){if(!isset($M)||$M<=0){return $TX;
 }elseif($M==1){return strtolower($TX);
 }elseif($M==2){return strtoupper($TX);
 }else{$T=explode(" ",$TX);$i=0;$TLN=count($T);
  while($i<$TLN){$TX=strtolower($T[$i]);$T[$i]=strtoupper(substr($TX,0,1)).substr($TX,1);$i++;}return implode(" ",$T);
}}
function _¬getDate($D,$TP=''){$DX=strtoupper($D);
 if(_¬IsNE($D)||$DX=='NULL'){if(strtoupper($TP)=='THROW'){throw new Exception('Fecha Invalida !!');}else{$DT=new DateTime("1900/01/01 00:00:00");}
 }elseif($DX=='NOW'||$DX=='AHORA'){$DT=new DateTime;
 }elseif($DX=='DATE'||$DX=='FECHA'){$DT=new DateTime;$DT=new DateTime($DT->format('d/m/Y').' 00:00:00');
 }elseif($WA1=(_¬IndexOf($D,"/")>=0)||_¬IndexOf($D,":")>=0||_¬IndexOf($D,"-")>=0){try{if($WA1){/*VBAux*/$DT=_¬getDateTime($D);}else{$DT=new DateTime($D);}}catch(Exception $ex){$DT=_¬getDateTime($D);}
 }else{$DT=_¬fromTcks(_¬Val($D,false));}
 if(strtoupper($TP)=='JS'){_¬WError('_¬getDate: conversor JS aun no terminado !!');/*Return New Date(DT.Ticks - New Date(1970, 0, 0).AddHours(-5).Ticks)*/}return $DT;
}
function _¬getDateX($D,$TP='',$PRM=''){try{$TPU=strtoupper($TP);$DT=_¬getDate($D,$TPU);if(_¬IsNE($TP)){return _¬frtDate($DT);}
 if($TPU=='WEEKDATA'){return _¬WeekData($DT);}
 if($TPU=='FORMAT'){return _¬StrDateFormat($DT,_¬Val($PRM));}
 if($TPU=='DIFDAYS'){return $DT->diff(_¬getDate(str_replace(';',':',trim($PRM)),$TP))->format('%a');}
 if($TPU=='EXCEL'){return 'ERROR: Comando pendiente de Programación';}
 if($TPU=='DAYSMONTH'){return 'ERROR: Comando pendiente de Programación';}
 if($TPU=='TO-UTC'){return 'ERROR: Comando pendiente de Programación';}
 if($TPU=='FROM-UTC'){return 'ERROR: Comando pendiente de Programación';}
 return _¬frtDate($DT,$TP);
}catch(Exception $ex){return 'ERROR: '.$ex->getMessage();}
}
function _¬WeekData($D){if(is_null($D)){$D=new DateTime();}
 _¬WError('_¬WeekData: Comando aun no terminado !!');
	/*    If IsNothing(D) Then D = Now
        Dim DYS As Integer = _cl(D.DayOfWeek), DTI As New Date(D.Year, D.Month, D.Day - DYS + 1)
        Dim y As Integer = DTI.Year, m As Integer = DTI.Month, dy As Integer = DTI.Day
        Dim DTR As New Date(y, 0, _cx(New Date(y, 0, 1).DayOfWeek)), DTF As New Date(y, m, dy + 6)
        Dim SEM As Integer = Math.Truncate((DTF.Ticks - DTR.Ticks) / 1000 / 60 / 60 / 24 / 7) + 1
        Return y.ToString + "|" + _FDY(SEM) + "|" + FormatDMY(DTI) + "|" + FormatDMY(DTF) + "|" + FormatDMY(D) + "|" + DYS.ToString
   */
}
function _¬StrDateFormat($D){/*rt.FUNCIONES.StrDateFormat*/
 _¬WError('_¬StrDateFormat: Comando aun no terminado !!');
}
function _¬getDateTime($D,$SCHM=''){if(_¬IsNE($SCHM)){$SCHM='dd/MM/yyyy HH:mm:ss.fff';$D=trim(str_replace(" m","m",str_replace(" p","p",str_replace(" a","a",str_replace("  "," ",str_replace("   "," ",strtolower($D)))))));
 $DT=explode(" ",(_¬IndexOf($D," ")<0&&_¬IndexOf($D,":")>0?"01/01/1900 ":"").$D.(_¬IndexOf($D," ")<0&&_¬IndexOf($D,":")<0?" 00:00:00.000":""));
 if(_¬EndWith($DT[1],"a.m.")||_¬EndWith($DT[1],"am")){$DT[1]=str_replace("a.m.","",str_replace("am","",$DT[1]));}elseif(_¬EndWith($DT[1],"p.m.")||_¬EndWith($DT[1],"pm")){$DT[1]=str_replace("p.m.","",str_replace("pm","",$DT[1]));$S=explode(":",$DT[1]);$S[0]=_¬Val($S[0])+12;if($S[0]==24){$S[0]=12;}$DT[1]=implode(":",$S);}
 $S=explode(":",$DT[1]);if(count($S)==2){$DT[1].=":00.000";}
 if(_¬IndexOf($DT[1],".")<0){$DT[1].=".000";}
 $S=explode(":",$DT[1]);
 if(count($S)>=3){if(strlen($S[0])==1){$S[0]='0'.$S[0];}
  if(strlen($S[1])==1){$S[1]='0'.$S[1];}
  $DT[1]=$S[0].":".$S[1];$S=explode(".",$S[2]);
  if(strlen($S[0])==1){$S[0]='0'.$S[0];}
  if(strlen($S[1])==1){$S[1].='00';}
  if(strlen($S[1])==2){$S[1].='0';}
  $DT[1].=":".$S[0].".".$S[1];
 }/*Fecha*/
 if(_¬IndexOf($DT[0],"/")>0){$S=explode("/",$DT[0]);if(count($S)==3){
  if(strlen($S[0])==4){/* yyyy/MM/dd */$T=$S[0];if(strlen($S[2])==1){$S[0]='0'.$S[2];}else{$S[0]=$S[2];}
   if(strlen($S[1])==1){$S[1]='0'.$S[1];}$S[2]=$T;
  }else{/* dd/MM/yyyy */if(strlen($S[0])==1){$S[0]='0'.$S[0];}if(strlen($S[1])==1){$S[1]='0'.$S[1];}}
  $DT[0]=implode("/",$S);
 }}elseif(_¬IndexOf($DT[0],"-")>0){$S=explode("-",$DT[0]);if(count($S)==3){
  if(strlen($S[0])==4){/* yyyy-MM-dd */$T=$S[0];if(strlen($S[2])==1){$S[0]='0'.$S[2];}else{$S[0]=$S[2];}
   if(strlen($S[1])==1){$S[1]='0'.$S[1];}$S[2]=$T;
  }else{/* dd-MM-yyyy [OJO] */if(strlen($S[0])==1){$S[0]='0'.$S[0];}if(strlen($S[1])==1){$S[1]='0'.$S[1];}}
  $DT[0]=implode("/",$S);
 }}$D=$DT[0].' '.$DT[1];}
 return date_create_from_format(str_replace(C1,'',_¬CFrtDate($SCHM)),$D);
}
function _¬CFrtDate($f){if(_¬IsNE($f)){return 'd/m/Y h:i:s a';}$P=array();$a='';$ac='';for($i=0;$i<strlen($f);$i++){$c=substr($f,$i,1);if($a!=$c){if($ac!=''){array_push($P,$ac);}$ac=$c;$a=$c;}else{$ac.=$c;}}if($ac!=''){array_push($P,$ac);}/*TransCode*/$f='';for($i=0;$i<count($P);$i++){$f=$P[$i];if($f=='dd'){$P[$i]='d';}elseif($f=='MM'){$P[$i]='m';}elseif($f=='yyyy'){$P[$i]='Y';}elseif($f=='HH'){$P[$i]='H';}elseif($f=='mm'){$P[$i]='i';}elseif($f=='ss'){$P[$i]='s';}elseif($f=='fff'){$P[$i]='u'.C1;}elseif($f=='D'){$P[$i]='l, d \d\e F \d\e Y';}}return implode('',$P);}
function _¬getTcks($D){_¬WError("Comando Incompleto: _¬getTcks");}
function _¬fromTcks($T){_¬WError("Comando Incompleto: _¬fromTcks");}
function _¬frtDate($D,$f=''){$f=$D->format(_¬CFrtDate($f));$f=explode(C1,$f);/*C1:PicoToMili*/for($i=1;$i<count($f);$i++){$f[$i-1]=substr($f[$i-1],0,max(0,strlen($f[$i-1])-3));}return _¬TEspDate(str_replace('am','a.m.',str_replace('pm','p.m.',str_replace('AM','A.M.',str_replace('PM','P.M.',implode('',$f))))));}
function _¬TEspDate($d){$d=str_ireplace('Monday','Lunes',str_ireplace('Tuesday','Martes',str_ireplace('Wednesday','Miercoles',str_ireplace('Thursday','Jueves',str_ireplace('Friday','Viernes',str_ireplace('Saturday','Sabado',str_ireplace('Sunday','Domingo',$d)))))));$d=str_ireplace('January','Enero',str_ireplace('February','Febrero',str_ireplace('March','Marzo',str_ireplace('April','Abril',str_ireplace('May','Mayo',str_ireplace('June','Junio',str_ireplace('July','Julio',str_ireplace('August','Agosto',str_ireplace('September','Setiembre',str_ireplace('October','Octubre',str_ireplace('November','Noviembre',str_ireplace('December','Diciembre',$d))))))))))));return $d;}
function _¬IsDTStrc($D,$MD=true){if(_¬IsNE($D)){return false;}
 if($MD&&_¬IndexOf($D,"#")>=0){return true;}
 $D=str_replace("M","",str_replace("PM","",str_replace("AM","",str_replace("M.","",str_replace("P.","",str_replace("A.","",str_replace(" ","",strtoupper($D))))))));
 if(!_¬IsNE($D)&&_¬IsDgt(substr($D,0,1))&&_¬IndexOf($D,'#')<0){$D=str_replace("9","",str_replace("8","",str_replace("7","",str_replace("6","",str_replace("5","",str_replace("4","",str_replace("3","",str_replace("2","",str_replace("1","",str_replace("0","",$D))))))))));
  if(_¬IsNE($D)){return false;}if(substr($D,0,2)=='//'||substr($D,0,2)=='--'||_¬EndWith($D,":")){return true;}
  if($MD||_¬IndexOf($D,"NOW")>=0||_¬IndexOf($D,"AHORA")>=0||_¬IndexOf($D,"DATE")>=0||_¬IndexOf($D,"FECHA")>=0){return true;}elseif($D=='NOW'||$D=='AHORA'||$D=='DATE'||$D=='FECHA'){return true;}
 }return false;
}
function _¬getDTTmExpTks($D){$D=strtoupper(trim(_¬Coax($D)));
 if(_¬IsDTStrc($D,false)){return _¬getTcks(_¬getDate($D));}else{$D=str_replace("SECOND","1",str_replace("MINUTE","60",str_replace("HOUR","3600",str_replace("DAY","86400",str_replace("WEEK","604800",$D)))));
  if(_¬IndexOf($D,"#")>=0){$P=$D;$S0='';$S1='';$D='';while(_¬ParseA($P,"#",$S0)){_¬ParseA($P,"#",$S1);$D=$D.$S0.(_¬getTcks(_¬getDate($S1))/10000000);}}
  return _¬SlvMath(_¬PrsEQ($D))*10000000;/*Unidad Minuma (Segundos)*/
 }
}
function _¬getPooler(&$SR,&$CC){$R='';$PLS=array();$S=0;$CC=0;try{
 while(_¬ParseA($SR,' || ',$R)){$S++;$R=trim(_¬Coax($R));if(!_¬IsNE($R)){$ST=explode("#",$R);$P=null;array_pad($ST,5,'');
  if($ST[0]=='G-RT'){try{
   if(strtoupper($ST[1])=='X-LIST-FILE'){_¬WErrEx("Listador de Archivos Dinamico de SCAN : FILELIST --> No Terminado !!");}
  }catch(Exception $ex){}}
  if($ST[0]=='X-RT'){$STX=strtoupper($ST[1]);$ST2=strtoupper(trim($ST[2]));$ST3=strtoupper(trim($ST[3]));
   if($STX=='X-RDB-TABLE'){$BF=_¬DGet('_BF¬'.$ST3);$P=new _¬Pooler($S,1,$BF->RWS->C);$P->VRT=$BF->CLS;
   }elseif($STX=='X-RDB-TABLE-COLUMS'){$BF=_¬DGet('_BF¬'.$ST3);$P=new _¬Pooler($S,1,$BF->CLS);$P->VRT=$BF->CLS;
   }elseif($STX=='X-RDB-TABLE-ROW'){$BF=_¬DGet('_BF¬'.$ST3);$P=new _¬Pooler($S,50,new _¬DoubleVal($ST[3],$BF->RWS->C[intval($ST[4])]));
   }elseif($STX=='X-LIST-DRIVE'){$CL=_¬DGet('_CL¬'.$ST2);if(isset($CL)){$P=new _¬Pooler($S,71,$CL);}
   }elseif($STX=='X-LIST-FILE'){$CL=_¬DGet('_CL¬'.$ST2);if(isset($CL)){$P=new _¬Pooler($S,70,$CL);}
   }elseif($STX=='X-LIST'){$CL=_¬DGet('_CL¬'.$ST2);if(isset($CL)){$P=new _¬Pooler($S,2,$CL);}
   }
  }/*Memo*/if(!is_null($P)){$P->VR=$ST;array_push($PLS,$P);$CC=max($CC,count($P->Collection));}else{_¬WErrEx("Schema de Colección de Datos no Valido: ".$R);}
 }}
}catch(Exception $ex){_¬WErrEx("DECODEC-POOLER: ".$e->getMessage()."<br>SCHEMA: ".$R);}return $PLS;}
class _¬Pooler{public $Collection=array();public $Pre='_';public $Type=0;public $VR=array();public $VRT=array();
 public function __construct($S,$TP,$CL){$this->Type=$TP;$this->Collection=$CL;if($S>1){$this->Pre=$S;}}
}
class _¬DoubleVal{
}
class _¬DASYNC extends Threaded{public $URL="";public $WaitSync=true;public $WaitSec=15;public $Persys=1;public $Data="";public $VarSend=array();public $RunFunction="";public $ResponceCodec="DEFAULT";public $Secure=0;
 public $X=0;
 public function run(){/*MD:Thread*/require_once(CoreDir.'HttpWeb.php');
  try{$this->X=_¬HttpWebSendA($this->URL,$this->WaitSec,$this->VarSend,$this->Secure,true);}catch(Exception $ex){}
  $this->ReadA();
 }
 public function IsThread(){return is_null($this->X)||$this->X===0||$this->X[1];}
 public function PrepA(){require_once(CoreDir.'HttpWeb.php');try{$this->X=_¬HttpWebSendA($this->URL,$this->WaitSec,$this->VarSend,$this->Secure,false);$this->X[3]=$this;}catch(Exception $ex){$this->Data="ERROR: ".$ex->getMessage();}}
 public function ReadA(){
  /*Async*/try{if(!$this->IsThread()&&_¬IsNE($this->X[1])){$this->X[1]=curl_multi_getcontent($this->X[0]);}}catch(Exception $ex){}
  /*Read*/try{$this->Data=_¬ResponseRead($this->X,$this->ResponceCodec,$this->Persys);
  }catch(Exception $ex){$this->Data="ERROR: ".$ex->getMessage();}
  $this->RespA();return $this->Data;
 }
 public function RespA(){global $_m¬SS;if(!_¬IsNE($this->RunFunction)&&isset($_m¬SS->FND[$this->RunFunction])){$_m¬SS->ExecFUN($this->RunFunction,array($this->Data));}
  $this->WaitSync=false;}
}
/* Suport For: HttpWeb.php */
define("HTTP_SEND_TYPE_GET",0);
define("HTTP_SEND_TYPE_COOKIE",10);
define("HTTP_SEND_TYPE_COOKIES",11);
define("HTTP_SEND_TYPE_HEADER",15);
define("HTTP_SEND_TYPE_POST",70);
define("HTTP_SEND_TYPE_POSTUL",71);
define("HTTP_SEND_TYPE_POSTMP",72);
define("HTTP_SEND_TYPE_FILE",90);
define("HTTP_SEND_TYPE_BYTE",91);
define("HTTP_SEND_TYPE_STREAM",92);
define("HTTP_SEND_TYPE_POSTRAW",500);
function _¬GetMimeType($F,$DM='application/download',$FM=false){if(_¬IsNE(trim($DM))){$DM='application/download';}
 if($FM){return $DM;}$M=$DM;try{$e=str_replace('.','',strtolower(_¬GetExtension($F)));
  $MT=array('txt'=>'text/plain','htm'=>'text/html','html'=>'text/html','rtp'=>'console/rt','rtpx'=>'console/rt','rtk'=>'console/rt','php'=>'text/html','css'=>'text/css','js'=>'application/javascript','json'=>'application/json','xml'=>'application/xml','swf'=>'application/x-shockwave-flash','flv'=>'video/x-flv',
   // images
   'png'=>'image/png','jpe'=>'image/jpeg','jpeg'=>'image/jpeg','jpg'=>'image/jpeg','gif'=>'image/gif','bmp'=>'image/bmp','ico'=>'image/vnd.microsoft.icon','tiff'=>'image/tiff','tif'=>'image/tiff','svg'=>'image/svg+xml','svgz'=>'image/svg+xml',
   // archives
   'zip'=>'application/zip','rar'=>'application/x-rar-compressed','exe'=>'application/x-msdownload','msi'=>'application/x-msdownload','cab'=>'application/vnd.ms-cab-compressed',
   // audio/video
   'mp3'=>'audio/mpeg','qt'=>'video/quicktime','mov'=>'video/quicktime',
   // adobe
   'pdf'=>'application/pdf','psd'=>'image/vnd.adobe.photoshop','ai'=>'application/postscript','eps'=>'application/postscript','ps'=>'application/postscript',
   // ms office
   'doc'=>'application/msword','rtf'=>'application/rtf','xls'=>'application/vnd.ms-excel','ppt'=>'application/vnd.ms-powerpoint','docx'=>'application/msword','xlsx'=>'application/vnd.ms-excel','pptx'=>'application/vnd.ms-powerpoint',
   // open office
   'odt'=>'application/vnd.oasis.opendocument.text','ods'=>'application/vnd.oasis.opendocument.spreadsheet'
   );
  if(isset($MT[$e])){$M=$MT[$e];}
 }catch(Exception $ex){}return $M;
}
/* API */require_once(CoreDir.'RT-SC.php');
/* SESION */require_once(CoreDir.'SESION.php');
if(empty($SESION_ID)){session_start();_¬WCookie('SESION_ID',session_id());}else{session_id(str_replace('%','-',_¬Escape($SESION_ID,true)));session_start();}$_m¬SS=new _¬NtvSesion($SESION_ID);
/*Load Suports*/$_m¬PLG=unserialize($_SESSION['_m¬PLG']);
if(is_null($_m¬PLG||!isset($_m¬PLG))){$_m¬PLG=array();}
if(is_array($_m¬PLG)||is_object($_m¬PLG)){foreach($_m¬PLG as $_u¬ID=>$_u¬URI){require_once($_u¬URI);}}
$_m¬SS->LoadSRL($_SESSION["_m¬SS"]);
?>