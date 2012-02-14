<?php
include 'usuario.php';
include 'medico.php';
include 'sucursal.php';
class Turno
{
	public $IdTurno;
	public $Fecha;
	public $horaInicio;
	public $horaFin;
	public $Medico;
	public $Usuario;
	public $Sucursal;
	public $Estado;
	
	public function __construct($IdTurno, $Fecha, $horaInicio, $horaFin, Medico $Medico, Usuario $Usuario, $Estado,Sucursal $Sucursal)
	{
		$this->IdTurno = $IdTurno;
		$this->Fecha = $Fecha;
		$this->horaInicio = $horaInicio;
		$this->horaFin = $horaFin;
		$this->Medico = $Medico;
		$this->Usuario = $Usuario;
		$this->Estado = $Estado;
		$this->Sucursal = $Sucursal;
	}
}