<?php

include_once 'Conexion/conexion.php';
include_once '../../Dominio/cliente.php';

class ClienteRepositorio{
	private $Conexion;
	private $PersonaRepo;
	
	public function __construct(){
		$this->Conexion = new Conexion();
	}
	
	public function Agregar(Cliente $Cliente){
		$Parametros[0]=$Cliente->DniCuitCuil;
		$Parametros[1]=$Cliente->Apellido;
		$Parametros[2]=$Cliente->Nombre;
		$Parametros[3]=$Cliente->Password;
		$Parametros[4]=$Cliente->Contacto->Email;
		$Parametros[5]=$Cliente->Contacto->Telefono;
		
		$this->Conexion->StoreProcedureSinRetorno('Prueba', $Parametros);
    }
    
    public function Modificar(Cliente $Cliente){
    	$Parametros[0]=$Cliente->DniCuitCuil;
		$Parametros[1]=$Cliente->Apellido;
		$Parametros[2]=$Cliente->Nombre;
		$Parametros[3]=$Cliente->Password;
		$Parametros[4]=$Cliente->Contacto->Email;
		$Parametros[5]=$Cliente->Contacto->Telefono;
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
    	$PersonaRepo = new PersonaRepositorio();
    	$contacto = new Contacto($DataRow['Telefono'], $DataRow['Celular'], $DataRow['Email']);
        $UbicaRepo = new UbicacionRepositorio();
    	$Localidad = $UbicaRepo->BuscarLocalidad($DataRow['IdLocalidad']);
    	$ubicacion = new Ubicacion($Localidad, $domicilio);
    	$cliente = new Cliente($DataRow['Apellido'], $DataRow['Nombre'], $DataRow['DniCuitCuil'], $DataRow['Password'], $contacto, $ubicacion, $obraSocial);
    	$PersonaRepo->CompletarDatosPersonalesBasicos($cliente, $DataRow);
		return $cliente;
    }
}

?>