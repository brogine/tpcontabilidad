<?php

class Provincia{
    public $IdProvincia;
    public $Descripcion;
    public $Pais;
    
    public function __construct(){ }
    
    public function __construct1($idProvincia, $descripcion, $pais){
        $this->IdProvincia = $idProvincia;
        $this->Descripcion = $descripcion;
        $this->Pais = $pais;
    }
}

?>