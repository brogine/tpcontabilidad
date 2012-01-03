<?php

include_once '../../Dominio/medico.php';
include_once '../../Repositorio/medicoRepositorio.php';
class MedicoServicio{
    private $MedicoRepo;
    
    public function __construct()
    {
        $this->MedicoRepo = new MedicoRepositorio();
    }
    
    public function Agregar(Medico $Medico){
        $this->MedicoRepo->Agregar($Medico);
    }
    
    public function Modificar(MEdico $Medico){
        $this->MedicoRepo->Modificar($Medico);
    }
    
    public function Buscar($DniCuitCuil){
        return $this->MedicoRepo->Buscar($DniCuitCuil);
    }
    
    public function Listar(){
        return $this->MedicoRepo->Listar();
    }
    
    public function ListarPorEspecialidadLocalidad($Especialidad,$Localidad)
    {
    	return $this->MedicoRepo->ListarPorEspecialidadYLocalidad($Localidad, $Especialidad);
    }
    
	public function ListarPorClinica($idClinica){
    	return $this->MedicoRepo->ListarPorClinica($idClinica);
    }
}

?>