<?php
include_once 'Conexion/conexion.php';
include_once '../Dominio/turno.php';
class TurnoRepositorio{
	
	private $Conexion;
	function __construct(){
		$Conexion = new Conexion();
	}
	
	public function Agregar(Turno $Turno)
	{
		$parametros = array();
	    $this->Conexion->StoreProcedureSinRetorno('TurnosAlta',$parametros); 
	}
	
	public function Modificar(Turno $Turno)
	{
	    $parametros = array();
	    $this->Conexion->StoreProcedureSinRetorno('TurnosMod',$parametros); 
	}
	
	public function Buscar($idTurno)
	{
		$tabla = $this->conexion->StoreProcedureConRetorno('TurnosBuscar', $idTurno);
		$datarow = mysqli_fetch_array($tabla);
		return $this->Mapear($datarow);
	}
	
	public function Borrar($idTurno)
	{
	    $this->conexion->StoreProcedureSinRetorno('TurnosBorrar', $idTurno);
	}
	
	public function ListarProfesional($DniCuitCuil){
        $lista = array();
	    $result = $this->conexion->StoreProcedureConRetorno('TurnosListarProfesional', $DniCuitCuil);
	    while($Datarow=mysql_fetch_array($result))
    	{
			$lista[i]=$this->Mapear($Datarow);
    	}
	    
	    return $lista;
    }
    
    public function ListarCliente($DniCuitCuil){
    	$lista = array();
	    $result = $this->conexion->StoreProcedureConRetorno('TurnosListarCliente', $DniCuitCuil);
	    while($Datarow=mysql_fetch_array($result))
    	{
			$lista[i]=$this->Mapear($Datarow);
    	}
	    
	    return $lista;
    }
	
	public function Mapear($Datarow)
	{
		$turno = new Turno();
		$turno->idTurno = $Datarow['idTurno'];
		
		$clienteRepo = new ClienteRepositorio();
		$turno->Cliente = $clienteRepo->Buscar($Datarow['DniCliente']);

		$profesionalRepo = new ProfesionalRepositorio();
		$turno->Profesional = $profesionalRepo->Buscar($Datarow['DniProfesional']);
		
		$diaHorarios = new DiasHorarios();
		$diaHorarios->__construct1($Datarow['DiaSemana'], 
			$Datarow['horaDesde'], $Datarow['horaHasta'], $Datarow['Duracion']);
		
	    $profesional->Estado = $Datarow['Estado'];
	    return $profesional;
	}
}

?>