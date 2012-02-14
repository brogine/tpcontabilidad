<?php
include 'provincia.php';
class Localidad
{
	public $IdLocalidad;
	public $Nombre;
	public $Provincia;
	
	public function __construct($IdLocalidad, $Nombre, Provincia $Provincia){
		$this->IdLocalidad = $IdLocalidad;
		$this->Nombre = $Nombre;
		$this->Provincia = $Provincia;
	}
}