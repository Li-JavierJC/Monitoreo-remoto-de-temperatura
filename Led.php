<html>
<head>
	<meta charset="utf-8">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Encender y Apagar Leds</title>
	<! Definicion de los estilos css!>
	<link rel="StyleSheet" href="css/Temperatura.css" type="text/css">
	<link rel="stylesheet" href="css/tabla11.css">
	<link rel="stylesheet" href="css/posicion.css">
	<link rel="stylesheet" href="css/estilo1.css">	
</head>
<header class="">
	<div class="wrapper">
		<h2> Recolección de datos de Temperatura y Humedad  en la Universidad de la Cañada</h2>
		<nav>
			<a href="index.php">Volver a Jefatura de Informática</a>
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

	$ch = curl_init("http://192.168.137.5/");
//echo $ch;
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//asignamos los datos obtenidos en la variabmle html
	$cadena = curl_exec($ch);
	echo $cadena;
//cerremos la operacion curl
	curl_close($ch);
	?>
</body>
</html>

