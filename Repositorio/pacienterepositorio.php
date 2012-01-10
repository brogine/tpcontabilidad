<?php

include_once 'Conexion/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/paciente.php';

class PacienteRepositorio{
	private $Conexion;
	private $PersonaRepo;
	
	public function __construct(){
		$this->Conexion = new Conexion();
	}
	
	public function Agregar(Paciente $Paciente){
		$Email =(string)$Paciente->Contacto->Email;
		$Telefono=(string)$Paciente->Contacto->Telefono;
		$Pass = (string)$Paciente->Login->Password;
		$Consulta =" Insert Into Login (Email, Pass) Values ('$Email', '$Pass'); ";
		$Consulta .= "Insert Into Personas (Apellido, Nombre, Email, Telefono) Values ('$Paciente->Apellido','$Paciente->Nombre','$Email','$Telefono');";
		if($this->Conexion->MultipleConsulta($Consulta)) {
			return true;
		}
		else {
			return false;
		}
	}
    
    public function Modificar(Paciente $Paciente){

    	
    	$this->Conexion->ConsultaSinRetorno(" Update Personas Set Apellido = '$Paciente->Apellido', Nombre = '$Paciente->Nombre', Telefono = '$Paciente->Contacto->Telefono' Where IdPersona = $Paciente->IdPersona ");
    	$this->Conexion->ConsultaSinRetorno(" Update Login Set Pass = '$Paciente->Login->Pass' Where Email = '$Paciente->Login->Email' ");
    }
    
    public function Buscar($IdPaciente){
    	//$result = $this->Conexion->StoreProcedureConRetorno('PersonasBuscar', "'".$DniCuitCuil."'");
    	$this->Conexion->ConsultaConRetorno(" Select P.*, L.Pass From Persona P Inner Join Login L On P.Email = L.Email Where ");
    	
    	$DataRow = mysqli_fetch_array($result);
    	return $this->Mapear($DataRow);
    }
    
    public function Listar(){
    	$lista = array();
    	$i = 0;
        //$result = $this->Conexion->StoreProcedureConRetorno($StoredProdedure);
        $result = $this->Conexion->ConsultaConRetorno(" Select P.*, L.Pass From Persona P Inner Join Login L On P.Email = L.Email ");
        while ($DataRow = mysqli_fetch_array($result)){
        	$lista[$i] = $this->Mapear($DataRow);
        	$i++;
        }
        return $lista;
    }
    
    private function Mapear($DataRow){
    	
    	$Contacto = new Contacto($DataRow['Email'], $DataRow['Telefono']);
    	$Login = new Login($DataRow['Email'], $DataRow['Pass']);
    	
    	$Paciente = new Paciente($DataRow['IdPersona'], $DataRow['Apellido'], $DataRow['Nombre'], $Contacto, $Login);
		return $Paciente;
    }
}

?>