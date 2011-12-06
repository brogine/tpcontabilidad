<?php
class Turno
{
	public $IdTurno;
	public $Fecha;
	public $Medico;
	public $Paciente;
	public $Estado;
	
	public function __construct($IdTurno = NULL, $Fecha, Medico $Medico, Paciente $Paciente, $Estado){
		$this->IdTurno = $IdTurno;
		$this->Fecha = $Fecha;
		$this->Medico = $Medico;
		$this->Paciente = $Paciente;
		$this->Estado = $Estado;
	}
}