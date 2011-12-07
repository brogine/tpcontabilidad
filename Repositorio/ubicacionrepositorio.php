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
		//$parametros[0]=$Pais->IdPais;
		//$parametros[1]=$Pais->Nombre;
		$this->Conexion->ConsultaSinRetorno("Insert Into Pais(Nombre) values ($Pais->Nombre)" );
		
	}
	
	public function ModificarPais(Pais $Pais){
		//$parametros[0]=$Pais->IdPais;
		//$parametros[1]=$Pais->Nombre;
		$this->Conexion->ConsultaSinRetorno("Update Pais set Nombre = $Pais->Nombre where IdPais = $Pais->IdPais");
	}
	
	public function BorrarPais(Pais $Pais){
		$this->Conexion->ConsultaSinRetorno("Delete From Pais where IdPais = $Pais->IdPais");
	}
	
	public function Buscarpais($IdPais){
		if(!$this->Conexion){
			$this->Conexion = new Conexion();
		}
		$result = $this->Conexion->ConsultaConRetorno("Select * from Pais where IdPais = $IdPais");
		
	//	$result = $this->Conexion->StoreProcedureConRetorno('PaisesBuscar', $IdPais);
		$datarow = mysqli_fetch_array($result);
		return $this->MapearPais($datarow);	
	}
	
	public function ListarPaises(){
		$lista = array();
    	$i = 0;
        $result = $this->Conexion->ConsultaConRetorno("Select * From Pais");
        
        if($result){
	        while ($DataRow = mysqli_fetch_array($result)){
	        	$lista[$i] = $this->MapearPais($DataRow);
	        	$i++;
	        }
        }
        return $lista;
	}
	
	public function MapearPais($Datarow){
		$pais = new Pais($Datarow['idPais'], $Datarow['Nombre']);
		return $pais;
	}
	
	public function AgregarProvincia(Provincia $Provincia){
		$IdPais=$Provincia->Pais->IdPais;
		$Nombre=$Provincia->Nombre;
		$Consulta ="Insert Into Provincia(IdPais,Nombre) values ($IdPais,$Nombre)";
		$this->Conexion->ConsultaSinRetorno($Consulta);
    }
    
    public function ModificarProvincia(Provincia $Provincia){
		$Nombre=$Provincia->Nombre;
		$Consulta ="Update Provincias set Nombre = $Nombre";
		$this->Conexion->ConsultaSinRetorno($Consulta);
    }
    
    public function BorrarProvincia(Provincia $Provincia){
    	$this->Conexion->StoreProcedureSinRetorno('ProvinciasBaja',$Provincia->IdProvincia);
    	$Consulta = "Delete From Provincia where IdProvincia = $Provincia->IdProvincia";
    	$this->Conexion->ConsultaSinRetorno($Consulta);
    }
    
    public function BuscarProvincia($IdProvincia){
    	if(!$this->Conexion){
			$this->Conexion = new Conexion();
		}

		$tabla = $this->Conexion->ConsultaConRetorno("Select * from Provincia where IdProvincia = $IdProvincia");
    	$datarow = mysqli_fetch_array($tabla);
    	return $this->MapearProvincia($datarow);
    }
    
	public function ListarProvincias($IdPais){
		$lista = array();
    	$i = 0;
        $result = $this->Conexion->ConsultaConRetorno("Select * from Provincia Where IdPais = $IdPais");
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
    	$Provincia = new Provincia($Datarow['idProvincia'], $Datarow['Nombre'], $pais);
    	return $Provincia;
    }
    
    public function AgregarLocalidad(Localidad $Localidad){
	   
	    $this->Conexion->ConsultaSinRetorno("Insert Into Localidad(Nombre, IdProvincia) values ($Localidad->Nombre,$Localidad->Provincia->IdProvincia)" );
	    	
    }
    
    public function ModificarLocalidad(Localidad $Localidad){
	    
	    $IdLocalidad= $Localidad->IdLocalidad;
	    $Nombre=$Localidad->Descripcion;
	    $Consulta = "Update Localidad set Nombre = $Nombre where IdLocalidad = $IdLocalidad ";
	    $this->Conexion->ConsultaSinRetorno($Consulta);
    }
    
    public function BorrarLocalidad(Localidad $Localidad){
    	$this->Conexion->ConsultaSinRetorno("Delete From Localidad Where IdLocalidad = $Localidad->IdLocalidad");
    }
    
    public function BuscarLocalidad($IdLocalidad){
    	$tabla = $this->Conexion->ConsultaConRetorno("Select * from Localidad where IdLocalidad = $IdLocalidad");
    	$datarow = mysqli_fetch_array($tabla);
    	return $this->MapearLocalidad($datarow);
    }
    
	public function ListarLocalidades($IdProvincia){
		$lista = array();
    	$i = 0;
        $result = $this->Conexion->ConsultaConRetorno("Select * from Localidad where IdProvincia = $IdProvincia");
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
	    $localidad = new Localidad($Datarow['idLocalidad'], $Datarow['Nombre'], $provincia);	
	    return $localidad;
    }
    
    public function ListarLocalidadesPorNombre($Localidad)
    {
    	$lista = array();
    	if($Localidad != "")
    	{
    		$consulta = "select * from Localidad where Nombre like '%$Localidad%'";
    	
    		$i = 0;
    		$result = $this->Conexion->ConsultaConRetorno($consulta);
	    	if($result)
	    	{
		        while ($DataRow = mysqli_fetch_array($result))
		        {
		        	$lista[$i] = $this->MapearLocalidad($DataRow);
		        	$i++;
		        }
	        }
    	}
        return $lista;
    }
}
?>