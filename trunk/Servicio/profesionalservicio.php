<?php
include_once '../Dominio/profesional.php';
include_once '../Repositorio/profesionalRepositorio.php';
class ProfesionalServicio{
    private $profesionalRepo;
    
    public function __construct()
    {
        $this->profesionalRepo = new ProfesionalRepositorio();
    }
    
    public function Agregar($Profesional){
        $this->profesionalRepositorio->Agregar($Profesional);
    }
    
    public function Modificar($Profesional){
        $this->profesionalRepositorio->Modificar($Profesional);
    }
    
    public function Buscar($DniCuitCuil){
        return $this->profesionalRepositorio->Buscar($DniCuitCuil);
    }
    
    public function Listar($Profesional){
        return $this->profesionalRepositorio->Listar();
    }
}

?>