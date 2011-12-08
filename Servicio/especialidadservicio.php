<?php
include_once '../../Repositorio/especialidadrepositorio.php';
include_once '../../Dominio/especialidad.php';

class EspecialidadServicio
{
	private $EspRep;
	
	public function __construct(){
        $this->EspRep = new EspecialidadRepositorio();
    }
	
	public function Agregar(Especialidad $Especialidad)
	{
		
		$this->EspRep->Agregar($Especialidad);
	}
	public function Modificar(Especialidad $Especialidad)
	{
		$this->EspRep->Modificar($Especialidad);
	}
	
	public function Buscar($IdEspecialidad)
	{
		$this->EspRep->Buscar($idEspecialidad);
	}
	
	public function Listar()
	{
		return $this->EspRep->Listar();
	}
	
	
}
?>