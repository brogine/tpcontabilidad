<?php

include_once 'Conexion/conexion.php';
include_once '../../Dominio/cliente.php';

class PacienteRepositorio{
	private $Conexion;
	private $PersonaRepo;
	
	public function __construct(){
		$this->Conexion = new Conexion();
	}
	
	public function Agregar(Paciente $Paciente){
		/*
		$Parametros[0]="'".$Cliente->DniCuitCuil."'";
		$Parametros[1]="'".$Cliente->Apellido."'";
		$Parametros[2]="'".$Cliente->Nombre."'";
		$Parametros[3]="'".$Cliente->Password."'";
		$Parametros[4]="'".$Cliente->Contacto->Email."'";
		$Parametros[5]="'".$Cliente->Contacto->Telefono."'";
		
		$this->Conexion->StoreProcedureSinRetorno('PersonasAlta', $Parametros[0].",".$Parametros[1].",".$Parametros[2].",".
		$Parametros[3].",".$Parametros[4].",".$Parametros[5]);
		*/
		$this->Conexion->ConsultaSinRetorno(" Insert Into Personas (Apellido, Nombre, Email, Telefono) Values ('$Paciente->Apellido','$Paciente->Nombre','$Paciente->Contacto->Email','$Paciente->Contacto->Telefono') ");
		$this->Conexion->ConsultaSinRetorno(" Insert Into Login (Email, Pass) Values ('$Paciente->Login->Email', '$Paciente->Login->Pass') ");
    }
    
    public function Modificar(Paciente $Paciente){
    	/*
    	$Parametros[0]="'".$Cliente->DniCuitCuil."'";
		$Parametros[1]="'".$Cliente->Apellido."'";
		$Parametros[2]="'".$Cliente->Nombre."'";
		$Parametros[3]="'".$Cliente->Password."'";
		$Parametros[4]="'".$Cliente->Contacto->Email."'";
		$Parametros[5]="'".$Cliente->Contacto->Telefono."'";
		
		$this->Conexion->StoreProcedureSinRetorno('PersonasMod', $Parametros[0].",".$Parametros[1].",".$Parametros[2].",".
		$Parametros[3].",".$Parametros[4].",".$Parametros[5]);
		*/
    	
    	$this->Conexion->ConsultaSinRetorno(" Update Personas Set Apellido = '$Paciente->Apellido', Nombre = '$Paciente->Nombre', Telefono = '$Paciente->Contacto->Telefono' Where IdPersona = $Paciente->IdPersona ");
    	$this->Conexion->ConsultaSinRetorno(" Update Login Set Pass = '$Paciente->Login->Pass' Where Email = '$Paciente->Login->Email' ");
    }
    
    public function Buscar($DniCuitCuil){
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