<?php
class Ubicacion
{
	public $Localidad;
	public $Domicilio;
	
	public function __construct(Localidad $Localidad, $Domicilio){
		$this->Localidad = $Localidad;
		$this->Domicilio = $Domicilio;
	}
}