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
	    $result = $this->Conexion->ConsultaConRetorno(" SELECT IdMedico, horaInicio, horaFin, 
	    					diaSemana, duracion FROM horarios WHERE IdMedico = " . $IdPersona);
        while ($DataRow = mysqli_fetch_array($result)){
        	$lista[$i] = $this->Mapear($DataRow);
        	$i++;
        }
        return $lista;
    }
	
	private function Mapear($Datarow)
	{
		include_once 'medicorepositorio.php';
		$MedRepo = new MedicoRepositorio();
		$Medico = $MedRepo->Buscar($Datarow['IdMedico']);
		
		$HoraInicio = $Datarow['horaInicio'];
		$HoraFin = $Datarow['horaFin'];
		$DiaSemana = $Datarow['diaSemana'];
		$Duracion = $Datarow['duracion'];
		
		$horario = new Horario($Medico, $HoraInicio, $HoraFin, $DiaSemana, $Duracion);
	    return $horario;
	}
}

?>