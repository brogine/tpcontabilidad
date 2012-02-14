<?php
include 'sucursal.php';
class Horario
{
	public $Medico;
	public $Sucursal;
	public $HoraInicio;
	public $HoraFin;
	public $DiaSemana;
	public $Duracion;
	public $Estado;
	
	public function __construct(Medico $Medico, $HoraInicio, $HoraFin, $DiaSemana, $Duracion, Sucursal $Sucursal, $Estado)
	{
		$this->Medico = $Medico;
		$this->HoraInicio = $HoraInicio;
		$this->HoraFin = $HoraFin;
		$this->DiaSemana = $DiaSemana;
		$this->Duracion = $Duracion;
		$this->Sucursal = $Sucursal;
		$this->Estado = $Estado;
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