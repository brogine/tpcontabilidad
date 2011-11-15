<?php

include_once '../../Repositorio/clienterepositorio.php';
include_once '../../Dominio/cliente.php';

class ClienteServicio{
    private $clienteRepositorio;
    
    public function __construct(){
        $this->clienteRepositorio = new ClienteRepositorio();
    }
    
    public function Agregar(Cliente $Cliente){
        $this->clienteRepositorio->Agregar($Cliente);
    }
    
    public function Modificar(Cliente $Cliente){
        $this->clienteRepositorio->Modificar($Cliente);
    }
    
    public function Buscar($DniCuitCuil){
       $Cliente = $this->clienteRepositorio->Buscar($DniCuitCuil);
    return $Cliente;    
    }
    
    public function Listar(){
        return $this->clienteRepositorio->Listar();
    }
    
}

?>