<?php
class Horario
{
	public $Medico;
	public $HoraInicio;
	public $HoraFin;
	public $DiaSemana;
	public $Duracion;
	
	public function __construct(Medico $Medico, $HoraInicio, $HoraFin, $DiaSemana, $Duracion){
		$this->Medico = $Medico;
		$this->HoraInicio = $HoraInicio;
		$this->HoraFin = $HoraFin;
		$this->DiaSemana = $DiaSemana;
		$this->Duracion = $Duracion;
	}
	
	public function DiaSemanaToForm($valor) {
		return decbin($valor);
	}
	
	public function DiaSemanaToSql($valor){
		$binarios = "";
		if (strpos($valor, 'Lun')) {
			$binarios .= "1";
		}
		else {
			$binarios .= "0";
		}
		if (strpos($valor, 'Mar')) {
			$binarios .= "1";
		}
		else {
			$binarios .= "0";
		}
		if (strpos($valor, 'Mie')) {
			$binarios .= "1";
		}
		else {
			$binarios .= "0";
		}
		if (strpos($valor, 'Jue')) {
			$binarios .= "1";
		}
		else {
			$binarios .= "0";
		}
		if (strpos($valor, 'Vie')) {
			$binarios .= "1";
		}
		else {
			$binarios .= "0";
		}
		if (strpos($valor, 'Sab')) {
			$binarios .= "1";
		}
		else {
			$binarios .= "0";
		}
		if (strpos($valor, 'Dom')) {
			$binarios .= "1";
		}
		else {
			$binarios .= "0";
		}
		return bindec($binarios);
	}
}