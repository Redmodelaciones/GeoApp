<?php /*Soporte Sesion*/
class _¬NtvSesion{public $ID,$Login=false,$LoginUser='',$Lpage='',$PLG=array(),$FND=array();
 /*OPE*/public $Lodbc,$LodbcK,$Ltable,$Lusu,$LusuK,$Lpas,$LpasK,$Ldb,$LiPK,$LiCL,$Lact,$LaCN,$LaTP,$LaPR=array();
 public function __construct($ID){$this->ID=$ID;}
 public function Load($Lodbc,$LodbcK,$Ltable,$Lusu,$LusuK,$Lpas,$LpasK,$LdbInMain,$LiPK,$LiCL,$Lact,$LaCN,$LaTP,$LaPR){global $__¬SESIr;global $_m¬DB;$Ins=str_replace('\\','/',$__¬SESIr);$PTH=strpos($Ins,'/')===false?'':_¬UrlRuta($Ins);
  $Lodbc=(strpos($Lodbc,'/')===false?$PTH:'').$Lodbc;
  $this->Lodbc=$Lodbc;$this->LodbcK=$LodbcK;$this->Ltable=$Ltable;$this->Lusu=$Lusu;$this->LusuK=$LusuK;$this->Lpas=$Lpas;$this->LpasK=$LpasK;
  /*DB-OPEN*/$_a¬DB=$_m¬DB;$_x¬DBt='';$_m¬DBdfc='';$__¬DB=_¬Directorio($Lodbc);$Ldb=strtoupper(_¬ClearIns($__¬DB));$_m¬DB=_¬DGet('_i¬DB_'.$Ldb,false);
  if(is_null($_m¬DB)){if(_¬Odbc($__¬DB,'_x¬DB')){$_m¬DB->Name=$Ldb;_¬DSet('_i¬DB_'.$Ldb,$_m¬DB,false);}else{_¬WErrEx('No Existe el Origen de Datos: '.str_ireplace('.rt-odbc.php','',$__¬DB));}}
  if(!$LdbInMain){$_m¬DB=$_a¬DB;}
  /*DB-SET*/$this->Ldb=$Ldb;
  $this->LiPK=$LiPK;$this->LiCL=$LiCL;$this->Lact=$Lact;$this->LaCN=$LaCN;$this->LaTP=$LaTP;
  /*Act*/$LaPR=array_pad($LaPR,2,'');
  if($Lact&&count($LaPR)>2&&$LaTP==0){$OMail=_¬Unescape($LaPR[0]);if(strpos($OMail,'\\')===false){$OMail=$PTH.$OMail;}if(!_¬IsNE($OMail)&&!_¬Odbc($OMail,'_x¬ML','mail')){_¬WErrEx('No Existe el Origen Mail: '.str_ireplace('.rt-mail.php','',$OMail));}}
  $this->LaPR=$LaPR;
 }
 public function GVar($n,$d=''){$v=$_SESSION['_x'.strtoupper(trim($n))];if(_¬IsNE($v)){$v=$d;}return $v;}
 public function SVar($n,$v){$_SESSION['_x'.strtoupper(trim($n))]=$v;}
 public function GetPKEY($RWE,&$PKY){if(strlen($RWE)>0){$PKY=ord(substr($RWE,0,1))+ord(strlen($RWE)-1);}return $RWE;}
 public function EKY($TX,$KY,$R3){if($KY==0){return $TX;}return _¬Encrip($TX,$KY+3,0,$R3);}
 public function DKY($TX,$KY){if($KY==0){return $TX;}return _¬Decrip($TX,$KY+3,0);}
 public function JSFUN($PT,$N){$FX=$this->FND[$PT];if(isset($FX)){
  $PR='';$SL='"';$CPr=count($FX->Param);if($CPr>0){$SL=$SL."'+escape(";for($j=0;$j<$CPr;$j++){$PR=$PR.($j==0?'':',').'P'.$j;$SL=$SL.($j==0?'':").replace(/\+/g,'%2B').replace(/\\%/g,'%25')+'\" \"'+escape(").'P'.$j."==null?'':P".$j;}$SL=$SL.").replace(/\+/g,'%2B').replace(/\\%/g,'%25')+'";}
  $SL=$SL.'" ""';
  echo(($_m¬JSIN?'':'<script type="text/javascript">')."if(!window.".$N."){var ".$N."=function(fn".(_¬IsNE($PR)?'':','.$PR)."){c='X-RT.SC.php?_u-SID=".$this->ID."&_u-F=".$N."&_u-DT='+new Date().getTime();getXML(c,function(d){d=d.split('<X-RT:VIRTUAL:HTML/>');if(d.length==1){d[1]=d[0];d[0]='';}if(d[0].toLowerCase()=='false'){d[0]=false;}if(fn){fn(d[0],d[1]);}},function(v,e){if(fn){fn(false,'');}},window,null,'_POP_=".$SL."');}}".($_m¬JSIN?'':'</script>'));
 }else{$L=debug_backtrace();$L=array_shift($L);$L='PHP-EXE: '.str_ireplace(MainDir,'[root]\\',$L['file']).' (linea: '.$L['line'].')';_¬WError('Funcion '.$N.', no declarada en Memoria !!',$L);}}
 public function LoadFUN($PT,$A){$FX=$this->FND[strtoupper($PT)];if(isset($FX)){_¬DSet('_uX¬Res',$FX->Res,false);$IX=0;foreach($A as $P){_¬DSet($FX->Param[$IX],_¬Unescape($P));$IX++;}for($IX=$IX;$IX<count($FX->Param);$IX++){_¬DSet($FX->Param[$IX],'');}}return $FX;}
 public function ExecFUN($PT,$A){echo('Exec: '.$PT);print_r(get_defined_vars());$FX=$this->LoadFUN($PT,$A);/*Falta Terminar*/}
 public function LoadSRL($R){/*SRL*/if(_¬IsNE($R)){return false;}$R=unserialize($R);$this->Login=$R->Login;$this->LoginUser=$R->LoginUser;$this->Lpage=$R->Lpage;/*Plugin-SRL*/if(isset($R->PLG)){$this->PLG=$R->PLG;/*foreach($R->PLG as $ID=>$PLG){if(!_¬IsNE($PLG->DLL)){_¬AddPlugIn($PLG->DLL,$ID,$PLG->PRM,$PLG);}}*/}/*Function-SRL*/if(isset($R->FND)&&count($R->FND)>0){$this->FND=$R->FND;}}
 public function ExecAsync($TOS=0,$WThread=true){global $_m¬RASync;$R=array();$T=array();$IsTH=IsThread;$cc=0;if(is_null($TOS)){$TOS=0;}
  foreach($_m¬RASync as $ASK){$cc++;if(!$ASK->IsThread()){$IsTH=false;array_push($T,$ASK);}}/*Pre*/if($TOS<=0){$TOS=30;}$TOut=date_add(new DateTime(),new DateInterval('PT'.$TOS.'S'));/*Test*/if($IsTH){/*W-Thread*/if($WThread&&$cc>0){
  do{try{$cc=count($_m¬RASync);
   foreach($_m¬RASync as $ASY){if(!$ASY->WaitSync){$cc--;}}}catch(Exception $ex){$cc=1;}
   if($cc>0){usleep(100000);}
  }while($TOut>=new DateTime()&&$cc>0);
  foreach($_m¬RASync as $ASK){array_push($R,$ASK->Data);}
 }}elseif(count($T)>0){/*W-Curl*/if($cc!=count($T)){_¬WError('El Ejecutor no Acepta Async hibrido !');return array_pad($R,$cc,'');}$mh=curl_multi_init();foreach($T as $ASK){curl_multi_add_handle($mh,$ASK->X[0]);}/*C-Exe*/
  do{do{curl_multi_exec($mh,$on);curl_multi_select($mh);}while($TOut>=new DateTime()&&$on>0);/*   -Falta-**********-   :test Resp-N°Intentos*//*curl_getinfo($curl,CURLINFO_HTTP_CODE)*/break;}while($TOut>=new DateTime());
  /*C-End*/foreach($T as $ASK){curl_multi_remove_handle($mh,$ASK->X[0]);array_push($R,$ASK->ReadA());curl_close($ASK->X[0]);}curl_multi_close($mh);}/*W-End*/$_m¬RASync=array();return $R;}
 public function EndRun($RC=''){global $_m¬PLG;$_SESSION['_m¬SS']=serialize($this);$_SESSION['_m¬PLG']=serialize($_m¬PLG);if(!_¬IsNE($RC)){echo($RC);}ob_end_flush();/*Asynck*/$this->ExecAsync(3,false);/*EndPage*/die();}
}
class _¬NtvFunction{public $Name='';public $Res='';public $CD='';public $Param=array();
 public function __construct($Name,$Res,$Param,$CD){$this->Name=$Name;if(_¬IsNE($Res)){$Res='RETURN';}$this->Res=$Res;$this->Param=$Param;$this->CD=$CD;}
}
function _¬AddPlugIn($DllFile,$ID,$PRM=array(),$SRL=null){global $_m¬SS;global $_m¬PLG;$COM=null;$IDX=strtoupper($ID);
 if(is_null($SRL)){$COM=$_m¬SS->PLG[$IDX];}
 if(is_null($COM)||_¬IsNE($COM->CLS)||_¬IsNE($COM->PTH)){
  try{$BCL=strtoupper(str_replace('.','_',$DllFile));
   $MU=0;$PTH=_¬InstallMod("rt.RTP.COM.".$DllFile.".php");
   if(!is_file($PTH)){$MU=1;$PTH=_¬Directorio("APLET\\".$DllFile.".php");}
   if(is_file($PTH)){require_once($PTH);$_m¬PLG[$IDX]=$PTH;
    if($MU&&class_exists("rt_RTP_USER_".$BCL)){$COM=eval("return new rt_RTP_USER_".$BCL.';');}else{$COM=eval("return new rt_RTP_COM_".$BCL.';');}
	if(!is_null($COM)){$COM->PTH=$PTH;}else{_¬WError("No se pude generar un OLE de Control para el Objeto(".$ID.")");}
   }else{_¬WError("Libreria de Objeto no Localizada '".$DllFile."', copia el ensamblado en: ".$PTH);}
  }catch(Exception $ex){_¬WError('Incompatibilidad de Interfaz: '.$ex->getMessage());}
  if(!isset($COM)){return false;}
 }elseif(_¬IndexOf($COM->CLS,$DllFile)<0||_¬IsNE($DllFile)){
  _¬WError('El Nombre del Objeto('.$ID.':'.$COM->CLS."), ya esta siendo usado por otra Instancia de Objeto !!<br>Clase no Heredada: '".$DllFile."'");return false;}
 try{$COM->DLL=$DllFile;$COM->PRM=$PRM;if(is_null($SRL)){$COM->MakeWeb($_m¬SS,$ID,$PRM);}else{$COM->LoadSRL($SRL);}$_m¬SS->PLG[$IDX]=$COM;return true;}catch(Exception $ex){_¬WError('Error en la Inicializacion del Plug-Ins: '.$ex->getMessage());}
}
?>