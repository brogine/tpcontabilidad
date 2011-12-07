<?php
include_once 'Conexion/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/clinica.php';

class ClinicaRepositorio{
	private $Conexion;
	
	public function __construct(){
		$this->Conexion = new Conexion();
	}
	
	public function Agregar(Clinica $Clinica){
		$Consulta = " Insert Into clinicas (Nombre, idLocalidad, Telefono, Email, Domicilio, Foto) Values ('".$Clinica->Nombre."', ".$Clinica->Ubicacion->Localidad->IdLocalidad.", '".$Clinica->Contacto->Telefono."', '".$Clinica->Contacto->Email."', '".$Clinica->Ubicacion->Domicilio."', '".$Clinica->Foto."') ";
		$Consulta .= " Insert Into login (Email, Pass) Values ('".$Clinica->Login->Email."', '".$Clinica->Login->Password."') ";
		if($this->Conexion->MultipleConsulta($Consulta)) {
			return mysqli_insert_id();
		}
		else {
			return $Consulta." No se pudo agregar la clinica";
		}
    }
    
    public function Modificar(Clinica $Clinica){
    	$Consulta = " Update Clinicas Set Nombre = '$Clinica->Nombre', IdLocalidad = $Clinica->Ubicacion->Localidad->IdLocalidad, Telefono = '$Clinica->Contacto->Telefono', Domicilio = '$Clinica->Ubicacion->Domicilio', Foto = '$Clinica->Foto' Where IdClinica = $Clinica->IdClinica ";
    	$Consulta .= " Update Login Set Pass = '$Clinica->Login->Pass' Where IdClinica = $Clinica->IdClinica ";
    	$this->Conexion->MultipleConsulta($Consulta);
    }
    
    public function Buscar($idClinica){
        //$result = $this->Conexion->StoreProcedureConRetorno($StoreProcedure, $idRubro);
    	$result = $this->Conexion->ConsultaConRetorno(" Select C.*, L.Pass From Clinica C Inner Join Login L On C.Email = L.Email Where C.IdClinica = $idClinica ");
    	$DataRow = mysqli_fetch_array($result);
        return $this->Mapear($DataRow);
    }
    
    public function Listar(){
    	$lista = array();
    	$i = 0;
        //$result = $this->Conexion->StoreProcedureConRetorno('RubrosList');
        $result = $this->Conexion->ConsultaConRetorno(" Select C.*, L.Pass From Clinica C Inner Join Login L On C.Email = L.Email ");
        while ($DataRow = mysqli_fetch_array($result)){
        	$lista[$i] = $this->Mapear($DataRow);
        	$i++;
        }
        return $lista;
    }
    
    private function Mapear($DataRow){
    	$repoUbicacion = new UbicacionRepositorio();
    	$Localidad = $repoUbicacion->BuscarLocalidad($DataRow['IdLocalidad']);
    	$Ubicacion = new Ubicacion($Localidad, $DataRow['Domicilio']);
    	
    	$Contacto = new Contacto($DataRow['Email'], $DataRow['Telefono']);
    	
    	$Login = new Login($DataRow['Email'], $DataRow['Password']);
    	
		$Clinica = new Clinica($DataRow['IdClinica'], $DataRow['Nombre'], $Ubicacion, $Contacto, $DataRow['Foto'], $Login);
		return $Clinica;
    }
}

?>