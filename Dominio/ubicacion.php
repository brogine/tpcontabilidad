<?php

// Clase Ubicaci�n
class Ubicacion {
    public $Localidad;
    public $Domicilio;
    
    // Constructor Ubicaci�n Vac�o
    public function __construct(){ }
    
    // Constructor Ubicaci�n Completo
    public function __construct1($localidad, $domicilio){
        $this->Localidad = $localidad;
        $this->Domicilio = $domicilio;
    }
    
}
    
?>