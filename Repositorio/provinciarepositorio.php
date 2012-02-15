<?php
include 'Conexion/conexion.php';
include $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/provincia.php';

class ProvinciaRepositorio{
	private $Conexion;
	
	public function __construct(){
		$this->Conexion = new Conexion();
	}
	
	public function Agregar(Provincia $Provincia){
		$this->Conexion->ConsultaSinRetorno(" Insert Into Provincias (Nombre, IdPais) Values ('" . $Provincia->Nombre . "', " . $Provincia->Pais->IdPais . ") ");
    }
    
    public function Modificar(Provincia $Provincia){
        $this->Conexion->ConsultaSinRetorno(" Update Provincias Set Nombre = '" . $Provincia->Nombre . "' Where IdProvincia = " . $Provincia->IdProvincia);
    }
    
    public function Buscar($IdProvincia){
        $result = $this->Conexion->ConsultaConRetorno(" Select * From Provincias Where IdProvincia = " . $IdProvincia);
    	$DataRow = mysqli_fetch_array($result);
        return $this->Mapear($DataRow);
    }
    
    public function Listar(){
    	$lista = array();
    	$i = 0;
        $result = $this->Conexion->ConsultaConRetorno(" Select * From Provincias ");
        while ($DataRow = mysqli_fetch_array($result)){
        	$lista[$i] = $this->Mapear($DataRow);
        	$i++;
        }
        return $lista;
    }
    
    private function Mapear($DataRow){
    	include_once 'paisrepositorio.php';
    	$PaisRepo = new PaisRepositorio();
    	$Pais = $PaisRepo->Buscar($DataRow['IdPais']);
    	$Provincia = new Provincia($DataRow['IdProvincia'], $DataRow['Nombre'], $Pais);
		return $Provincia;
    }
}

?>