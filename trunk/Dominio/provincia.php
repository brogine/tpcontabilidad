<?php

class Provincia{
    public $IdProvincia;
    public $Descripcion;
    public $Pais;
    
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
    
    public function __construct1($idProvincia, $descripcion, Pais $pais){
        $this->IdProvincia = $idProvincia;
        $this->Descripcion = $descripcion;
        $this->Pais = $pais;
    }
}

?>