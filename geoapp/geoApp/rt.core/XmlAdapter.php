<?php /*Adapter: XML*/
class XmlDocuemnt extends XmlNode{public $DC;
 public function __construct(){$this->DC=new DOMDocument();}
 public function LoadXml($xml){$this->DC->loadHTML($xml);}
 
}
class XmlNodeList{public $DC,$C=array(),$NLS;
 public function __construct($DC){$this->DC=$DC;}
 public function Count(){return count($this->C);}
}
class XmlNode{public $DC,$ND=null;
 public function __construct($DC,$XND=null){$this->DC=$DC;if(is_null($XND)){$XND=$DC;}$this->ND=$XND;}
 public function SelectSingleNode($xpath,$nsmgr=null){$NDS=$this->SelectNodes($xpath,$nsmgr);return $NDS->C[0];}
 public function SelectNodes($xpath,$nsmgr=null){$NDS=new XmlNodeList($this->DC);
  if(!is_null($nsmgr)){_¬WError('Espacios de Nombre, de prefijos XPath -> Aun no se soporta !!');}
  $ND=$this->ND;if(substr($xpath,0,1)=='/'){$xpath='/'.$xpath;$ND=$this->DC;}
  if(!_¬IsNE($xpath)){$DXP=new DOMXPath($this->DC);$NDS->NLS=$DXP->query($xpath,$ND);foreach($NDS->NLS as $XND){array_push($NDS->C,new XmlNode($this->DC,$XND));}
  }
  return $NDS;
 }
 public function getInnerText(){return $this->ND->nodeValue;}
}
?>