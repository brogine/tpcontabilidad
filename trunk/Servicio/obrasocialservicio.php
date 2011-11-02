<?php

class ObraSocialServicio{
    private $obrasocialRepositorio;
    
    public function __construct(){
        $this->obrasocialRepositorio = new ObraSocialRepositorio();
    }
    
    public function Agregar(ObraSocial $ObraSocial){
        $this->obrasocialRepositorio->Agregar($ObraSocial);
    }
    
    public function Modificar(ObraSocial $ObraSocial){
        $this->obrasocialRepositorio->Modificar($ObraSocial);
    }
    
    public function Buscar($idObraSocial){
        return $this->obrasocialRepositorio->Buscar($idObraSocial);
    }
    
    public function Listar(){
        return $this->obrasocialRepositorio->Listar();
    }
    
}

?>
