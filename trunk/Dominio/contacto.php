<?php
class Contacto
{
	public $Email;
	public $Telefono;
	
	public function __construct($Email, $Telefono){
		$this->Email = $Email;
		$this->Telefono = $Telefono;
	}
}
?>