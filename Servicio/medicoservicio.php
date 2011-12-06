<?php
if($_POST){
	echo "algo";
}

include_once '../Dominio/medico.php';
include_once '../Repositorio/medicoRepositorio.php';
class MedicoServicio{
    private $profesionalRepo;
    
    public function __construct()
    {
        $this->profesionalRepo = new ProfesionalRepositorio();
    }
    
    public function Agregar(Profesional $Profesional){
        $this->profesionalRepositorio->Agregar($Profesional);
    }
    
    public function Modificar(Profesional $Profesional){
        $this->profesionalRepositorio->Modificar($Profesional);
    }
    
    public function Buscar($DniCuitCuil){
        return $this->profesionalRepositorio->Buscar($DniCuitCuil);
    }
    
    public function Listar(){
        return $this->profesionalRepositorio->Listar();
    }
    public function ListarPorEspecialidadLocalidad($Especialidad,$Localidad)
    {
    	return $this->ListarPorEspecialidadLocalidad($Especialidad, $Localidad);
    }
}

?>