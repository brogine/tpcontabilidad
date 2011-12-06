<?php
class Provincia
{
	public $IdProvincia;
	public $Nombre;
	public $Pais;
	
	public function __construct($IdProvincia = NULL, $Nombre, Pais $Pais){
		$this->IdProvincia = $IdProvincia;
		$this->Nombre = $Nombre;
		$this->Pais = $Pais;
	}
}
?>