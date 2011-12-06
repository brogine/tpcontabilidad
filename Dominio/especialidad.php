<?php
class Especialidad
{
	public $IdEspecialidad;
	public $Nombre;
	
	public function __construct($IdEspecialidad, $Nombre){
		$this->IdEspecialidad = $IdEspecialidad;
		$this->Nombre = $Nombre;
	}
}