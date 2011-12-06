<?php
class Especialidad
{
	public $IdEspecialidad;
	public $Nombre;
	
	public function __construct($IdEspecialidad = null, $Nombre){
		$this->IdEspecialidad = $IdEspecialidad;
		$this->Nombre = $Nombre;
	}
}