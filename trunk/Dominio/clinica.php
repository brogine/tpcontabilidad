<?php
class Clinica
{
	public $IdClinica;
	public $Nombre;
	public $Ubicacion;
	public $Contacto;
	public $Foto;
	public $Login;
	
	public function __construct($IdClinica = null, $Nombre, Ubicacion $Ubicacion, Contacto $Contacto, $Foto = null, Login $Login){
		$this->IdClinica = $IdClinica;
		$this->Nombre = $Nombre;
		$this->Ubicacion = $Ubicacion;
		$this->Contacto = $Contacto;
		$this->Foto = $Foto;
		$this->Login = $Login;
	}
}
?>