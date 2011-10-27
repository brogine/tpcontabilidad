<?php

class UbicacionServicio{
    private $ubicacionRepositorio;
    
    public function __construct(){
        $this->ubicacionRepositorio = new UbicacionRepositorio();
    }
    
    public function AgregarLocalidad($Localidad){
        $this->ubicacionRepositorio->AgregarLocalidad($Localidad);
    }
    
    public function AgregarProvincia($Provincia){
        $this->ubicacionRepositorio->AgregarProvincia($Provincia);
    }
    
    public function AgregarPais($Pais){
        $this->ubicacionRepositorio->AgregarPais($Pais);
    }
    
    public function ModificarLocalidad($Localidad){
        $this->ubicacionRepositorio->ModificarLocalidad($Localidad);
    }
    
    public function ModificarProvincia($Provincia){
        $this->ubicacionRepositorio->ModificarProvincia($Provincia);
    }
    
    public function ModificarPais($Pais){
        $this->ubicacionRepositorio->ModificarPais($Pais);
    }
    
    public function BuscarLocalidad($IdLocalidad){
        return $this->ubicacionRepositorio->BuscarLocalidad($IdLocalidad);
    }
    
    public function BuscarProvincia($IdProvincia){
        return $this->ubicacionRepositorio->BuscarProvincia($IdProvincia);
    }
    
    public function BuscarPais($IdPais){
        return $this->ubicacionRepositorio->BuscarPais($IdPais);
    }
    
    public function ListarLocalidades($IdProvincia){
        return $this->ubicacionRepositorio->ListarLocalidades($IdProvincia);
    }
    
    public function ListarProvincias($IdPais){
        return $this->ubicacionRepositorio->ListarProvincias($IdPais);
    }
    
    public function ListarPaises(){
        return $this->ubicacionRepositorio->ListarPaises();
    }
}

?>