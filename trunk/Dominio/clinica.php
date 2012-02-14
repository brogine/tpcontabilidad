<?php
class Clinica
{
	public $IdClinica;
	public $Nombre;
	public $Email;
	public $Web;
	
	public function __construct($IdClinica, $Nombre,$Email,$Web){
		$this->IdClinica = $IdClinica;
		$this->Nombre = $Nombre;
		$this->Email = $Email;
		$this->Web= $Web;
	}
}
?>