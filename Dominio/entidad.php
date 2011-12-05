<?php
class Entidad{
	public $Nombre;
	public $Ubicacion;
	public $Contacto;
	public $Password;
	
	public function __construct(){
		$argv = func_get_args();
        switch(func_num_args())
        {
            case 4:
            	self::__construct1($argv[0], $argv[1], $argv[2], $argv[3]);
            	break;
            default:
                break;
        }
	}
	
	public function __construct1($nombre, $ubicacion, $contacto, $password){
		$this->Nombre = $nombre;
		$this->Ubicacion = $ubicacion;
		$this->Contacto = $contacto;
		$this->Password = $password;
	}
}