<?php

class TurnoServicio{
    private $turnoRepositorio;
    
    public function __construct(){
        $this->turnoRepositorio = new TurnoRepositorio();
    }
    
    public function Agregar($Turno){
        $this->turnoRepositorio->Agregar($Turno);
    }
    
    public function Modificar($Turno){
        $this->turnoRepositorio->Modificar($Turno);
    }
    
    public function Buscar($idTurno){
        return $this->turnoRepositorio->Buscar($idTurno);
    }
    
    public function Listar(){
        return $this->turnoRepositorio->Listar();
    }
}

?>