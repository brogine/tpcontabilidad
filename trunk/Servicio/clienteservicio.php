<?php

class ClienteServicio{
    private $clienteRepositorio;
    
    public function __construct(){
        $this->clienteRepositorio = new ClienteRepositorio();
    }
    
    public function Agregar($Cliente){
        $this->clienteRepositorio->Agregar($Cliente);
    }
    
    public function Modificar($Cliente){
        $this->clienteRepositorio->Modificar($Cliente);
    }
    
    public function Buscar($DniCuitCuil){
        return $this->clienteRepositorio->Buscar($DniCuitCuil);
    }
    
    public function Listar(){
        return $this->clienteRepositorio->Listar();
    }
    
}

?>