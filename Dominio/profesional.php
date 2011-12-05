<?php
include_once '../Dominio/persona.php';
// Clase Profesional Hereda de Persona
class Profesional extends Persona {
    
    public $Especialidad;
    public $Titulo;
    public $TelGuardia;
    public $Estado;
    public $Clinica;
    
    // Constructor vacío Profesional
    public function __construct(){ }
    
    // Constructor completo Profesional
    public function __construct1($Especialidad, $Titulo, $TelGuardia, Entidad $Entidad)
    {
        $this->Especialidad = $Especialidad;
        $this->Titulo = $Titulo;
        $this->TelGuardia = $TelGuardia;
        $this->Estado = $Estado;
        $this->Clinica=$Entidad;
    }
    
}
    
?>