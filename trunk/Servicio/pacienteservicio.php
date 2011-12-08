<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Repositorio/pacienterepositorio.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/paciente.php';
class PacienteServicio{
    private $PacienteRepo;
    
    public function __construct(){
        $this->PacienteRepo = new PacienteRepositorio();
       
    }
    
    public function Agregar(Paciente $Paciente){
       $this->PacienteRepo->Agregar($Paciente);
    }
    
    public function Modificar(Paciente $Paciente){
        $this->PacienteRepo->Modificar($Paciente);
    }
    
    public function Buscar($IdPaciente){
       $Paciente = $this->PacienteRepo->Buscar($IdPaciente);
    return $Paciente;    
    }
    
    public function Listar(){
        return $this->PacienteRepo->Listar();
    }
    
}

?>