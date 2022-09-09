<?php /* Recode From rt-lib-Adapter */
if(function_exists('curl_init')){define("RT_WEB_LOADED",true);
 function _¬HttpSingleQuery($U,$CD='',$ODC=null,$A='',$S=0){if(_¬IsNE($A)){$A='Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko';}
  return _¬ResponseRead(_¬HttpWebSendB($U,25,$ODC,array(array(15,"Accept","text/html, application/xhtml+xml, */*"),array(15,"User-Agent",$A),array(15,"Accept-Language","es-PE")),$S),$CD,3);
 }
 function _¬HttpWebSendA($U,$TOS,$P=null,$S=0,$Auto=true){return _¬HttpWebSend($U,$P,'','','',$TOS,null,$S,$Auto);}
 function _¬HttpWebSendB($U,$TOS,$ODC,$P=null,$S=0,$Auto=true){return _¬HttpWebSend($U,$P,'','','',$TOS,$ODC,$S,$Auto);}
 function _¬HttpWebSend($U,$P,$US='',$PS='',$DM='',$TOS=30,$ODC=null,$S=0,$Auto=true){if(is_null($P)){$P=array();}
  $X=curl_init();
  if($S==48){/*SSLv3*/$S=3;}elseif($S==192){/*TLSv1.0*/$S=4;}elseif($S==768){/*TLSv1.1*/$S=5;}elseif($S==3072){/*TLSv1.2*/$S=6;}else{$S=0;}if($S>0){curl_setopt($X,CURLOPT_SSLVERSION,$S);}
  /*Gen lim*/if(is_null($TOS)||$TOS<1){$TOS=8;}$lm='-------------'.uniqid();
  /*Gen Cnt Post*/$tmpStm='';$DGET='';$DPOST='';$Cookies=array();$Head=array();$EcTp='application/x-www-form-urlencoded';$ENC2=false;$MTH='GET';
  /*Dtc Enc*/foreach($P as $PRM){if($PRM[0]>=90||$PRM[0]==72){$ENC2=true;$EcTp='multipart/form-data';break;}}
  /*Params*/foreach($P as $PRM){$T=$PRM[0];
  if($T==0){$DGET.=(_¬IsNE($DGET)?'':'&').$PRM[1].(_¬IsNE($PRM[2])?'':'='.$PRM[2]);
  }elseif($T==70||$T==71||$T==72){$MTH="POST";
   if($ENC2){$sb="--".$lm.vbCrLf.'Content-Disposition: form-data; name="'.$PRM[1].'"'.vbCrLf.vbCrLf.$PRM[2].vbCrLf;/*Write-Head*/$tmpStm.=$sb;
   }elseif($T==71){$DPOST.=(_¬IsNE($DPOST)?'':'&').$PRM[1].'='.$PRM[2];
   }else{$DPOST.=(_¬IsNE($DPOST)?'':'&').$PRM[1].'='._¬Escape($PRM[2]);}
  }elseif($T==10){$Cookies[$PRM[1]]=$PRM[2];
  }elseif($T==11){_¬WError('Modo de Agregar Multiples Cookies en Desarollo !!');
  }elseif($T==15){$Head[str_replace('-',' ',trim(strtolower($PRM[1])))]=$PRM[2];
  }elseif($T==500){$MTH="POST";$ENC2=false;$DPOST='';$EcTp="text/";$P1=str_replace(" ","",strtoupper($PRM[1]));
   if($P1=='X-CODE:JSON'){$EcTp='application/json';}else{$EcTp.=str_ireplace("X-CODE:","",$PRM[1]);}
   _¬WError('Codificación RAW aun en Desarrollo para: '.$EcTp);
  }else{$MTH="POST";$FN='MemorySpace';$DatStm=null;$TMime="application/octet-stream";
   if($T==90){$FN=_¬UrlNombre($PRM[2]);$DatStm=file_get_contents($PRM[2]);$TMime=_¬GetMimeType($PRM[2]);
   }elseif($T==92){_¬WError('Envio de Datos POST(STREAM) con fread aun en desarrollo');
   }elseif($T==91){$DatStm=$PRM[2];
   }else{$DatStm=null;}
   if(!is_null($DatStm)){/*Chunked*/$sb="--".$lm.vbCrLf.'Content-Disposition: form-data; name="'.$PRM[1].'"; filename="'.$FN.'"'.vbCrLf."Content-Type: ".$TMime.vbCrLf.vbCrLf;/*Write-Head*/$tmpStm.=$sb;/*Write-Data*/if(is_null($ODC)){/*BF:1572863(1.5 MB)*/$tmpStm.=$DatStm;}else{/*BF:1024*/$tmpStm.=$DatStm;$ODC->NotyDownload(strlen($DatStm),strlen($DatStm));}
    $tmpStm.=vbCrLf;
   }
  }}/*Write-Post*/if(!$ENC2){if(!_¬IsNE($DPOST)){$tmpStm.=$DPOST;}}else{$tmpStm.="--".$lm."--".vbCrLf;}
  if(!is_null($ODC)){$ODC->NotyDownload(100,100);}
  curl_setopt($X,CURLOPT_SSL_VERIFYHOST,0);
  curl_setopt($X,CURLOPT_SSL_VERIFYPEER,0);
  /*HttpWebRequest*/if(!_¬IsNE($DGET)){if(_¬IndexOf($U,"?")>0){$U.="&".$DGET;}else{$U.="?".$DGET;}}
  curl_setopt($X,CURLOPT_URL,str_replace(' ','%20',$U));
  if(!_¬IsNE($US)){curl_setopt($X,CURLOPT_HTTPAUTH,CURLAUTH_ANY);curl_setopt($X,CURLOPT_USERPWD,(_¬IsNE($DM)?'':$DM.'\\').$US.":".$PS);}
  /*AllowWriteStreamBuffering=True*/
  @curl_setopt($X,CURLOPT_FOLLOWLOCATION,true);
  curl_setopt($X,CURLOPT_MAXREDIRS,10);
  curl_setopt($X,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($X,CURLOPT_CUSTOMREQUEST,$MTH);
  curl_setopt($X,CURLOPT_TIMEOUT,$TOS);
  /*Post-Config*/if($MTH="POST"){
   curl_setopt($X,CURLOPT_POST,true);
   curl_setopt($X,CURLOPT_POSTFIELDS,$tmpStm);
   //$Head['authorization']='Bearer $TOKEN';
   $Head['content type']=$EcTp.($ENC2?"; boundary=".$lm:"");
   $Head['content length']=strlen($tmpStm);
  }
  $CK=$Head['cookie'];if(is_null($CK)){$CK='';}foreach($Cookies as $N=>$V){if(!_¬IsNE($N)){$CK.=$N.'='.$V.'; ';}}
  if(!_¬IsNE($CK)){$Head['cookie']=trim($CK);}
  /*Add-Heads*/$Head['charset']='ISO-8859-1';$H=array();foreach($Head as $N=>$V){if(!_¬IsNE($N)){array_push($H,str_replace(' ','-',_¬Mayus($N,3)).': '.$V);}}curl_setopt($X,CURLOPT_HTTPHEADER,$H);
  /*Data-Resquet*/$D='';try{if($MTH="POST"&&strlen($tmpStm)>0){if(!is_null($ODC)){$ODC->NotyUpload(strlen($tmpStm),strlen($tmpStm));}}
   if($Auto){$D=curl_exec($X);curl_close($X);}
  }catch(Exception $ex){if(!is_null($ODC)){$ODC->NotyUploadError($ex->getMessage());}}
  if(!is_null($ODC)){$ODC->NotyDownload(100,100);}
  return array($X,$D,$Auto,null);
 }
 function _¬ResponseRead($WR,$CD=null,$Int=5){if(_¬IsNE($CD)){$CD='DEFAULT';}else{$CD=strtoupper($CD);}
  //if($CD=='UTF8'){}if($CD=='UNICODE'){}if($CD=='BIGENDIAN'){}
  //Recodificador de texto: iconv(), utf8_encode()
  return $WR[1];
 }
}else{define("RT_WEB_LOADED",false);_¬WError('Se requiere que php.ini tenga habilitado la Extención (extension=php_curl.dll)');}
?>