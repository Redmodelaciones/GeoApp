<?php /* DB-iAdministrator v. 1.0 */
class _¬DataTable{public $Name='RDBTable';
 public $RWS;public $CLS=array();public $CLT=array();
 public function __construct($R=null){$this->RWS=new _¬DataRowCollection($this);}
 public function Rows($r=null){if(is_null($r)){return $this->RWS;}else{return $this->RWS->C[$r];}}
 public function Columns($i=null){if(is_null($i)){return $this->CLS;}else{if(is_string($i)){$C=$this->CLS[$i];if(isset($C)&&!is_null($C)){return $C||true;}else{$F1=strtoupper($i);$i=0;foreach($this->CLS as $F2){if(strtoupper($F2)==$F1){break;}$i++;}}}return $this->CLS[$i]||null;}}
 public function Cells($r,$c=null){try{return $this->RWS->C[$r]->Cells($c);}catch(Exception $e){}return null;}
 public function ARw($A){$this->RWS->ARw($A);}
 public function SetCell($r,$c,$v){/*Actualizo el Valor de una celda falta terminar */_¬WError('DataTable: Soporte SetCell aun no Mapeado !');}
 public function RemColumn($i){$i=$this->Columns($i);/*Elimino Columna falta terminar */_¬WError('DataTable: Soporte RemColumn aun no Mapeado !');}
 public function RemRow($i){/*Elimino Fila falta terminar */_¬WError('DataTable: Soporte RemRow aun no Mapeado !');}
 public function AddColumn($N,$T=null){/*Agrega Columna falta terminar*/_¬WError('DataTable: Soporte AddColumn aun no Mapeado !');}
 public function ColumnType($N){/*Obtine el tipo de una columna falta terminar*/_¬WError('DataTable: Soporte ColumnType aun no Mapeado !');}
 /*REFERNCE-S: https://www.csharp-examples.net/dataview-rowfilter/ 
 */
 public function Select($F){$RWS=array();if(_¬SchFltCols($this,$F,$C)){/*Filter*/$F=str_replace("'",'"',str_replace('%34','[#34:]',$F));foreach($this->RWS->C as $RW){if($RW->Test($F,$C)){array_push($RWS,$RW);}}}else{_¬WError('DataTable: Soporte Parcial Select('.$F.') aun no Mapeado !');}return $RWS;}
 public function getView($F='',$S=''){$T=$this->XClone(_¬IsNE($F));/*fill*/if(!_¬IsNE($F)){foreach($this->Select($F) as $RW){$A=new ArrayObject($RW->C);$T->RWS->ARw($A->getArrayCopy());}}
  if(_¬IsNE($S)){return $T;}else{return $this->getSort($S,$T);}
 }
 public function getSort($S,$T=null){if(is_null($T)){$T=$this->XClone();}/*Sort*/_¬WError('DataTable: Soporte Sort aun no Mapeado !');/*ok*/return $T;}
 public function XClone($IncRws=true){$T=new _¬DataTable();$A=new ArrayObject($this->CLS);$T->CLS=$A->getArrayCopy();$A=new ArrayObject($this->CLT);$T->CLT=$A->getArrayCopy();if($IncRws){$T->RWS=$this->RWS->XClone($T);}return $T;}
}
function _¬SchFltCols($T,&$F,&$C){$R='';$F=explode("'",trim($F));for($i=1;$i<count($F);$i++){if($i%2==1){$F[$i]=_¬Escape($F[$i],true);}elseif(_¬IsNE($F[$i])){$F[$i]=C1.C2.'%27'.C2.C1;}}$F=str_replace('  ',' ',str_replace('   ',' ',str_replace('    ',' ',str_replace('     ',' ',str_replace("'".C1.C2.'%27'.C2.C1."'",'%27',implode("'",$F))))));
 $F=explode("#",$F);for($i=1;$i<count($F);$i=$i+2){$F[$i]=_¬getTcks(_¬getDate($F[$i]));}$F=implode('',$F);
 $F=str_replace(' ,',',',str_replace(', ',',',str_replace(' )',')',str_replace('( ','(',str_replace('< =','<=',str_replace('> =','>=',str_replace('< >','<>',str_replace('  ',' ',str_replace('>',' > ',str_replace('<',' < ',str_replace('=',' = ',$F)))))))))));
 $F=str_ireplace(' IS NOT NULL',' <> NULL',str_ireplace(' IS NULL',' = NULL',$F));
 /*MultiPart-Problem-Suport*/
 if(_¬IndexOf($F,'(')>=0){_¬WError('DataTable('.$F.'): el Analizador de filtros no soporta Multiparte aun !!');return false;}
 $S=explode(' ',$F);$C=array();$CL='';
 for($i=0;$i<count($S);$i++){$SC=substr($S[$i],0,1);$N=strtoupper($S[$i]);if($SC!="'"&&$SC!='<'&&$SC!='='&&$N!='NOT'&&$N!='AND'&&$N!='OR'&&$N!='LIKE'&&$N!='IN'&&!is_numeric($N)&&_¬IndexOf($N,',')<0){if(_¬IndexOf($N,'{')>0){/*Function*/_¬WError('DataTable('.$N.'): el Analizador de filtros no reconoce la funcion !!');return false;}elseif(!is_null($T->Columns($N))){/*Col*/$CN=C1.$N.C2;if(_¬IndexOf($CL,$CN)<0){array_push($C,$N);$CL.=$CN;}$S[$i]=$CN;}else{_¬WError('DataTable('.$N.'): el Analizador de filtros no reconoce la columna !!');return false;}}}
 $F=implode(' ',$S);return true;
}
class _¬DataRowCollection{public $C=array();public $T;
 public function __construct($T){$this->T=$T;}
 public function Count(){return count($this->C);}
 public function Item($i){return null;}
 public function Add($A){/*$A-tiene que agregarse cabecera de columnas*/array_push($C,new _¬DataRow($A,$this->T));}
 public function ARw($A){array_push($this->C,new _¬DataRow($A,$this->T));}
 public function XClone($T=null){if(is_null($T)){$T=$this->T;}$XC=new _¬DataRowCollection($T);foreach($this->C as $K=>$V){$XC->C[$K]=$V->XClone($T);}return $XC;}
}
class _¬DataRow{public $C;public $T;
 public function __construct($C,$T){$this->T=$T;if(is_null($C)){$C=array();}$this->C=$C;}
 public function Cells($i){if(is_string($i)){$R=$this->C[$i];if(isset($R)){return $R;}else{$F1=strtoupper($i);$i=0;foreach($this->T->CLS as $F2){if(strtoupper($F2)==$F1){break;}$i++;}}}if(isset($this->T)){return $this->C[$this->T->CLS[$i]];}return null;}
 public function Test($F,$C){foreach($C as $N){/*All cells is String-Falta Corregir esto*/$F=str_ireplace(C1.$N.C2,'"'._¬Escape($this->Cells($N),true).'"',$F);}return _¬CoaxLgc($F);}
 public function XClone($T=null){if(is_null($T)){$T=$this->T;}$A=new ArrayObject($this->C);return new _¬DataRow($A->getArrayCopy(),$T);}
}
function _¬RDBFetch($BF,$PS=0,$PR='_'){try{if(is_string($BF)){$BF=_¬DGet('_BF¬'.$BF);}$RWC=$BF->RWS->Count();if($PS<$RWC){
  if($PS>=0){$RW=$BF->Rows($PS);try{foreach($BF->CLS as $COL){if(!isset($RW)||is_null($RW)){_¬DSet($PR.$COL,'');}else{_¬DSet($PR.$COL,$RW->Cells($COL));}}}catch(Exception $ex){}}
 }elseif($RWC==0){try{foreach($BF->CLS as $COL){_¬DSet($PR.$COL,'');}}catch(Exception $ex){}
 }}catch(Exception $ex){}
}
function _¬FltTab($TB,&$FRS,&$RF,&$GRP){$FRS=' '.$FRS;
 _¬ParseA($FRS,' ORDER BY ',$GRP);_¬ParseA($GRP,' GROUP BY ',$RF);
 $RF=trim($RF);$FRS=trim($FRS);
 if(!_¬IsNE(trim($GRP))){$TB=_¬FltTabGrp($TB,trim($GRP),$RF);}
 if(!_¬IsNE($RF)||!_¬IsNE($FRS)){return $TB->getView($RF,$FRS);}return $TB;
}
function _¬FltTabGrp($TB,$GrpTag,&$COND){$CLS='';$RWO='';$DLIGCL=array();$DLIGCLRU='';$DLBSCL='';$IX=0;
 if(!_¬IsNE($COND)){$COND=str_replace(" ,",",",str_replace(", ",",",str_replace("  "," ",str_replace("   "," ",$COND))));}
 _¬ParseA($GrpTag," FOR EXPAND ",$GrpFil);/*Filtro agrupados*/$DPT=$TB->getSort($GrpFil);
 /*Expand Columns*/foreach(explode(',',$GrpTag) as $XFIL){$XFIL=trim($XFIL);if(!_¬IsNE($XFIL)){_¬ParseA($XFIL,":",$CLS);
  $XFIL=trim($XFIL);$CLS=trim($CLS);
  if(isset($CLS)&&isset($XFIL)&&isset($DLIGCL[$CLS.':'.$XFIL])){/*Valid transfor column*/$IX=-1;do{$IX++;$DLBSCL=strtoupper($CLS).($IX<=0?'':$IX);}while(_¬IndexOf($DLIGCLRU,"|".$DLBSCL.":")>=0);
   $DLIGCLRU=$DLIGCLRU."|".$DLBSCL.":";
   $DLIGCL[$CLS.":".$XFIL]=array($CLS,$XFIL,$DLBSCL);
   if(!is_null($DPT->Columns($CLS))){$DPT->RemColumn($CLS);}
   if(!is_null($DPT->Columns($XFIL))){$DPT->RemColumn($XFIL);}
  }
 }}/*ASS*/$vj=0;$MAXITE=count($TB->RWS->C);$AFDLBSCL="{null|null}";$GrpFilCll=explode(",",$GrpFil);
 for($j=0;$j<count($GrpFilCll);$j++){$GrpFilCll[$j]=trim($GrpFilCll[$j]);}
 /*Creando tabla agrupada*/$j=0;while($j<$MAXITE){$DLBSCL='';
  foreach($GrpFilCll as $FIL){$DLBSCL=$DLBSCL.C1."|".$TB->Cells($j,$FIL);}
  if($DLBSCL!=$AFDLBSCL){$AFDLBSCL=$DLBSCL;}else{$DPT->RemRow($j-$vj);$vj++;}
  /*Agrego expand Var Filter*/try{foreach($DLIGCL as $NK=>$KY){
   $CLS=$TB->Cells($j,$KY[0]);$RWO=strval($TB->Cells($j,$KY[1]));
   if(is_null($DPT->Columns($KY[2]."_".$RWO))){$DPT->AddColumn($KY[2]."_".$RWO,$TB->ColumnType($KY[0]));}
   try{$DPT->SetCell($j-$vj,$KY[2]."_".$RWO,$DPT->Cells($j-$vj,$KY[2]."_".$RWO).$CLS);}catch(Exception $ex){SetCell($j-$vj,$KY[2]."_".$RWO,$CLS);}
  }}catch(Exception $ex){}/*Paso*/$j++;
 }return $DPT;
}
?>