<?php
include 'usuario.php';
include 'especialidad.php';
class Medico extends Usuario
{
	public $Especialidad;

	public function __construct($IdUsuario,$Nombre,$Email,$Pass,array $ListaEspecialidades)
	{
		$this->IdUsuario = $IdUsuario;
		$this->Nombre = $Nombre;
		$this->Email = $Email;
		$this->Password = $Pass;
		$this->Especialidad=$ListaEspecialidades;
	}
}

?>