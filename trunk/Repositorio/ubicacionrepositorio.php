<?php 
include_once 'Conexion/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/pais.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/provincia.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/localidad.php';

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
		if(!$this->Conexion){
			$this->Conexion = new Conexion();
		}
		$result = $this->Conexion->StoreProcedureConRetorno('PaisesBuscar', $IdPais);
		$datarow = mysqli_fetch_array($result);
		return $this->MapearPais($datarow);	
	}
	
	public function ListarPaises(){
		$lista = array();
    	$i = 0;
        $result = $this->Conexion->StoreProcedureConRetorno('PaisesListar');
        if($result){
	        while ($DataRow = mysqli_fetch_array($result)){
	        	$lista[$i] = $this->MapearPais($DataRow);
	        	$i++;
	        }
        }
        return $lista;
	}
	
	public function MapearPais($Datarow){
		$pais = new Pais($Datarow['idPais'], $Datarow['Descripcion']);
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
    	if(!$this->Conexion){
			$this->Conexion = new Conexion();
		}
    	$tabla = $this->Conexion->StoreProcedureConRetorno("ProvinciasBuscar", $IdProvincia);
    	$datarow = mysqli_fetch_array($tabla);
    	return $this->MapearProvincia($datarow);
    }
    
	public function ListarProvincias($IdPais){
		$lista = array();
    	$i = 0;
        $result = $this->Conexion->StoreProcedureConRetorno('ProvinciasListar', $IdPais);
        if($result){
	        while ($DataRow = mysqli_fetch_array($result)){
	        	$lista[$i] = $this->MapearProvincia($DataRow);
	        	$i++;
	        }
        }
        return $lista;
	}
    
    public function MapearProvincia($Datarow){
    	$pais = $this->Buscarpais($Datarow['idPais']);
    	$Provincia = new Provincia($Datarow['idProvincia'], $Datarow['Descripcion'], $pais);
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
    	$datarow = mysqli_fetch_array($tabla);
    	return $this->MapearLocalidad($datarow);
    }
    
	public function ListarLocalidades($IdProvincia){
		$lista = array();
    	$i = 0;
        $result = $this->Conexion->StoreProcedureConRetorno('LocalidadesListar', $IdProvincia);
        if($result){
	        while ($DataRow = mysqli_fetch_array($result)){
	        	$lista[$i] = $this->MapearLocalidad($DataRow);
	        	$i++;
	        }
        }
        return $lista;
	}
    
    public function MapearLocalidad($Datarow){
	    $provincia = $this->BuscarProvincia($Datarow['idProvincia']);
	    $localidad = new Localidad($Datarow['idLocalidad'], $Datarow['Descripcion'], $provincia);	
    }
}
?>