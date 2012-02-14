<?php
include 'pais.php';
class Provincia
{
	public $IdProvincia;
	public $Nombre;
	public $Pais;
	
	public function __construct($IdProvincia, $Nombre, Pais $Pais){
		$this->IdProvincia = $IdProvincia;
		$this->Nombre = $Nombre;
		$this->Pais = $Pais;
	}
}
?>