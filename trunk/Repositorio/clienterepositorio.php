<?php

include_once 'Conexion/conexion.php';
include_once '../Dominio/cliente.php';

class ClienteRepositorio{
	private $Conexion;
	private $PersonaRepo;
	
	public function __construct(){
		$this->Conexion = new Conexion();
	}
	
	public function Agregar(Cliente $Cliente){
		$this->Conexion->StoreProcedureSinRetorno($StoreProcedure, $Parametros);
    }
    
    public function Modificar(Cliente $Cliente){
        $this->Conexion->StoreProcedureSinRetorno($StoreProcedure, $Parametros);
    }
    
    public function Buscar($DniCuitCuil){
    	$result = $this->Conexion->StoreProcedureConRetorno($StoreProcedure, $DniCuitCuil);
    	$DataRow = mysqli_fetch_array($result);
        return $this->Mapear($DataRow);
    }
    
    public function Listar(){
    	$lista = array();
    	$i = 0;
        $result = $this->Conexion->StoreProcedureConRetorno($StoredProdedure);
        while ($DataRow = mysqli_fetch_array($result)){
        	$lista[$i] = $this->Mapear($DataRow);
        	$i++;
        }
        return $lista;
    }
    
    private function Mapear($DataRow){
    	//$contactoRepo = new ContactoRepositorio();
    	$contacto = new Contacto();
    	//$ubicacionRepo = new UbicacionRepositorio();
    	$ubicacion = new Ubicacion();
    	//$obraSocialRepo = new ObraSocialRepositorio();
    	$obraSocial = new ObraSocial();
    	$PersonaRepo = new PersonaRepositorio();
    	
		$cliente = new Cliente($DataRow['Apellido'], $DataRow['Nombre'], $DataRow['DniCuitCuil'], $DataRow['Password'], $contacto, $ubicacion, $obraSocial);
		return $cliente;
    }
}

?>