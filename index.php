<!DOCTYPE html>
<html>
<head>
	<title>
		Enviando datos al servidor Web con DHT y ESP8266
	</title>
	<! Definicion de los etilos css!>
	<link rel="shortcut icon" type="image/x-icon"  href="imagenes/logo.jpg" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="StyleSheet" href="css/Temperatura.css" type="text/css">
	<link rel="stylesheet" href="css/estilo1.css">
	<script  src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<header>
	<div class="wrapper">

		<!--<div class="logo" style="background-image: url(imagenes/Escudo.png);">FalconMasters</div> -->
		<br>
		<div class="logo"><img src="imagenes/Escudo.png" width="110" height="110"/> </div>
		<h2> Recolección de datos de Temperatura y Humedad  en la Universidad de la Cañada</h2>
		
		<nav>
			<a href="TransmicionGC.php">Transmisón en Vivo</a>
			<a href="Led.php">LEDS</a>
		</nav>
	
		
	</div>
</header>
<body>
	<head>
		<style type="text/css">
			body {
				background-image: url(imagenes/uc1.jpg);
				background-position: center center;	  
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: cover;
			}
			#mail {
				width: 100%;

			</style>
		</head>



		<?php
//metodo para mandar a llamar la conexion a la base de datos
		include("bd.php"); 
//recupecion de la pagina web del sensor de centro de redes
		$ch = curl_init("http://192.168.10.166/");
//echo $ch;
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//asignamos los datos obtenidos en la variabmle html
		$cadena = curl_exec($ch);
//cerremos la operacion curl
		curl_close($ch);
//echo $cadena;
//se obtiene solamente la parte de a cadena que se interesa
		$subcadena= substr($cadena, 425,-150);

//el valor obtenido se coonviete a entero que es la temperatura
		$temperatura=(int)$subcadena;




//echo $temperatura;
//se obtiene solamente la parte de a cadena que se interesa
		$subcadena1=substr($cadena, 533, -42);
//el valor obtenido se coonviete a entero que es la humedad
		$humedad=(int)$subcadena1;

		?>
		<script type="text/javascript">
			window.onload=function captura(){
				setTimeout('horaImpresion()',1800000);
			}

			function hora()
			{
				var horaActual= new Date();
				var horaProgramada= new Date();
				horaProgramada.setHours(9);

				horaProgramada.setMinutes(50);
				horaProgramada.setSeconds(0);
				return horaProgramada.getTime() - horaActual.getTime();

			}

			function horaImpresion(){
		//alert('Se muestra la hora programada para campturar datos');
		
		document.forms['registro1'].submit();
		
	}
</script>
<form action="registro.php" name="registro1" method="post" class="form-register">

	<h1 class="form-titulo">Monitoreo de Temperatura y Humedad en Jefactura de Informática</h1>

	<div class="contenedor-inputs">

		<h3>Temperatura: <?php echo("$temperatura");?> *C </h3>
		<input id="nombre" name="temperatura" type="hidden" value="<?php echo("$temperatura");?>">
		
		<h3>Humedad: <?php echo("$humedad");?> % </h3>
		<input id="nombre" name="humedad" type="hidden" value="<?php echo("$humedad");?>">

		<!-- <input id="nombre" name="dato" type="hidden" value="1"> -->
		<input id="nombre" name="dato" type="hidden" value="5">
		<p></p>
		<br><br>
		<!--<input type="submit" > -->
	</div>
</form>
<!-------------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------->


<br>
<form action="consultaJefactura.php" method="post" class="form-register">
	<div class="contenedor-inputs">
		<br><br>
		><input type="submit" name="registrar" value="Consultar" class="btn-enviar">
		<br><br><br>
	</div>
</form>
</body>
</html>

