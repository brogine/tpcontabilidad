<?php
include_once '../Dominio/profesional.php';
include_once '../Repositorio/profesionalRepositorio.php';
class ProfesionalServicio{
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
}

?>