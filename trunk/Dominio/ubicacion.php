<?php

// Clase Ubicación
class Ubicacion {
    public $Provincia;
	public $Localidad;
    public $Domicilio;
    
    // Constructor Ubicación Vacío
    public function __construct(){ }
    
    // Constructor Ubicación Completo
    public function __construct1($provincia,$localidad, $domicilio){
        $this->Provincia = $provincia;
       	$this->Localidad = $localidad;
        $this->Domicilio = $domicilio;
    }
    
}
    
?>