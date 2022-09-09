<?php

include("database.php");
class orders extends database {
	public $mysqli;
	public $counter;//Propiedad para almacenar el numero de registro devueltos por la consulta

	function __construct(){
		$this->mysqli = $this->conectar();
    }
	
	public function countAll($sql){
		$query=$this->mysqli->query($sql);
		$count=$query->num_rows;
		return $count;
	}
	
	public function getData($tables,$campos,$search){
		$offset=$search['offset'];
		$per_page=$search['per_page'];
		$sWhere=" geoclinav01.CLIIP LIKE '%".$search['query']."%'";
		if ($search['CLIIP']!=""){
			$sWhere.=" and geoclinav01.CLIIP = '".$search['location']."'";
		}
		if ($search['status']!=""){
			$sWhere.=" and geoclinav01.status = '".$search['status']."'";
		}
		$sWhere.=" order by geoclinav01.CLIIP desc";
		$sql="SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT $campos FROM  $tables where $sWhere";
		$nums_row=$this->countAll($sql1);
		//Set counter
		$this->setCounter($nums_row);
		return $query;
	}
	function setCounter($counter) {
		$this->counter = $counter;
	}
	function getCounter() {
		return $this->counter;
	}
}

