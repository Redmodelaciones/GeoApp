<?php /* MYSQLI-DB-iAdministrator v. 1.0 */
require_once('DB.iAdministrator.php');
class _¬DB_mysqli_iAdministrator{
 public $DB;public $Name='';public $PV='mysql';public $SV;public $CT;public $CU;public $CP;public $KERR='';
 public function __construct($DB,$SV,$CU,$CP,$CT){$this->DB=$DB;$this->SV=$SV;$this->CU=$CU;$this->CP=$CP;$this->CT=$CT;}
 public function GetConnection(){$DB=$this->DB;if(!$DB){$DB=@mysqli_connect($this->SV,$this->CU,$this->CP);mysqli_select_db($this->DB,$this->CT);$this->DB->query("SET NAMES 'iso-8859-1'");$this->DB=$DB;}if(!$DB){$this->KERR=mysqli_error($this->DB);}return $DB;}
 public function xFTB(&$T,$R){/*Cols*/$CCL=mysqli_num_fields($R);if($CCL==0){return false;}$T=new _¬DataTable();$c=mysqli_fetch_fields($R);foreach($c as $FLD){array_push($T->CLS,$FLD->name);}/*Rows*/while($A=$R->fetch_array(MYSQLI_ASSOC)){$T->ARw($A);}return true;}
 public function GetError(){return $this->KERR;}
 public function LectorSQL($Q,&$RE=false){$T=null;if(!_¬IsNE($Q)){$RE=false;$DB=$this->GetConnection();if($DB){if(@mysqli_multi_query($DB,$Q)){if($R=mysqli_store_result($DB)){$this->xFTB($T,$R);}}else{$RE=true;$this->KERR=mysqli_error($DB);}}}if(is_null($T)){$T=new _¬DataTable();}return $T;
 }
 public function LectorSQL2($Q,&$ERR=''){$CT=array();
  if(!_¬IsNE($Q)){$ERR='';$DB=$this->GetConnection();if($DB){if(@mysqli_multi_query($DB,$Q)){do{if($R=mysqli_store_result($DB)){if($this->xFTB($T,$R)){array_push($CT,$T);}}}while(mysqli_next_result($DB));}else{$ERR=mysqli_error($DB);}}}return $CT;
 }
 public function RunSQL($Cmd,&$L=0){$L=0;$DB=$this->GetConnection();if($DB){if(@mysqli_multi_query($DB,$Cmd)){if($R=mysqli_store_result($DB)){do{$TL=mysqli_affected_rows($R);if($TL>0){$L+=$TL;}}while(mysqli_next_result($DB));}return true;}else{$this->KERR=mysqli_error($DB);}}return false;}
 /*SRL*/public function LoadSRL($R){$R=unserialize($R);print_r($R);$this->Name=$R->Name;$this->SV=$R->SV;$this->CU=$R->CU;$this->CP=$R->CP;$this->CT=$R->CT;$this->DB=$this->GetConnection();}
}
?>