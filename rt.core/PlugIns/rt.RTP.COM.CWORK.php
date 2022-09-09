<?php
class rt_RTP_COM_CWORK{public $CLS='CWORK';public $DLL;public $PRM;public $ID='';public $PTH='';
 public $GROUP='';
 public function MakeWeb($SS,$ID,$P=array()){$this->ID=_¬Coax($P[2]);
  if(_¬IsNE($this->ID)){_¬WError("No se localiza la Instancia expuesta para crear el Objeto CWORK !!");
  }else{/*Carga Grupo de Acceso a Servers*/
   $this->GROUP=_¬Coax($P[5]);$P[4]=_¬Coax($P[4]);
   /*Carga Cliente Virtual*/
   /*Auto Escucha Mensaje a partir de creacion y aguanta hasta iniciacion en javascript*/
   $AuC=false;$MaxUsers=_¬Val(_¬Coax($P[3]));
   if($MaxUsers<2){$MaxUsers=99;}
   /* If Not String.IsNullOrEmpty(GROUP) Then AuC = CWorkGroup(GROUP, POP(4), MaxUsers).Join(SCLI) */
   /*Repara Group*/if(_¬IsNE($this->GROUP)){$this->GROUP=$this->CLS;}
   /*Agrego Metodos de la Clase*/
   /*Genera Contex Script*/
   echo('<script type="text/javascript" src="X-RT.SC.php?CLASS&'.$SS->ID.'&'.$ID.'"></script>');
   echo('<script type="text/javascript">var '.$this->ID."=new _x".$this->CLS.'("'.$this->ID.'","'.$P[4].'",'.$MaxUsers.',"'.$SCLI.ID.'","'.$this->GROUP.'",'.($AuC?'true':'false').');</script>');
  }
 }
 public function LoadSRL($R){}
}
?>