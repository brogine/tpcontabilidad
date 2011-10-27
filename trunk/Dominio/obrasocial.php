<?php

class ObraSocial{
    public $IdObraSocial;
    public $Nombre;
    
    public function __construct(){ }
    
    public function __construct1($idObraSocial, $nombre){
        $this->IdObraSocial = $idObraSocial;
        $this->Nombre = $nombre;
    }
}

?>