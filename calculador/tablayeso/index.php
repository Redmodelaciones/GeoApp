<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>COTIZADOR DE TABLAYESO --</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/gsdk-base.css" rel="stylesheet" />
    
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
</head>

<body >
<div class="image-container set-full-height" style="background-image: url('assets/img/bgmap.png')">
    
    
    <!--   Big container   -->
    <div class="container">
        
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
           
            <!--      Wizard container        -->   
            <div class="wizard-container"> 
                
                <div class="card wizard-card ct-wizard-orange" id="wizardProfile">
                    <form action="" method="post" id="estimate">
                <!--        You can switch "ct-wizard-orange"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->
                
                    	<div class="wizard-header">
                        	<h3>
                        	   <b>COTIZADOR</b>  DE TABLAYESO <br>
                        	   <small>Solicita una cotizacion de materiales y mano de obra</small>
                        	</h3>
                    	</div>
                    	<ul>
                            <li><a href="#about" data-toggle="tab">Información del Cliente</a></li>
                            <li><a href="#account" data-toggle="tab">Información del Servicio</a></li>
                            <li><a href="#address" data-toggle="tab">Ubicación de la Obra</a></li>
                        </ul>
                        
                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
                                  <h4 class="info-text">Información del Cliente </h4>
                                  
                                  <div class="col-sm-6 col-sm-offset-3">
                                      <div class="form-group">
                                        <label>Nombres <small>(requerido)</small></label>
                                        <input name="firstname" type="text" class="form-control" placeholder="Andrew...">
                                      </div>
                                      
                                  </div>
								  
								  
                                  <div class="col-sm-6 col-sm-offset-3">
                                      <div class="form-group">
                                          <label>Email <small>(requerido))</small></label>
                                          <input name="email" type="email" class="form-control" placeholder="andrew@gmail.com">
                                      </div>
                                  </div>
								  
								  <div class="col-sm-6 col-sm-offset-3">
                                      <div class="form-group">
                                          <label>Teléfono <small>(requerido))</small></label>
                                          <input name="phone" type="text" class="form-control" placeholder="+(801)7085855" required>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> Información del Servicio </h4>
                                <div class="row">
                                   <div class="col-sm-4">
									<img src='assets/img/tablayeso.jpg' class='img-responsive'>
								 
								 </div>
								   <div class="col-sm-8">
                                      <div class="form-group">
                                        <label>Tipo de Instalacion <small>(requerido)</small></label>
                                        <select class='form-control' required name='style'>
											<option value=''>-- Selecciona --</option>
											<option value='CAMISETA CON CUELLO'>Muro a una cara</option>
											<option value='CAMISETA DE ESTILO NÁUTICO'>Muro a doble Cara</option>
											<option value='CAMISETA ESTAMPADA'>Enchapado</option>
											<option value='CAMISETA DEPORTIVA'>Cielo Falso</option>
											<option value='CAMISETA CUELLO EN V'>Otro</option>
										</select>
                                      </div>
                                      
									  <div class="form-group">
                                        <label>Area Aproximada<small>(requerido)</small></label>
                                        <select class='form-control' required name='talla'>
											<option value=''>-- Selecciona --</option>
											<option value='Talla S'>1 a 5 mts2</option>
											<option value='Talla M'>5 a 10 Mts2</option>
											<option value='Talla L'>10 a 15 mts2</option>
											<option value='Talla XL'>15 a 20 Mts2</option>
										</select>
                                      </div>
									  
									  <div class="form-group">
                                        <label>Color de Pintura<small>(requerido)</small></label>
                                        <select class='form-control' required name='color'>
											<option value=''>-- Selecciona --</option>
											<option value='Negro'>Empastado y lijado solamente</option>
											<option value='Blanco'>Blanco</option>
											<option value='Azul'>Azul</option>
											<option value='Amarillo'>Amarillo</option>
											<option value='Rojo'>Otro</option>
											
										</select>
                                      </div>
									  
									  
                                  </div>
								  
								 
								  
                                    
                                    
                                    
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> Información de Envío </h4>
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Calle</label>
                                            <input type="text" name="street" class="form-control" placeholder="5h Avenue" required>
                                          </div>
                                    </div>
                                    <div class="col-sm-3">
                                         <div class="form-group">
                                            <label>Número de calle</label>
                                            <input type="text" name="number" class="form-control" placeholder="242">
                                          </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Ciudad</label>
                                            <input type="text" name="city" class="form-control" placeholder="New York..." required>
                                          </div>
                                    </div>
                                    <div class="col-sm-5">
                                         <div class="form-group">
                                            <label>País</label><br>
                                             <select name="country" class="form-control" >
                                                <option value="">-- Selecciona --</option>
												
												<option value="AR">Argentina</option>
									
												<option value="BO">Bolivia, Plurinational State of</option>
												
												<option value="CL">Chile</option>
												
												<option value="CO">Colombia</option>
											
												<option value="CR">Costa Rica</option>
												
												<option value="EC">Ecuador</option>
											
												<option value="SV">El Salvador</option>
											
												<option value="GT">Guatemala</option>
											
												<option value="HN">Honduras</option>
											
												<option value="MX">Mexico</option>
												
												<option value="NI">Nicaragua</option>
												
												<option value="PA">Panama</option>
											
												<option value="PY">Paraguay</option>
												<option value="PE">Peru</option>
												
												<option value="PR">Puerto Rico</option>
												
												<option value="ES">Spain</option>
												
												<option value="US">United States</option>
												
												<option value="UY">Uruguay</option>
											
												<option value="VE">Venezuela, Bolivarian Republic of</option>
											
											
                                            </select>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
						<div id='result'></div>
						<hr>
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Siguiente' />
                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Finalizar' />
								
        
                            </div>
                            
                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Anterior' />
                            </div>
								
                            <div class="clearfix"></div>
                        </div>	
                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
		
    </div> <!--  big container -->
    
    
    <div class="footer">
                    <?php 
                    			
                    				include 'includes/whatsapp.php'; //include 
		          	?>

             Desarrollado  por <a href="#">Obed Alvarado</a>.
        </div>
    </div>

</div>

</body>



    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
		
	<!--   plugins 	 -->
	<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
	
    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>
	
    <!--  methods for manipulating the wizard and the validation -->
	<script src="assets/js/wizard.js"></script>
	<script>
		var form1 = $( "#estimate" );
		form1.validate();
		$( "#estimate" ).submit(function( event ) {
			if (form1.valid()==true){
		  var parametros = $(this).serialize();
			  $.ajax({
				type: "POST",
				url: "process.php",
				data: parametros,
				 beforeSend: function(objeto){
					$("#result").html("Mensaje: Cargando...");
				  },
				success: function(datos){
				$("#result").html(datos);
				
			  }
			});
		  event.preventDefault();
			}  
		});
	</script>

</html>