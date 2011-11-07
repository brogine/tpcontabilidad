<?php

class Localidad{
    public $IdLocalidad;
    public $Descripcion;
    public $Provincia;
    
    public function __construct(){ }
    
    public function __construct1($idLocalidad, $descripcion,Provincia $provincia){
        $this->IdLocalidad = $idLocalidad;
        $this->Descripcion = $descripcion;
        $this->Provincia = $provincia;
    }
    
}

?>