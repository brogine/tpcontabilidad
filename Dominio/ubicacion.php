<?php

// Clase Ubicación
class Ubicacion {
    public $Localidad;
    public $Domicilio;
    
    // Constructor Ubicación Vacío
    public function __construct(){ }
    
    // Constructor Ubicación Completo
    public function __construct1($localidad, $domicilio){
        $this->Localidad = $localidad;
        $this->Domicilio = $domicilio;
    }
    
}
    
?>