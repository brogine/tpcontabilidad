<?php

class Pais{
    public $IdPais;
    public $Descripcion;
    
    public function __construct(){
        
    }
    
    public function __construct1($idPais, $descripcion){
        $this->IdPais = $idPais;
        $this->Descripcion = $descripcion;
    }
}

?>