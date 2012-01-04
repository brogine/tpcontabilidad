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
		$resultado = "";
		for($i = 0;$i < 7; $i++){
			$resto = $valor % 2;
			$valor = $valor / 2;
			$resultado = $resto . $resultado;
		}
		return $resultado;
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
		$resultado = 0;
		for($i = 0;$i < 7; $i++){
			$factor = (2 ^ $i) * $resultado[$i];
			$resultado += $factor;
		}
		return $resultado;
	}
}