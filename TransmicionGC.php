<html>

<head>
	<title>Transmición de Camera con Gráfica</title>
</head>


<frameset cols="50%,*">
	<frame id="frmIzquierdo" name="frmIzquierdo" src="Camara.php" />
	<frame    name="frmDerecho"   src="graficas_info.php"/>
</frameset>
<body>
	<?php

	$ch = curl_init("http://192.168.137.252/");
//echo $ch;
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//asignamos los datos obtenidos en la variabmle html
	$cadena = curl_exec($ch);
//cerremos la operacion curl
	curl_close($ch);
	?>
</body>
</html>

