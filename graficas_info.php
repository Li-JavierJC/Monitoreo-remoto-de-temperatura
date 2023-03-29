<!DOCTYPE html>
<html>
<head>
	<title>Graficos con Plotly</title>
	<! libreria necesaria para la graficacion de los datos!>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap1/css/bootstrap.css">
	<script src="librerias/jquery-3.3.1.min.js"></script>
	<script src="librerias/plotly-latest.min.js"></script>
	<! hojas de estilos necesarias!>
	<link rel="stylesheet" href="css/estilo1.css">
	<link rel="stylesheet" href="css/tabla11.css">
</head>


	
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
							position: fixed;
						}
				</style>
			</head>
		<! Contenedor de la grafica!>
		<frame>
			<div>
				<div class="row">
					<div class="col-sm-11">
						<div class="panel panel-primary">
							<div class="panel panel-heading">
								<center>
									<h3>Gráfica de Temperatura y Humedad de Jefactura de Informática</h3>	 
								</center>
							</div>
							<div class="panel panel-body">
								<div class="row">
									<div class="col-sm-12">
										
										<div id="cargaLineal"></div>
										<br>
									</div>
								</div>
							</div>
						</div>
					</div>			
				</div>
			</div>
		</frame>
	</body>

</html>
<!-- Funcion en javascrip para llamar los datos requeridos en el contenedor de la grafica -->
<script type="text/javascript">
	$(document).ready(function () {
		$('#cargaLineal').load('lineal_info.php');
	})
</script>