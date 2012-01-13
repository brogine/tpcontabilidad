<?php
class Turno
{
	public $IdTurno;
	public $Fecha;
	public $horaInicio;
	public $horaFin;
	public $Medico;
	public $Paciente;
	public $Estado;
	
	public function __construct($IdTurno = NULL, $Fecha, $horaInicio, $horaFin, Medico $Medico, Paciente $Paciente, $Estado){
		$this->IdTurno = $IdTurno;
		$this->Fecha = $Fecha;
		$this->horaInicio = $horaInicio;
		$this->horaFin = $horaFin;
		$this->Medico = $Medico;
		$this->Paciente = $Paciente;
		$this->Estado = $Estado;
	}
}