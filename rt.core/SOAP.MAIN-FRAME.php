<?php require_once(CoreDir.'HttpWeb.php');
require_once(CoreDir.'XmlAdapter.php');
class _¬NtvSOAP_MainFrame_PRX{
 public function QueryPersonInfo($DOC,$National){$R='';try{
  if($National=='PE'){/* URL1: https://eldni.com/buscar-por-dni?dni= */$DATA=_¬HttpSingleQuery("https://eldni.com/pe/buscar-por-dni?dni=".$DOC,'UTF8');
   $D=array('');
   if(_¬IndexOf($DATA,'"service-single"')>0){$D=explode("service-single",$DATA);
    $D=explode(C1,str_replace("<tbody>",C1,str_replace("</tbody>",C1,$D[1])));$D[0]="RT-SEARCH-v1";
   }elseif(_¬IndexOf($DATA,' <u>Resultados</u></h2>')>0){$D=explode(' <u>Resultados</u></h2>',$DATA);
    $D=explode(C1,str_replace("<tbody>",C1,str_replace("</tbody>",C1,$D[1])));$D[0]="RT-SEARCH-v1";
   }
   if($D[0]=="RT-SEARCH-v1"&&count($D)>=3){$DATA="<table>".str_replace("</th","</td",str_replace("<th","<td",$D[1]))."</table>";
    $XML=new XmlDocuemnt();$XML->LoadXml('<?xml version="1.0" encoding="ISO-8859-1"?>'.$DATA);
	foreach($XML->SelectSingleNode("/table/tr")->SelectNodes("td")->C as $ND){$R.=(_¬IsNE($R)?'':'¬').$ND->getInnerText();}
   }
  }
 }catch(Exception $ex){}return $R;}
 public function QuerySearchPerson($ApPat,$ApMat,$Nomb,$National){$R='';try{
  if($National=='PE'){/* URL1: https://eldni.com/buscar-por-dni?dni= */$DATA=_¬HttpSingleQuery("https://eldni.com/pe/buscar-por-nombres?nombres=".$Nomb."&apellido_p=".$ApPat."&apellido_m=".$ApMat,'UTF8');
   $D=array('');
   if(_¬IndexOf($DATA,'"service-single"')>0){$D=explode("service-single",$DATA);
    $D=explode(C1,str_replace("<tbody>",C1,str_replace("</tbody>",C1,$D[1])));$D[0]="RT-SEARCH-v1";
   }elseif(_¬IndexOf($DATA,' <u>Resultados</u></h2>')>0){$D=explode(' <u>Resultados</u></h2>',$DATA);
    $D=explode(C1,str_replace("<tbody>",C1,str_replace("</tbody>",C1,$D[1])));$D[0]="RT-SEARCH-v1";
   }
   if($D[0]=="RT-SEARCH-v1"&&count($D)>=3){$DATA="<table>".str_replace("</th","</td",str_replace("<th","<td",$D[1]))."</table>";
    $XML=new XmlDocuemnt();$XML->LoadXml('<?xml version="1.0" encoding="ISO-8859-1"?>'.$DATA);
	foreach($XML->SelectNodes("/table/tr")->C as $ND){$NDL=$ND->SelectNodes("td");if($NDL->Count()>=4){$R.=(_¬IsNE($R)?'':'|');$FSC=true;
	 foreach($NDL->C as $TD){$R.=($FSC?'':'¬').$TD->getInnerText();$FSC=false;}
	}}
   }
  }
 }catch(Exception $ex){}return $R;}
 public function QueryRUCInfo($RUC){_¬WError('Algoritmo no Terminado !!');}
}
?>