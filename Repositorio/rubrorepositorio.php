<?php
include_once 'Conexion/conexion.php';
include_once '../Dominio/rubro.php';

class RubroRepositorio{
	private $Conexion;
	
	public function __construct(){
		$this->Conexion = new Conexion();
	}
	
	public function Agregar($Rubro){
		$this->Conexion->StoreProcedureSinRetorno($StoreProcedure, $Parametros);
    }
    
    public function Modificar($Rubro){
        $this->Conexion->StoreProcedureSinRetorno($StoreProcedure, $Parametros);
    }
    
    public function Buscar($idRubro){
        return $this->Conexion->StoreProcedureConRetorno($StoreProcedure, $Parametros);
    }
    
    public function Listar(){
    	$lista = array();
    	$i = 0;
        $result = $this->Conexion->StoreProcedureConRetorno('RubrosList');
        while ($DataRow = mysqli_fetch_array($result)){
        	$lista[$i] = $this->Mapear($DataRow);
        	$i++;
        }
        return $lista;
    }
    
    private function Mapear($DataRow){
		$objeto = new Rubro($DataRow['id'], $DataRow['descripcion']);
		return $objeto;
    }
}

?>