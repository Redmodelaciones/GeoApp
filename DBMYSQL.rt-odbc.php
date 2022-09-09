<?php global $_m¬DBdfc;global $_m¬DB;global $_x¬DB;global $_x¬DBt;
/* Server 1 */$_x¬DBS1='51.79.17.90';
/* Server 2 */$_x¬DBS2='51.79.17.90';
/* Catalogo */$_u¬DBCatalogo='redmodelaciones_localizador';
/* Catalogos: 1|2 */$_u¬DBCatalogos='';
/* Usuario DB */$_x¬DBU='redmodelaciones_sys';
/* Clave DB */$_x¬DBP='rdsys2022@';
/* Core-Make-DB */$_x¬DB=null;$_x¬DBCAT='';$_u¬DBdfc=_¬IsNE($_m¬DBdfc)?$_u¬DBCatalogo:$_m¬DBdfc;$_u¬DBCat=explode('|',$_u¬DBCatalogos);$_x¬DBS=$_x¬DBS1;try{$_x¬DB=@mysqli_connect($_x¬DBS, $_x¬DBU, $_x¬DBP);$_u¬DBTCAT=_¬IsNE($_u¬DBCat[0])?$_u¬DBdfc:$_u¬DBCat[0];mysqli_select_db($_x¬DB,$_u¬DBTCAT);$_x¬DBCAT=$_u¬DBTCAT;}catch(Exception $ex){}if(!$_x¬DB){$_x¬DBS=$_x¬DBS2;try{$_x¬DB=@mysqli_connect($_x¬DBS, $_x¬DBU, $_x¬DBP);$_u¬DBTCAT=_¬IsNE($_u¬DBCat[1])?$_u¬DBdfc:$_u¬DBCat[1];mysqli_select_db($_x¬DB,$_u¬DBTCAT);$_x¬DBCAT=$_u¬DBTCAT;}catch(Exception $ex){}}$_u¬tit=$_x¬DB->query("SET NAMES 'iso-8859-1'");if(!$_x¬DB){_¬WErrEx('No se puede conectar a la base de datos, se requiere que php.ini tenga habilitado la Extención (mysqli) y que el servidor tenga soporte para el controlador MySQL<br>1) '.$_x¬DBS1.'<br>2) '.$_x¬DBS2.'<br>Ultimo -Error: '.mysqli_error($_x¬DB));}else{$_x¬DBt='mysql';include_once(CoreDir.'DB.mysqli.php');$_m¬DB=new _¬DB_mysqli_iAdministrator($_x¬DB,$_x¬DBS,$_x¬DBU,$_x¬DBP,$_x¬DBCAT);}?>