<?php
class Horario
{
	public $Medico;
	public $HoraInicio;
	public $HoraFin;
	public $DiaSemana;
	
	public function __construct(Medico $Medico, $HoraInicio, $HoraFin, $DiaSemana){
		$this->Medico = $Medico;
		$this->HoraInicio = $HoraInicio;
		$this->HoraFin = $HoraFin;
		$this->DiaSemana = $DiaSemana;
	}
}