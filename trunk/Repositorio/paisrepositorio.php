<?php
include 'Conexion/conexion.php';
include $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/pais.php';

class PaisRepositorio{
	private $Conexion;
	
	public function __construct(){
		$this->Conexion = new Conexion();
	}
	
	public function Agregar(Pais $Pais){
		$this->Conexion->ConsultaSinRetorno(" Insert Into Paises (Nombre) Values ('" . $Pais->Nombre . "') ");
    }
    
    public function Modificar(Pais $Pais){
        $this->Conexion->ConsultaSinRetorno(" Update Paises Set Nombre = '" . $Pais->Nombre . "' Where IdPais = " . $Pais->IdPais);
    }
    
    public function Buscar($IdPais){
        $result = $this->Conexion->ConsultaConRetorno(" Select * From Paises Where IdPais = " . $IdPais);
    	$DataRow = mysqli_fetch_array($result);
        return $this->Mapear($DataRow);
    }
    
    public function Listar(){
    	$lista = array();
    	$i = 0;
        $result = $this->Conexion->ConsultaConRetorno(" Select * From Paises ");
        while ($DataRow = mysqli_fetch_array($result)){
        	$lista[$i] = $this->Mapear($DataRow);
        	$i++;
        }
        return $lista;
    }
    
    private function Mapear($DataRow){
    	$Pais = new Pais($DataRow['IdPais'], $DataRow['Nombre']);
		return $Pais;
    }
}

?>