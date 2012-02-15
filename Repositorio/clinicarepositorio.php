<?php
include_once 'Conexion/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/clinica.php';

class ClinicaRepositorio{
	private $Conexion;
	
	public function __construct(){
		$this->Conexion = new Conexion();
	}
	
	public function Agregar(Clinica $Clinica)
	{
	$Nombre=$Clinica->Nombre;
	$Email=$Clinica->Email;
	$Web=$Clinica->Web;
	$Consulta="Insert Into Clinicas(Nombre,Email,Web) values ($Nombre,$Email,$Web)";
	$this->Conexion->ConsultaSinRetorno($Consulta);	
    }
    
    public function Modificar(Clinica $Clinica)
    {
    $IdClinica=$Clinica->IdClinica;	
    $Nombre=$Clinica->Nombre;
	$Email=$Clinica->Email;
	$Web=$Clinica->Web;
	$Consulta="Update Clinicas Set Nombre=$Nombre,Email=$Email,Web=$Web where IdClinica= $IdClinica";
	$this->Conexion->ConsultaSinRetorno($Consulta);	
    }
    
    public function Buscar($idClinica){
        //$result = $this->Conexion->StoreProcedureConRetorno($StoreProcedure, $idRubro);
    	$result = $this->Conexion->ConsultaConRetorno("Select * From Clinicas Where IdClinica=$idClinica");
    	if($result){
    		$DataRow = mysqli_fetch_array($result);
        	return $this->Mapear($DataRow);
    	}
    	else{
    		return null;
    	}
    }
    
    public function Listar()
    {
    	$lista = array();
    	$i = 0;
        $result = $this->Conexion->ConsultaConRetorno(" Select * from Clinicas ");
        while ($DataRow = mysqli_fetch_array($result))
        {
        	$lista[$i] = $this->Mapear($DataRow);
        	$i++;
        }
        return $lista;
    }
    
    private function Mapear($DataRow)
    {
    	   	
    	$Clinica = new Clinica($DataRow['IdClinica'], $DataRow['Nombre'],$DataRow['Email'],$DataRow['Web']);
		return $Clinica;
    }
}

?>