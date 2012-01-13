<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Repositorio/Conexion/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/turno.php';
class TurnoRepositorio{
	private $Conexion;
	
	public function __construct(){
		$this->Conexion = new Conexion();
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
	
	public function ListarMedico($IdMedico){
        $lista = array();
	    $result = $this->Conexion->ConsultaConRetorno(" SELECT IdTurno, Fecha, IdMedico, IdPaciente, 
	    												Estado, horaInicio, horaFin FROM turnos
	    												WHERE IdMedico = " . $IdMedico);
        while ($DataRow = mysqli_fetch_array($result)){
        	$lista[$i] = $this->Mapear($DataRow);
        	$i++;
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
		$turno->idTurno = $Datarow['IdTurno'];
		
		$pacienteRepo = new PacienteRepositorio();
		$turno->Paciente = $pacienteRepo->Buscar($Datarow['IdPaciente']);
		
		$medicoRepo = new MedicoRepositorio();
		$turno->Medico = $medicoRepo->Buscar($Datarow['IdMedico']);
		
		$turno->Fecha = $Datarow['Fecha'];
		$turno->horaFin = $Datarow['horaFin'];
		$turno->horaInicio = $Datarow['horaInicio'];
		
	    $turno->Estado = $Datarow['Estado'];
	    return $turno;
	}
}

?>