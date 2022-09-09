<?php
class rt_RTP_COM_FORM{public $CLS='FORM';public $DLL;public $PRM;public $ID='';public $PTH='';
 public function MakeWeb($SS,$ID,$P=array()){global $_m¬MED;
  $this->ID=$ID;$_m¬MED[$ID]=$this;
  echo('<link href="X-RT.SC.php?CSS&'.$SS->ID.'&'.$ID.'" rel="stylesheet" type="text/css" />');
  echo('<script type="text/javascript" src="X-RT.SC.php?CLASS&'.$SS->ID.'&'.$ID.'"></script>');
 }
 public function xDATEPICKER($L){$P=_¬Prop($L);$Name=_¬Coax($P[1]);$VL=trim(_¬Coax($P[2]));$Sty=trim(_¬Coax($P[5]));$CLS=trim(_¬Coax($P[6]));$AddPos=trim(_¬Coax($P[7]));if(_¬IsNE($VL)){$VL='NOW';}try{$act=_¬getDate($VL);}catch(Exception $ex){$act=new DateTime;}try{$max=_¬getDate(trim(_¬Coax($P[3])),"THROW");}catch(Exception $ex){$max=new DateTime("99999/12/31 23:59:59");}try{$min=_¬getDate(trim(_¬Coax($P[4])),"THROW");}catch(Exception $ex){$min=new DateTime("0001/01/01 00:00:00");}
  echo('<div id="'.$Name.'">No Soportado</div>');
  echo('<script type="text/javascript">var '.$Name.'=new _xFRM_DatePicker("'.$Name.'","'.$act->format("d/m/Y").'",new Date('.$max->format('Y,n-1,j').'),new Date('.$min->format('Y,n-1,j').'),"'.$AddPos.'",1,"","'.$CLS.'","'.$Sty.'");</script>');
 }
 public function xSPINNER($L){$P=_¬Prop($L);$SID=trim(_¬Coax($P[1]));$SVL=trim(_¬Coax($P[2]));$SMX=trim(_¬Coax($P[3]));$SMN=trim(_¬Coax($P[4]));$SIC=trim(_¬Coax($P[5]));$SST=trim(_¬Coax($P[6]));$SCL=trim(_¬Coax($P[7]));$STH=trim(_¬Coax($P[8]));
  if(!_¬IsNE($SMX)&&preg_match('/[a-zA-Z]/',substr($SMX,0,1))){$STH=$SMX;$SMX='';}
  $HT=$this->MakeHTMLSpinner($SID,$SVL,$SCL,$SST);
  echo($HT.'<script type="text/javascript">var '.$SID.'=new _xFRM_Spinner("'.$SID.'","'.$SMX.'","'.$SMN.'","'.$SIC.'","'.$STH.'");</script>');
 }
 public function MakeHTMLSpinner($SID,$SVL,$SCL="",$SST="",$STB="",$SMB=""){
  return '<div id="_Co'.$SID.'" class="_FRM_Spinner '.(_¬IsNE($SCL)?'':' '.$SCL).'"'.(_¬IsNE($STB)?'':' style="'.$STB.'"').'><table width="20" height="20" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"'.(_¬IsNE($SST)?'':' style="'.$SST.'"').'><tr><td rowspan="2" style="padding-right:3px;"><input type="text" name="'.$SID.'" id="_Ap'.$SID.'" class="__x_NUM" value="'.$SVL.'" autocomplete="off"/></td><td width="3" align="right"><input type="button" id="_AU'.$SID.'" value=" " class="__x_BTUP"'.(_¬IsNE($SMB)?'':' style="'.$SMB.'"').'/></td></tr><tr><td width="3" align="right"><input type="button" id="_AD'.$SID.'" value=" " class="__x_BTDW"'.(_¬IsNE($SMB)?'':' style="'.$SMB.'"') .'/></td></tr></table></div>';
 }
 public function xWEEKPICKER($L){$P=_¬Prop($L);$Name=_¬Coax($P[1]);$VL=trim(_¬Coax($P[2]));$Sty=trim(_¬Coax($P[5]));$CLS=trim(_¬Coax($P[6]));$AddPos=trim(_¬Coax($P[7]));try{$max=_¬getDate(trim(_¬Coax($P[3])),"THROW");}catch(Exception $ex){$max=new DateTime("99999/12/31 23:59:59");}try{$min=_¬getDate(trim(_¬Coax($P[4])),"THROW");}catch(Exception $ex){$min=new DateTime("0001/01/01 00:00:00");}
  echo('<div id="'.$Name.'">No Soportado</div>');
  echo('<script type="text/javascript">var '.$Name.'=new _xFRM_DatePicker("'.$Name.'","'.$VL.'",new Date('.$max->format('Y,n-1,j').'),new Date('.$min->format('Y,n-1,j').'),"'.$AddPos.'",2,null,"'.$CLS.'","'.$Sty.'");</script>');
 }
 public function xTAB($L){$P=_¬Prop($L);$Name=_¬Coax($P[1]);$PST=_¬Coax($P[2]);$NRP=_¬Coax($P[3]);$IBR=_¬CoaxLgc(_¬Coax($P[4]));$UGR=_¬CoaxLgc(_¬Coax($P[5]));$WD=_¬Coax($P[6]);if(_¬IsNE($WD)){$WD='100%';}
  echo('<div id="_Co'.$Name.'" class="_FRM_Tab _FRM_TabS0"><table id="_Ct'.$Name.'" cellpadding="0" cellspacing="0" border="0" height="24"><tr></tr></table></div>');
  echo('<script type="text/javascript">var '.$Name.'=new _xFRM_Tab("'.$Name.'",unescape('._¬Escape($PST).'),"'.$NRP.'",'.($IBR?'1':'0').','.($UGR?'1':'0').',"'.$WD.'");</script>');
 }
 public function aIMAGE($L){$URI=CoreDir.'PlugIns/rt.RTP.COM.FORM/SRC/'.$L;if(is_file($URI)){header('Content-Type: image/png');readfile($URI);}else{_¬WError('No se Localiza el Recurso: '.$L);}}
 public function LoadSRL($R){}
}
?>