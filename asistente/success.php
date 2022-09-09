<html>
    <head>
		<meta charset="utf-8">
        <title>Inscripcion Socios</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div id="main">
			<div class="row">
				<center><h1 class='text-info'> Inscripcion Socios</h1></center>
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="panel panel-info">
						<div class="panel-heading"><h4 class='text-center'>Estado de la Inscripcion</h4></div>
						  <div class="panel-body">
							
							 <img id="pizza-success" src="images/pizza-success.jpg" >
							 <center> <h3>Transacción ID = <?php
									if (isset($_REQUEST['st'])) {
										echo $_REQUEST['tx'];
									}
									?> </h3></center>
							<?php if (isset($_REQUEST['st']) == 'completed') { ?>
								<center><h3 style="color:green;">Orden completada satisfactoriamente</h3></center>
							<?php } else { ?>

								<center><h3 style="color:red;">Lo sentimos, intenta nuevamente</h3></center>
							<?php } ?>
							<br><br>
							<center><a id="backTopizza" href="index.php" ><< Inscribirse a otra categoria?</a></center>
							<br><br>	
              
						  </div>
					</div>
				</div>
			</div>	
          
            
           
        </div>
    </body>
</html>
