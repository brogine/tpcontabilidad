<?php

class Localidad{
    public $IdLocalidad;
    public $Descripcion;
    public $Provincia;
    
    public function __construct(){ 
    	$argv = func_get_args();
        switch(func_num_args())
        {
            case 3:
                self::__construct1($argv[0], $argv[1], $argv[2]);
                break;
            default:
                break;
        }
    }
    
    public function __construct1($idLocalidad, $descripcion,Provincia $provincia){
        $this->IdLocalidad = $idLocalidad;
        $this->Descripcion = $descripcion;
        $this->Provincia = $provincia;
    }
    
}

?>