<?php
class Medico extends Persona
{
	public $Clinica;
	public $Especialidad;

	public function __construct($IdPersona = NULL, $Apellido, $Nombre, Contacto $Contacto, Clinica $Clinica, Especialidad $Especialidad){
		$this->IdPersona = $IdPersona;
		$this->Apellido = $Apellido;
		$this->Nombre = $Nombre;
		$this->Contacto = $Contacto;
		$this->Clinica = $Clinica;
		$this->Especialidad = $Especialidad;
	}
}

?>