<?php
class Temperatura{

	//Declaracion de los atributos de la clase Temperatura
	private $id;
	private $temperatura;
	private $humedad;
	private $fecha;


	const TABLA ='jefactura_info';

	//Metodo cobstructor de la clase Temperatura
	public function __construct($temperatura, $humedad, $fecha, $id=null){

		
		$this->temperarura=0;
		$this->humedad=0;
		$this->fecha="";
		$this->id=0;

	}

	//----------------------------------------------
	//Metod set del atributo id
	function setId($id){
		$id=$id;
	}
	//Metodo get del atribuo de id
	public function getId(){
		return $id;
	}


	//---------------------------------------------------
	//Metodo set del atributo temperatura
	public function setTemperatura($temperatura){
		$temperatura=$temperatura;
	}
	//Metodo get del atribuo de temperatura
	public function getTemperatura(){
		return $temperatura;
	}

	//---------------------------------------------------
	//Metodo set del atributo humedad
	public function setHumedad($humedad){
		$humedad=$humedad;
	}
	//Metodo get del atribuo de humedada
	public function getHumedad(){
		return $humedad;
	}
	//---------------------------------------------------
	//Metodo set del atributo fecha
	public function setFecha($fecha){
		$fecha=$fecha;
	}
	//Metodo get del atribuo de fecha
	public function getFecha(){
		return $fecha;
	}
}
?>