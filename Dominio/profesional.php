<?php
include_once '../Dominio/persona.php';
// Clase Profesional Hereda de Persona
class Profesional extends Persona {
    
    public $Especialidad;
    public $Titulo;
    public $TelGuardia;
    public $Estado;
    
    // Constructor vacío Profesional
    public function __construct(){ }
    
    // Constructor completo Profesional
    public function __construct1($Especialidad, $Titulo, $TelGuardia, $Estado){
        $this->Especialidad = $Especialidad;
        $this->Titulo = $Titulo;
        $this->TelGuardia = $TelGuardia;
        $this->Estado = $Estado;
        
    }
    
}
    
?>