<?php

class Pais{
    public $IdPais;
    public $Descripcion;
    
    public function __construct(){
    $argv = func_get_args();
        switch(func_num_args())
        {
            case 2:
            	self::__construct1($argv[0], $argv[1]);
            	break;
            default:
                break;
        }
    }
    
    public function __construct1($idPais, $descripcion){
        $this->IdPais = $idPais;
        $this->Descripcion = $descripcion;
    }
}

?>