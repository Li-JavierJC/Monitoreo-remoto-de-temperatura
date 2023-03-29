<?php 
	//funcion para llamar la conexin de la base de datos
	include("bd.php");
	//sitaxis para hacer la consulta a  la base de datos
	//$consulta= "SELECT id_jefactura, temperatura, humedad FROM jefactura_info";

	$consulta= "SELECT fecha, temperatura, humedad FROM jefactura_info";
	//funcion que realiza  la consulta a la base de datos
	$resultado=mysqli_query($conexion,$consulta);
	//declaracion de la cadenas de valores
	$valoresX=array();
	$valoresY=array();
	$valoresZ=array();
	//recorrido para almacenar los valores en una cadena
	while($row=mysqli_fetch_array($resultado)){ 
		
		$valoresZ[]= $row[2];
		$valoresY[]= $row[1];


		//echo "llllllllllllll";
		 //$valoresX[]= $row[0];
		$subcadena[]= substr($valoresX[]= $row[0], 10,10);
		//echo "llllllllllllllll";




	}
	//temperatura
	//$datosX=json_encode($valoresX);
	$datosX=json_encode($subcadena);
	//humedad
	$datosY=json_encode($valoresY);
	//nemeros de datos
	$datosZ=json_encode($valoresZ);


	//echo $datosX;
?>
<div id="graficaLineal"></div>
	<script type="text/javascript">
		function creaCadenaLineal(json) {
			var parsed = JSON.parse(json);
			var arr = [];
			for (var x in parsed){
				arr.push(parsed[x]);
			}
			return arr;
		}	
	</script>
<script type="text/javascript">
	//recuperacion de cada uno de los valores
	datosX=creaCadenaLineal('<?php echo $datosX ?>');
	datosY=creaCadenaLineal('<?php echo $datosY ?>');
	datosZ=creaCadenaLineal('<?php echo $datosZ ?>');
	//trazo de la linea de de temperatura
	var trace1= {
		x:datosX,
		y:datosY,
		type: 'scatter',
		name: 'Temperatura',
  		line: {
   				shape: 'linear',
    			color: 'rgb(245, 165, 4)'
  			  }
	};
	//tarzo de la linea de Humedad	
	var trace2= {
		x:datosX,
		y:datosZ,
		type: 'scatter',
		name: 'Humedad',
  		line: {
   		        shape: 'linear',
    	        color: 'rgb(4, 143, 245)'
    	      }
	};
	//en la variable data se almacena los valores de dos lineas
	var data = [trace1,trace2];
	var layout = 
	{
 		font: {
    				family: 'Lato',
    				size: 14,
    				color: 'rgb(100,150,200)'
  				},
  		plot_bgcolor: 'rgba(200,255,0,0.1)',
 		margin: {
   		 			pad: 10
  				},

  		xaxis: {	
    				title: '',
    					titlefont: {	
     	 								color: '#0e7589',
     	 								size: 18
    								},
 				},
  		yaxis: {


   			 		title: 'Temperatura',
    				titlefont: {
      							color: '#1492B1',
     							 size: 18
    						},
  				}
	};
	//ejecucion de la graficaion 
	Plotly.plot('graficaLineal', data, layout);
</script>