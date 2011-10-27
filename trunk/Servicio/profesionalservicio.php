<?php

class ProfesionalServicio{
    private $profesionalRepositorio;
    
    public function __construct(){
        $this->profesionalRepositorio = new ProfesionalRepositorio();
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
    
    public function Listar(){
        return $this->profesionalRepositorio->Listar();
    }
}

?>