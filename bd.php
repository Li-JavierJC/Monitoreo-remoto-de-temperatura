<?php

$conexion= new mysqli( "localhost","root","","bd_temperatura");
if ($conexion->connect_errno){
	echo "error";
}
/*
else
{
	echo "conexion exitosa";
}
*/
?>