<?php

include_once 'Conexion/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/usuario.php';

class PacienteRepositorio{
	private $Conexion;
	private $PersonaRepo;
	
	public function __construct(){
		$this->Conexion = new Conexion();
	}
	
	public function Agregar(Usuario $Usuario){
		$Nombre=$Usuario->Nombre;
		$Email = $Usuario->Email;
		$Pass = $Usuario->Password;
		$Localidad = $Usuario->Localidad->IdLocalidad;
		$Consulta = "Insert Into Usuarios(Nombre,Email,Pass,IdLocalidad) values ($Nombre,$Email,$Pass,$Localidad)";
		$this->Conexion->ConsultaSinRetorno($Consulta);
	}
    
    public function Modificar(Usuario $Usuario){
		$Nombre=$Usuario->Nombre;
		$Email = $Usuario->Email;
		$Pass = $Usuario->Password;
		$Localidad = $Usuario->Localidad->IdLocalidad;
		$Consulta = "Update Usuarios set Nombre=$Nombre,Email=$Email,Pass=$Pass,IdLocalidad=$Localidad";
		$this->Conexion->ConsultaSinRetorno($Consulta);
    }
    
    public function Buscar($IdUsuario)
    {
    	 $this->Conexion->ConsultaConRetorno("Select * from Usuarios where IdUsuario = $IdUsuario");
    	
    	$DataRow = mysqli_fetch_array($result);
    	return $this->Mapear($DataRow);
    }
    
    public function Listar(){
    	$lista = array();
    	$i = 0;
        $result = $this->Conexion->ConsultaConRetorno("Select * from Usuarios");
        while ($DataRow = mysqli_fetch_array($result)){
        	$lista[$i] = $this->Mapear($DataRow);
        	$i++;
        }
        return $lista;
    }
    
    private function Mapear($DataRow){
			
    	$LocalidadRepositorio = new LocalidadRepositorio();
		$Localidad = $LocalidadRepositorio->Buscar($DataRow['IdLocalidad']);
		$Usuario = new Usuario($DataRow['IdUsuario'],$DataRow['Nombre'],$DataRow['Email'],$DataRow['Pass'],$Localidad);
       	return $Usuario;
    }
}

?>