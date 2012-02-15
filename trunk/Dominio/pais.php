<?php
class Pais
{
	public $IdPais;
	public $Nombre;
	
	public function __construct($IdPais, $Nombre){
		$this->IdPais = $IdPais;
		$this->Nombre = $Nombre;
	}
}