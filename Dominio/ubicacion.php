<?php

// Clase Ubicaci�n
class Ubicacion {
    public $Provincia;
	public $Localidad;
    public $Domicilio;
    
    // Constructor Ubicaci�n Vac�o
    public function __construct(){ }
    
    // Constructor Ubicaci�n Completo
    public function __construct1($provincia,$localidad, $domicilio){
        $this->Provincia = $provincia;
       	$this->Localidad = $localidad;
        $this->Domicilio = $domicilio;
    }
    
}
    
?>