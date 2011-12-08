<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/persona.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/contacto.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/login.php';
class Paciente extends Persona
{
	public $Login;
	
	public function __construct($IdPersona = NULL, $Apellido, $Nombre, Contacto $Contacto, Login $Login){
		$this->IdPersona = $IdPersona;
		$this->Apellido = $Apellido;
		$this->Nombre = $Nombre;
		$this->Contacto = $Contacto;
		$this->Login = $Login;
	}
}
?>