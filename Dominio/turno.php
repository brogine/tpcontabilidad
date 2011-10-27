<?php 
    
// Clase Turno
class Turno {
    
    //Variables Turno
    public $idTurno;
    public $Cliente;
    public $Profesional;
    public $DiasHorarios;
    public $Estado;
    
    // Constructor vacío de Turno
    public function __construct(){ }
    
    // Constructor completo de Turno
    public function __construct1($idTurno, $cliente, $profesional, $diasHorarios, $estado){
        $this->idTurno = $idTurno;
        $this->Cliente = $cliente;
        $this->Profesional = $profesional;
        $this->DiasHorarios = $diasHorarios;
        $this->Estado = $estado;
    }
    
}
    
?>