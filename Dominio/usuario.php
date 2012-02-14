<?php
class Usuario {
	public $IdUsuario;
	public $Nombre;
	public $Email;
	public $Password;
	public $Localidad;
	
	public function	__construct($IdUsuario,$Nombre,$Email,$Password,Localidad $Localidad)
		{
			$this->IdUsuario=$IdUsuario;
			$this->Nombre=$Nombre;
			$this->Email=$Email;
			$this->Password=$Password;
			$this->Localidad=$Localidad;
		}

	
}

?>