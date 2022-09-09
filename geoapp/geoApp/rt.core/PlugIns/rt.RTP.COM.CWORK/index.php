<?php
$UID=$_GET["UID"];
if(!isset($UID)){$UID=uniqid();}
$C=$_GET["C"];
$G=$_GET["G"];
$TMP=sys_get_temp_dir();
if($C=='RESQUET'){
 if(isset($G)){$GID=$TMP.'/rt.CWORK/SCK-GRP/'.$G;
  if(!file_exists($GID)){mkdir($GID,0777,true);}
  $GID=$GID.'/'.$UID;
  if(!file_exists($GID)){fclose(fopen($GID, "w"));}
 }
 /* Query User Data */
 $GID=$TMP.'/rt.CWORK/SCK-CLI/'.$UID;
 $fa=strtotime(date("d-m-Y H:i:00",time()));
 $ftm=strtotime('+12 second',$fa);
 $ok=0;$SM='';
 while(!$ok&&$fa<$ftm){$fa=strtotime(date("d-m-Y H:i:00",time()));
  $a=scandir($GID);
  for($i=0;$i<count($a);$i++){if($a[$i]!='.'&&$a[$i]!='..'){
   $ft=$GID.'/'.$a[$i];
   $f=fopen($ft, "rw");
   if($f){$datos = fread($f,filesize($ft));
	$SM=$SM.'|:|'.$datos;fclose($f);unlink($ft);
    $ok=1;
   }
  }}
  if(!$ok){sleep(0.5);}
 }
 if(!$ok){echo('SIG|!|'.microtime());}else{echo($SM);}
}else if($C=='CALL'){/* MTD: CALL */$D=explode('&',$_GET["D"]);
 $GID=$TMP.'/rt.CWORK/SCK-CLI/';
 $GSC=$TMP.'/rt.CWORK/SCK-GRP/'.$G;
 $a=scandir($GSC);
 /*CoProcessData */$MD='';$UA=$D[1];
 for($j=2;$j<count($D);$j++){$MD=$MD.',"'.$D[$j].'"';}
 $MD=$D[0].'('.substr($MD,1).');';
 $MD='MTD|!|'.str_replace('|','%7C',str_replace('%','%25',$MD));
 echo($MD);
 /*Send Data*/
 for($i=0;$i<count($a);$i++){
  if($a[$i]!='.'&&$a[$i]!='..'){
   if(file_exists($GID.$a[$i])){if($UA==''||$UA==$a[$i]){
    $f=fopen($GID.$a[$i].'/'.uniqid(), "w");fwrite($f,$MD);fclose($f);
   }}else{unlink($GSC.'/'.$a[$i]);/*Notify-DeathUser*/}
  }
 }
}
?>