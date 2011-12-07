<?php
include_once '../../Repositorio/clinicarepositorio.php';
include_once '../../Dominio/clinica.php';

class ClinicaServicio{
    private $clinicaRepositorio;
    
    public function __construct(){
        $this->clinicaRepositorio = new ClinicaRepositorio();
    }
    
    public function Agregar(Clinica $Clinica){
        return $this->clinicaRepositorio->Agregar($Clinica);
    }
    
    public function Modificar(Clinica $Clinica){
        $this->clinicaRepositorio->Modificar($Clinica);
    }
    
    public function Buscar($IdClinica){
       	$Clinica = $this->clinicaRepositorio->Buscar($IdClinica);
    	return $Clinica;    
    }
    
    public function Listar(){
        return $this->clinicaRepositorio->Listar();
    }
    
}

?>