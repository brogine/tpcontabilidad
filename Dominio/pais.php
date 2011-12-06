<?php
class Pais
{
	public $IdPais;
	public $Nombre;
	
	public function __construct($IdPais = NULL, $Nombre){
		$this->IdPais = $IdPais;
		$this->Nombre = $Nombre;
	}
}