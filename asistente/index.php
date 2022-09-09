<html>
    <head>
		<meta charset="utf-8">
        <title>Inscripcion Socios</title>
        
        
        <link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="js/jquery.min.js"></script>
        <!-- jQuery code for implement logic for select pizza size and add toppings checkbox -->
        <script type="text/javascript">
            $(document).ready(function () {
                var size = 0;
                $('select').change(function () {
                    size = ($(this).val());
                    addValue(size);
                });
                addValue(size);
                function addValue(size) {
                    var total = 0;
                    function updateTextArea() {
                        var allVals = [];
                        $('#checkbox_container :checked').each(function () {
                            allVals.push($(this).val());
                        });
                        if (size === 0) {
                            size = 49;
                        }
                        total = parseFloat(size) + parseFloat(eval(allVals.join("+")));
                        if (isNaN(total)) {
                            if (size === 0) {
                                total = 99;
                            }
                            else {
                                total = size;
                            }
                        }
                        $('p#total span').html(" $ " + total);
                    }
                    $(function () {
                        $('#checkbox_container input').click(updateTextArea);
                        updateTextArea();
                    });
                }
            });
        </script>
    </head>
    <body>
	 <div id="main">
			<div class="row">
				<center><h1 class='text-info'> Inscripcion Socios</h1></center>
				<div class="col-md-3"></div>
				<div class="col-md-6">
				
					<div class="panel panel-info">
						<div class="panel-heading"><h3 class='text-center'>Inscripcion Nuevos Socios</h3></div>
						  <div class="panel-body">
							<img id="spizza" src="https://www.credimejora.com/hubfs/estilo-de-vida.jpg" class='img-responsive'/>
							<form action="process.php" method="post">
                    <label>Seleccione Opciones :</label>
                    <select name="pizza_type" >
                        <option value="49">Plan A - $49.00</option>
                        <option value="99">Plan B - $99.00</option>
                        <option value="149">Plan C - $149.00</option>
                    </select>
                    <br><br>
     
					
                    
                    
                    <center><p id="total" >Monto total de Inscripcion: <span>$ 49</span></p></center>
                    <input type="submit" value=" Inscribase ahora " name="submit">
                </form>
						  </div>
					</div>
				<div class='text-center'>	
					<img src="images/secure-paypal-logo.jpg" class='text'>
				</div>	
				</div>
			</div>
		</div>	
		


<div class="toast" style="position: absolute; top: 25px; center: 25px;">
    <div class="toast-header">
        <i class="bi bi-wifi"></i>&nbsp;&nbsp;&nbsp;
        <strong class="mr-auto"><span class="text-success">J@Red App</span></strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        Con conexion a internet.
    </div>
</div>

<script>

var status = 'online';
var current_status = 'online';

function check_internet_connection()
{
    if(navigator.onLine)
    {
        status = 'online';
    }
    else
    {
        status = 'offline';
    }

    if(current_status != status)
    {
        if(status == 'online')
        {
            $('i.bi').addClass('bi-wifi');
            $('i.bi').removeClass('bi-wifi-off');
            $('.mr-auto').html("<span class='text-success'>J@Red App</span>");
            $('.toast-body').text('Con Conexión a internet.');
        }
        else
        {
            $('i.bi').addClass('bi-wifi-off');
            $('i.bi').removeClass('bi-wifi');
            $('.mr-auto').html("<span class='text-danger'>J@Red App</span>");
            $('.toast-body').text('Sin Conexion a internet.')
        }

        current_status = status;

        $('.toast').toast({
            autohide:false
        });

        $('.toast').toast('show');
    }
}

check_internet_connection();

setInterval(function(){
    check_internet_connection();
}, 1000);


	
</script>

    </body>
</html>
