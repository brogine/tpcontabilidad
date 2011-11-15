<?php

include_once 'Conexion/conexion.php';
include_once '../../Dominio/cliente.php';

class ClienteRepositorio{
	private $Conexion;
	private $PersonaRepo;
	
	public function __construct(){
		$this->Conexion = new Conexion();
	}
	
	public function Agregar(Cliente $Cliente){
		$Parametros[0]="'".$Cliente->DniCuitCuil."'";
		$Parametros[1]="'".$Cliente->Apellido."'";
		$Parametros[2]="'".$Cliente->Nombre."'";
		$Parametros[3]="'".$Cliente->Password."'";
		$Parametros[4]="'".$Cliente->Contacto->Email."'";
		$Parametros[5]="'".$Cliente->Contacto->Telefono."'";
		
		$this->Conexion->StoreProcedureSinRetorno('PersonasAlta', $Parametros[0].",".$Parametros[1].",".$Parametros[2].",".
		$Parametros[3].",".$Parametros[4].",".$Parametros[5]);
		
		
    }
    
    public function Modificar(Cliente $Cliente){
    	$Parametros[0]="'".$Cliente->DniCuitCuil."'";
		$Parametros[1]="'".$Cliente->Apellido."'";
		$Parametros[2]="'".$Cliente->Nombre."'";
		$Parametros[3]="'".$Cliente->Password."'";
		$Parametros[4]="'".$Cliente->Contacto->Email."'";
		$Parametros[5]="'".$Cliente->Contacto->Telefono."'";
		
		$this->Conexion->StoreProcedureSinRetorno('PersonasMod', $Parametros[0].",".$Parametros[1].",".$Parametros[2].",".
		$Parametros[3].",".$Parametros[4].",".$Parametros[5]);
    }
    
    public function Buscar($DniCuitCuil){
    	$result = $this->Conexion->StoreProcedureConRetorno('PersonasBuscar', "'".$DniCuitCuil."'");
    	$DataRow = mysqli_fetch_array($result);
    	return $this->Mapear($DataRow);
    	
    	
    }
    
    public function Listar(){
    	$lista = array();
    	$i = 0;
        $result = $this->Conexion->StoreProcedureConRetorno($StoredProdedure);
        while ($DataRow = mysqli_fetch_array($result)){
        	$lista[$i] = $this->Mapear($DataRow);
        	$i++;
        }
        return $lista;
    }
    
    private function Mapear($DataRow){
    	$Cliente = new Cliente();

    	$Cliente->DniCuitCuil=$DataRow['DniCuitCuil'];
    	$Cliente->Apellido=$DataRow['Apellido'];
    	$Cliente->Nombre=$DataRow['Nombre'];
    	$Cliente->Password=$DataRow['Pass'];
    	$Contacto = new Contacto();
    	$Contacto->Telefono=$DataRow['Telefono'];
    	$Contacto->Email=$DataRow['Email'];
    	$Cliente->Contacto= $Contacto;
		return $Cliente;
		
    }
}

?>