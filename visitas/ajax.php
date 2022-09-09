<?php
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	
	include('clases/orders.php');
	$database=new orders();
	//Recibir variables enviadas
	$query=strip_tags($_REQUEST['query']);
	$location=strip_tags($_REQUEST['CLIPAIS']);
	$status=strip_tags($_REQUEST['status']);
	$per_page=intval($_REQUEST['per_page']);
	$tables="geoclinav01";
	$campos="*";
	//Variables de paginación
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	
	
	$search=array("query"=>$query,"CLIPAIS"=>$location,"status"=>$status,"per_page"=>$per_page,"offset"=>$offset);
	//consulta principal para recuperar los datos
	$datos=$database->getData($tables,$campos,$search);
	$countAll=$database->getCounter();
	$row = $countAll;
	
	if ($row>0){
		$numrows = $countAll;;
	} else {
		$numrows=0;
	}	
	$total_pages = ceil($numrows/$per_page);
	
	
	//Recorrer los datos recuperados

	if ($numrows>0){
		?>
	 <table class="table table-striped table-hover ">	
		<thead>
            <tr>
                <th>Ip</th>
                <th>Codigo</th>
				<th>Pais</th>
				<th>Fecha</th>						
                <th>Dirección</th>						
				<th>Latitud</th>
				<th>Longitud</th>
				<th>Ver mapa</th>
            </tr>
        </thead>
        <tbody>
		<?php
		$finales=0;
		foreach ($datos as $key=>$row){
				$status_order=$row['status'];
				if ($status_order=='Enlinea'){
					$class_css="text-success";
				} elseif ($status_order=='Desconectado'){
					$class_css="text-danger";
				
				} else {
					$class_css="";
				}
			?>
		<tr>
		    <td><?=$row['CLIIP'];?></td>
		    <td> <?=$row['CLIPSCOD'];?></a></td>
			<td><?=$row['CLIPAIS'];?></td>
		    <td><?=date("Y-m-d H:i:s", strtotime($row['CLIFREG']));?></td>                        
			<td><?=$row['CLIDIRRF'];?></td>
			<td><?=$row['CLILATITUDE'];?></td>
			<td><?=$row['CLILONGITUDE'];?></td>

			<td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
		</tr>
			<?php
			$finales++;
		}	
	?>
		</tbody>
		</table>
		<div class="clearfix">
			<?php 
				$inicios=$offset+1;
				$finales+=$inicios -1;
				echo '<div class="hint-text">Mostrando '.$inicios.' al '.$finales.' de '.$numrows.' registros</div>';
				
				
				include 'clases/pagination.php'; //include pagination class
				$pagination=new Pagination($page, $total_pages, $adjacents);
				echo $pagination->paginate();

			?>
        </div>
	<?php
	}
}
?>

