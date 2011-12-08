<?php
if($_POST){
}

include_once '../../Dominio/medico.php';
include_once '../../Repositorio/medicoRepositorio.php';
class MedicoServicio{
    private $MedicoRepo;
    
    public function __construct()
    {
        $this->MedicoRepo = new MedicoRepositorio();
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
    	
    	return $this->MedicoRepo->ListarPorEspecialidadYLocalidad($Localidad, $Especialidad);
    }
}

?>