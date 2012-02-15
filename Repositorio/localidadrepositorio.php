<?php
include 'Conexion/conexion.php';
include $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/localidad.php';

class LocalidadRepositorio{
	private $Conexion;
	
	public function __construct(){
		$this->Conexion = new Conexion();
	}
	
	public function Agregar(Localidad $Localidad){
		$this->Conexion->ConsultaSinRetorno(" Insert Into Localidades (Nombre, IdProvincia) Values ('" . $Localidad->Nombre . "', " . $Localidad->Provincia->IdProvincia . ") ");
    }
    
    public function Modificar(Localidad $Localidad){
        $this->Conexion->ConsultaSinRetorno(" Update Localidades Set Nombre = '" . $Localidad->Nombre . "' Where IdLocalidad = " . $Localidad->IdLocalidad);
    }
    
    public function Buscar($IdLocalidad){
        $result = $this->Conexion->ConsultaConRetorno(" Select * From Localidades Where IdLocalidad = " . $IdLocalidad);
    	$DataRow = mysqli_fetch_array($result);
        return $this->Mapear($DataRow);
    }
    
    public function Listar(){
    	$lista = array();
    	$i = 0;
        $result = $this->Conexion->ConsultaConRetorno(" Select * From Localidades ");
        while ($DataRow = mysqli_fetch_array($result)){
        	$lista[$i] = $this->Mapear($DataRow);
        	$i++;
        }
        return $lista;
    }
    
    private function Mapear($DataRow){
    	include_once 'provinciarepositorio.php';
    	$ProvinciaRepo = new ProvinciaRepositorio();
    	$Provincia = $ProvinciaRepo->Buscar($DataRow['IdProvincia']);
    	$Localidad = new Localidad($DataRow['IdLocalidad'], $DataRow['Nombre'], $Provincia);
		return $Localidad;
    }
}

?>