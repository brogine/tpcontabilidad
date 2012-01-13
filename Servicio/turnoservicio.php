<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Repositorio/turnorepositorio.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/turno.php';

class TurnoServicio{
    private $turnoRepositorio;
    
    public function __construct(){
        $this->turnoRepositorio = new TurnoRepositorio();
    }
    
    public function Agregar(Turno $Turno){
        $this->turnoRepositorio->Agregar($Turno);
    }
    
    public function Modificar(Turno $Turno){
        $this->turnoRepositorio->Modificar($Turno);
    }
    
    public function Buscar($idTurno){
        return $this->turnoRepositorio->Buscar($idTurno);
    }
    
    public function ListarMedico($IdMedico){
        return $this->turnoRepositorio->ListarMedico($IdMedico);
    }
    
    public function ListarCliente($DniCuitCuil){
    	return $this->turnoRepositorio->ListarCliente($DniCuitCuil);
    }
}

?>