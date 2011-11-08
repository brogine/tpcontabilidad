<?php 
include_once 'Conexion/conexion.php';
include_once '../Dominio/cliente.php';

class UbicacionRepositorio
{
private $Conexion;
public function __construct(){
		$this->Conexion = new Conexion();
	}
	public function AgregarPais(Pais $Pais){
		$parametros[0]=$Pais->IdPais;
		$parametros[1]=$Pais->Descripcion;
		$this->Conexion->StoreProcedureSinRetorno('PaisesAlta',$parametros);
	}
	
	public function ModificarPais(Pais $Pais){
	$parametros[0]=$Pais->IdPais;
		$parametros[1]=$Pais->Descripcion;
		$this->Conexion->StoreProcedureSinRetorno('PaisesMod',$parametros);	
	}
	
	public function BorrarPais(Pais $Pais){
		$this->Conexion->StoreProcedureSinRetorno('PaisesBaja',$Pais->IdPais);
	}
	
	public function Buscarpais($IdPais){
	$tabla = $this->Conexion->StoreProcedureConRetorno('PaisesBuscar');
	$datarow = mysql_fetch_array($tabla);
	return $this->MapearPais($datarow);	
	}
	
	public function MapearPais($Datarow){
		$pais = new Pais($Datarow['$IdPais'],$Datarow['$Descripcion']);
		return $pais;
	}
	
	public function AgregarProvincia(Provincia $Provincia){
		$parametros[0]=$Provincia->Pais->IdPais;
		$parametros[1]=$Provincia->IdProvincia;
		$parametros[2]=$Provincia->Descripcion;
		$this->Conexion->StoreProcedureSinRetorno('ProvinciasAlta', $parametros);
    }
    
    public function ModificarProvincia(Provincia $Provincia){
    	$parametros[0]=$Provincia->Pais->IdPais;
		$parametros[1]=$Provincia->IdProvincia;
		$parametros[2]=$Provincia->Descripcion;
    	$this->Conexion->StoreProcedureSinRetorno('ProvinciasMod',$parametros);
    }
    
    public function BorrarProvincia(Provincia $Provincia){
    	$this->Conexion->StoreProcedureSinRetorno('ProvinciasBaja',$Provincia->IdProvincia);
    }
    
    public function BuscarProvincia($IdProvincia){
    	$tabla = $this->Conexion->StoreProcedureConRetorno(ProvinciaBuscar,$IdProvincia);
    	$datarow = mysql_fetch_array($tabla);
    	return $this->MapearProvincia($datarow);
    }
    
    public function MapearProvincia($Datarow){
    	$pais=$this->Buscarpais($Datarow['IdPais']);
    	$Provincia = new Provincia($Datarow['IdProvincia'],$Datarow['$Descripcion'],$pais);
    	return $Provincia;
    }
    
    public function AgregarLocalidad(Localidad $Localidad){
    $parametros[0]=$Localidad->Provincia->IdProvincia;
    $parametros[1]=$Localidad->IdLocalidad;
    $parametros[2]=$Localidad->Descripcion;
    $this->Conexion->StoreProcedureSinRetorno('LocalidadesAlta',$parametros);	
    }
    
    public function ModificarLocalidad(Localidad $Localidad){
    $parametros[0]=$Localidad->Provincia->IdProvincia;
    $parametros[1]=$Localidad->IdLocalidad;
    $parametros[2]=$Localidad->Descripcion;
    $this->Conexion->StoreProcedureSinRetorno('LocalidadesMod',$parametros);		
    }
    
    public function BorrarLocalidad(Localidad $Localidad){
    	$this->Conexion->StoreProcedureSinRetorno('LocalidadesBaja',$Localidad->IdLocalidad);
    }
    
    public function BuscarLocalidad($IdLocalidad){
    	$tabla = $this->Conexion->StoreProcedureConRetorno('LocalidadesBuscar',$IdLocalidad);
    	$datarow = mysql_fetch_array($tabla);
    	return $this->MapearLocalidad($datarow);
    }
    
    public function MapearLocalidad($Datarow){
    $provincia = $this->BuscarProvincia($Datarow['IdProvincia']);
    $localidad = new Localidad($Datarow['IdLocalidad'], $Datarow['Descripcion'], $provincia);	
    }
}
?>