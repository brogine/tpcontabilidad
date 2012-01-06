<?php
include_once 'Conexion/conexion.php';
include_once '../../Dominio/horario.php';
class HorarioRepositorio{
	
	private $Conexion;
	function __construct(){
		$Conexion = new Conexion();
	}
	
	public function Agregar(Horario $Horario)
	{
		$this->Conexion->ConsultaSinRetorno(" INSERT INTO horarios (IdMedico, horaInicio, horaFin, diaSemana, duracion)
												VALUES (".$Horario->Medico->IdPersona.",'".$Horario->HoraInicio."','".$Horario->HoraFin)."',
												".$Horario->DiaSemana.",".$Horario->Duracion.")";
	}
	
	public function ListarPorMedico($IdPersona){
        $lista = array();
	    $result = $this->conexion->StoreProcedureConRetorno('TurnosListarProfesional', $IdPersona);
	    while($Datarow=mysql_fetch_array($result))
    	{
			$lista[i]=$this->Mapear($Datarow);
    	}
	    
	    return $lista;
    }
	
	private function Mapear($Datarow)
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