<!DOCTYPE html>
<html>
<head>
	<title>Registro y consulta</title>
</head>
<body>
	<?php
		//definicion del archivo que hace la conexion a la base de datos
	include('bd.php');
		//datos de entrada del formulario de HTML
	$temperatura=$_POST['temperatura'];
	$humedad=$_POST['humedad'];
	$fecha=date("Y-m-d H:i:s");
		//dato necesario definir el fomulario quien manda los datos
	$dato=$_POST['dato'];


		//switch para activar las fuciones requerdos de acuerdo al formulario y tabla de la base de datos
	switch ($dato) {
			//insercción y consulta de datos de la tabla de centro de redes 
		case '1':
					//insercción y consulta de datos de la tabla de centro de redes 
		$sql="INSERT INTO jefactura_info(id_jefactura,temperatura,humedad,fecha) VALUES ('','$temperatura','$humedad','$fecha')";
					//funcion que realiza la inserccion de la base de datos
		mysqli_query($conexion,$sql);
					//codigo sobre la consulta en php
					//include('consultaJefactura.php');
		include('index.php');
		break;			
		default:
				# code...
		break;
	}
	?>
</body>
</html>