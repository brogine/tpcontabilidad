<?php
include_once '../Repositorio/rubrorepositorio.php';
class RubroServicio{
	private $rubroRepositorio;
	
	public function __construct(){
		$this->rubroRepositorio = new RubroRepositorio();
	}
	
	public function Agregar(Rubro $Rubro){
        $this->rubroRepositorio->Agregar($Rubro);
    }
    
    public function Modificar(Rubro $Rubro){
        $this->rubroRepositorio->Modificar($Rubro);
    }
    
    public function Buscar($idRubro){
        return $this->rubroRepositorio->Buscar($idRubro);
    }
    
    public function Listar(){
        return $this->rubroRepositorio->Listar();
    }
}

?>