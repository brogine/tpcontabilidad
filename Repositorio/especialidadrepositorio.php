<?php
include_once 'Conexion/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/especialidad.php';

class EspecialidadRepositorio{
	private $Conexion;
	
	public function __construct(){
		$this->Conexion = new Conexion();
	}
	
	public function Agregar(Especialidad $Especialidad){
		$this->Conexion->ConsultaSinRetorno(" Insert Into Especialidades (Nombre) Values ('$Especialidad->Nombre') ");
    }
    
    public function Modificar(Especialidad $Especialidad){
        $this->Conexion->ConsultaSinRetorno(" Update Especialidades Set Nombre = '$Especialidad->Nombre' Where IdEspecialidad = $Especialidad->IdEspecialidad ");
    }
    
    public function Buscar($idEspecialidad){
        $result = $this->Conexion->ConsultaConRetorno(" Select * From Especialidades Where IdEspecialidad = $idEspecialidad ");
    	$DataRow = mysqli_fetch_array($result);
        return $this->Mapear($DataRow);
    }
    
    public function Listar(){
    	$lista = array();
    	$i = 0;
        $result = $this->Conexion->ConsultaConRetorno(" Select * From Especialidades");
        while ($DataRow = mysqli_fetch_array($result)){
        	$lista[$i] = $this->Mapear($DataRow);
        	$i++;
        }
        return $lista;
    }
    
    private function Mapear($DataRow){
    	$Especialidad = new Especialidad($DataRow['idEspecialidad'], $DataRow['Nombre']);
		return $Especialidad;
    }
}

?>