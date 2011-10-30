<?php

// Rubros de Turnos
class Rubro{
	
	//Variables publicas
	public $Id;
	public $Descripcion;
	
	// Constructor mapeador
	public function __construct(){
		$argv = func_get_args();
        switch(func_num_args())
        {
            case 1:
                self::__construct1($argv[0]);
                break;
            case 2:
            	self::__construct2($argv[0], $argv[1]);
            	break;
            default:
                break;
        }
	}
	
	// Constructor nuevo rubro
	public function __construct1($descripcion){
		$this->Descripcion = $descripcion;
	}
	
	// Constructor rubro existente
	public function __construct2($id, $descripcion){
		$this->Id = $id;
		$this->Descripcion = $descripcion;
	}
}

?>