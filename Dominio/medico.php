<?php
include 'usuario.php';
include 'especialidad.php';
class Medico extends Usuario
{
	public $Especialidad;

	public function __construct($IdUsuario,$Nombre,$Email,$Pass,Localidad $Localidad,array $ListaEspecialidades)
	{
		$this->IdUsuario = $IdUsuario;
		$this->Nombre = $Nombre;
		$this->Email = $Email;
		$this->Password = $Pass;
		$this->Localidad = $Localidad;
		$this->Especialidad=$ListaEspecialidades;
	}
}

?>