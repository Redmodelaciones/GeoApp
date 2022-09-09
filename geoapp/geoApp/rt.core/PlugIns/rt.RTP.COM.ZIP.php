<?php
class rt_RTP_COM_ZIP{public $CLS='ZIP',$DLL,$PRM,$ID='',$PTH='';
 public $FILE;
 public function MakeWeb($SS,$ID,$P=array()){global $_m¬MED;
  $this->ID=$ID;$_m¬MED[$ID]=$this;
  if(_¬IsNE(trim($P[3]))){$this->FILE=tempnam(sys_get_temp_dir(), 'RT-Zip').'.zip';file_put_contents($this->FILE,'');
  }else{$this->FILE=_¬Directorio(trim(_¬Coax($P[3])));
   if(!is_file($this->FILE)){$this->FILE=tempnam(sys_get_temp_dir(), 'RT-Zip').'.zip';file_put_contents($this->FILE,'');}
  }
 }
 public function IniZip(){$ZLB=new ZipArchive();$ZLB->open($this->FILE,ZipArchive::CREATE);return $ZLB;}
 public function xADDFILE($L){$P=_¬Prop($L);$ZLB=$this->IniZip();
  for($j=1;$j<count($P);$j++){$FIL=_¬Coax($P[$j]);if(!_¬IsNE($FIL)){$FIL=_¬Directorio($FIL);if(is_file($FIL)){$ZLB->addFile($FIL,_¬UrlNombre($FIL));}else{_¬WError("No se puede Agregar al Comprimido, el archivo: ".$FIL);}}}
  $ZLB->close();
 }
 public function xADDCONTENTFOLDER($L){$P=_¬Prop($L);$ZLB=$this->IniZip();
  for($j=1;$j<count($P);$j++){$FOL=_¬Coax($P[$j]);if(!_¬IsNE($FOL)){$FOL=_¬Directorio($FOL);if(is_dir($FOL)){
   foreach(_¬lsFiles($FOL,1,true) as $FO){$FO=str_ireplace($FOL,'',$FO);$ZLB->addEmptyDir($FO);}
   foreach(_¬lsFiles($FOL,0,true) as $FI){$FI2=str_ireplace($FOL,'',$FI);$ZLB->addFile($FI,$FI2);}
  }else{_¬WError("No se puede Agregar al Comprimido, la carpeta: ".$FOL);}}}
  $ZLB->close();
 }
 public function xFILE($L){$P=_¬Prop($L);$VR=trim(_¬Coax($P[1]));if(!_¬IsNE($VR)){_¬DSet($VR,$this->FILE);}
 }
 public function xEXTRACTINFOLDER($L){$P=_¬Prop($L);$FOL=_¬Directorio(_¬Coax($P[1]));$ZLB=$this->IniZip();if(!$ZLB->extractTo($FOL)){_¬WError("No se Puede Descomprimir en '".$FOL."'<br>Msg: ".$ZLB->getStatusString());}$ZLB->close();
 }
 public function xSAVE($L){$P=_¬Prop($L);
  try{if(is_file($this->FILE)){$NWFI=_¬Directorio(_¬Coax($P[1]));if(strtoupper($this->FILE)!=strtoupper($NWFI)){if(is_file($NWFI)){unlink($NWFI);}if(!copy($this->FILE,$NWFI)){throw new Exception('No se Puede Copiar el Archivo a la RUTA: '.$NWFI);}$this->DeleTemp();$this->FILE=$NWFI;}}}catch(Exception $ex){_¬WError('Error al Guardar: '.$ex->getMessage());}
 }
 public function xCLOSE($L){$P=_¬Prop($L);$this->DeleTemp();}
 public function DeleTemp(){if(_¬IndexOf($this->FILE,sys_get_temp_dir(),true)==0){unlink($this->FILE);}}
 public function LoadSRL($R){}
}
?>