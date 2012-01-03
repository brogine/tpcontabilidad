<?php
include_once '../../Repositorio/horariorepositorio.php';
include_once '../../Dominio/horario.php';

class HorarioServicio
{
	private $HorarioRep;
	
	public function __construct(){
        $this->HorarioRep = new HorarioRepositorio();
    }
	
	public function Agregar(Horario $Horario)
	{
		$this->HorarioRep->Agregar($Horario);
	}
	
	public function ListarPorMedico($IdPersona)
	{
		return $this->HorarioRep->ListarPorMedico($IdPersona);
	}
	
	
}
?>