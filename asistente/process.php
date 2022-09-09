<?php
if (isset($_POST['submit'])) {
// Inicializo las variables para los valores
$topping1 = 0;
$topping2 = 0;
$topping3 = 0;
$topping4 = 0;
$topping5 = 0;
// Inicializo las variables para los nombres
$topping_name1='';
$topping_name2='';
$topping_name3='';
$topping_name4='';
$topping_name5='';
// Agregar URL de paypal ya sea de prueba o modo de produccion 
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
// Añadir correo electrónico del ID del comerciante en PayPal
$merchant_email = 'rededucativa.gt@gmail.com';
// Añadir URL de retorno para tu sitio web
$cancel_return = "https://redmodelaciones.online/asistente/index.php";
// Añadir URL de la página de éxito para tu sitio web, esto va a llamar cuando el cliente realiza el proceso de pago en PayPal
$success_return = "https://redmodelaciones.online/asistente/success.php";
$pizza_type = $_POST['pizza_type'];
if ($pizza_type == 49) {
$pizza_name = 'Plan1';
$pizza_code="Plan001";
} else if ($pizza_type == 99) {
$pizza_name = 'Plan2';
$pizza_code="Plan002";
} else if ($pizza_type == 149) {
$pizza_name = 'Plan3';
$pizza_code="Plan003";
}
if (isset($_POST['topping1'])) {
$topping1 = 00.00;
$topping_name1 = ', Electricidad';
}
if (isset($_POST['topping2'])) {
$topping2 = 00;
$topping_name2 = ', Cielo_Falso';
}
if (isset($_POST['topping3'])) {
$topping3 = 00;
$topping_name3 = ', Piso_Ceramico';
}
if (isset($_POST['topping4'])) {
$topping4 = 00;
$topping_name4 = ', Pintor';
}
if (isset($_POST['topping5'])) {
$topping5 = 00;
$topping_name5 = ',Plomeria';
}
$currency = 'USD';//Moneda 
//Monto total
$pizza_price = $pizza_type + $topping1 + $topping2 + $topping3 + $topping4 + $topping5;

$pizza_topping_details = "Remodelador con ".$topping_name1.$topping_name2.$topping_name3.$topping_name4.$topping_name5;

?>
<html>
<head>
<meta charset="utf-8">
<title>Procesando con PayPal</title>
</head>
<body>
<div style="margin-left: 38%"><img src="images/ajax-loader.gif"/><img src="images/processing_animation.gif"/></div>
<form name="myform" action="<?php echo $paypal_url; ?>" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?php echo $merchant_email; ?>">
<input type="hidden" name="lc" value="C2">
<input type="hidden" name="item_number" value="<?php echo $pizza_code;?>">
<input type="hidden" name="item_name" value="<?php echo $pizza_name; ?>">
<input type="hidden" name="amount" value="<?php echo $pizza_price; ?>">
<input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="on0" value="Ingredientes">
<input type="hidden" name="os0" value="<?php echo $pizza_topping_details; ?>">
<input type="hidden" name="cancel_return" value="<?php echo $cancel_return ?>">
<input type="hidden" name="return" value="<?php echo $success_return; ?>">
</form>
<!--Enviando datos a paypal -->
<script type="text/javascript">
document.myform.submit();
</script>
</body></html>
<?php } ?>

