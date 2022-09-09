<?php /* ODBC-DB-iAdministrator v. 1.0 */
global $_m¬OdbcErr;
require_once('DB.iAdministrator.php');
class _¬DB_odbc_iAdministrator{
 public $DB;public $Name='';public $PV='none';public $CS;public $CU;public $CP;public $KERR='';
 public function __construct($DB,$PV,$CS,$CU,$CP){$this->DB=$DB;$this->PV=$PV;$this->CS=$CS;$this->CU=$CU;$this->CP=$CP;}
 public function GetConnection(){$DB=$this->DB;if(!$DB){if(function_exists('odbc_connect')){$DB=@odbc_connect($this->CS,$this->CU,$this->CP);}else{/* Second Adapter */}$this->DB=$DB;}if(!$DB){$this->KERR=odbc_errormsg();}return $DB;}
 public function GetError(){return $this->KERR;}
 public function xFTB(&$T,$R){/*Cols*/$CCL=odbc_num_fields($R);if($CCL==0){return false;}$T=new _¬DataTable();for($c=1;$c<=$CCL;$c++){array_push($T->CLS,odbc_field_name($R,$c));}/*Rows*/while($A=odbc_fetch_array($R)){$T->ARw($A);}return true;}
 public function LectorSQL($Q,&$RE=false){$T=null;if(!_¬IsNE($Q)){$RE=false;$DB=$this->GetConnection();if($DB){$R=odbc_exec($DB,$Q);if($R){do{if($this->xFTB($T,$R)){break;}}while(odbc_next_result($R));}else{$RE=true;$this->KERR=odbc_errormsg($DB);}}}if(is_null($T)){$T=new _¬DataTable();}return $T;
 }
 public function LectorSQL2($Q,&$ERR=''){$CT=array();
  if(!_¬IsNE($Q)){$ERR='';$DB=$this->GetConnection();if($DB){$R=@odbc_exec($DB,$Q);if($R){do{if($this->xFTB($T,$R)){array_push($CT,$T);}}while(odbc_next_result($R));}else{$ERR=odbc_errormsg($DB);}}}return $CT;
 }
 public function RunSQL($Cmd,&$L=0){$L=0;$DB=$this->GetConnection();if($DB){$R=@odbc_exec($DB,$Cmd);if($R){do{$TL=odbc_num_rows($R);if($TL>0){$L+=$TL;}}while(odbc_next_result($R));return true;}else{$this->KERR=odbc_errormsg($DB);}}return false;}
 /*SRL*/public function LoadSRL($R){$R=unserialize($R);print_r($R);$this->Name=$R->Name;$this->PV=$R->PV;$this->CS=$R->CS;$this->CU=$R->CU;$this->CP=$R->CP;$this->DB=@odbc_connect($this->CS,$this->CU,$this->CP);$this->KERR=odbc_errormsg();}
}
?>