<?PHP
include_once 'Conexion/conexion.php';
include_once '../../Dominio/medico.php';
include_once '../../Repositorio/medicorepositorio.php';

class MedicoRepositorio
{
	private $conexion;
	private $PersonaRepo;
	
	public function __construct()
	{
		$this->conexion = new Conexion();
		$this->PersonaRepo = new PersonaRepositorio();
	}
	
	public function Agregar(Medico $Medico)
	{
	$UsuarioRepositorio = new UsuarioRepositorio();
	$UsuarioRepositorio->Agregar($Medico);
	foreach ($Medico->Especialidad as $Especialidad) 
	{
		$Consulta = "Insert Into Medico_Especialidad(IdMedico,IdEspecialidad) values($Medico->IdMedico,$Especialidad->IdEspecialidad)";
		$this->conexion->ConsultaSinRetorno($Consulta);
	}    
	}
	
	public function Modificar(Medico $Medico)
	{
		$UsuarioRepositorio = new UsuarioRepositorio();
		$UsuarioRepositorio->Modificar($Medico);
		$BorrarDatos = "Delete from Medico_Especialidad where IdMedico = $Medico->IdMedico";
		$this->conexion->ConsultaSinRetorno($BorrarDatos);
		foreach ($Medico->Especialidad as $Especialidad) 
		{
		$Consulta = "Insert Into Medico_Especialidad(IdMedico,IdEspecialidad) values($Medico->IdUsuario,$Especialidad->IdEspecialidad)";
		$this->conexion->ConsultaSinRetorno($Consulta);
		}    
		
	}
	
	public function Buscar($IdUsuario)
	{
		$result = $this->conexion->ConsultaConRetorno(" SELECT * FROM Usuarios M inner join Medicos_Especialidad E on M.IdUsuario=E.IdMedico where M.IdUsuario= $IdUsuario");
		$datarow = mysqli_fetch_array($result);
		return $this->Mapear($datarow);
	}
	
	public function Borrar(Medico $Medico)
	{
	    $this->conexion->StoreProcedureSinRetorno('ProfesionalesBorrar',$Profesional->DniCuitCuil);
	}
	
	public function ListarPorEspecialidad($IdEspecialidad)
	{  
		$lista = array();
		$consulta = "Select * from Usuarios M inner Join Medicos_Especialidad E on E.IdMedico=M.IdUsuario where E.IdEspecialidad=$IdEspecialidad";
		
	    $result = $this->conexion->ConsultaConRetorno($consulta);
	    while($Datarow=mysql_fetch_array($result))
	    {
			$lista[i]=$this->Mapear($Datarow);
	    }
	    
	    return $lista;
	}
	    
	public function ListarPorEspecialidadYLocalidad($Localidad,$IdEspecialidad)
	{  
		$lista = array();
	    $Consulta = "Select M.IdUsuario,M.Nombre,M.Email,M.Pass,M.IdLocalidad,E.IdEspecialidad from Usuarios M inner Join 
        Medicos_Especialidad E on E.IdMedico=M.IdUsuario inner join 
        Horarios H on M.IdUsuario=H.IdMedico inner join 
        Sucursales S on S.IdSucursal = H.IdSucursal where S.IdLocalidad = $Localidad and E.IdEspecialidad = $IdEspecialidad";
        $i=0;
        $result = $this->conexion->ConsultaConRetorno($Consulta);
        if($result)
        {
	    	while($Datarow=mysqli_fetch_array($result))
	    	{
				$lista[$i]=$this->Mapear($Datarow);
				$i++;
	    	}
        }
	    return $lista;
	}
	
	public function ListarPorClinica($IdClinica){
    	$lista = array();
	    //$result = $this->conexion->StoreProcedureConRetorno('ProfesionalesListar',$Profesional->Especialidad)
        $Consulta = "Select M.IdUsuario,M.Nombre,M.Email,M.Pass,M.IdLocalidad,E.IdEspecialidad from Usuarios M inner join Medicos_Especialidad E on M.IdUsuario=E.IdMedico
        inner join Horarios H on M.IdUsuario=H.IdMedico inner join Sucursales S on S.IdSucursal=H.IdSucursal where H.IdClinica=$IdClinica";
        $i = 0;
        $result = $this->conexion->ConsultaConRetorno($Consulta);
        if($result)
        {
	    	while($Datarow = mysqli_fetch_array($result))
	    	{
				$lista[$i]=$this->Mapear($Datarow);
				$i++;
	    	}
        }
	    return $lista;
    }
	
	public function Mapear($Datarow)
	{
		$arrayEspecialidades;
		$i=0;
		$EspecialidadRepositorio = new EspecialidadRepositorio();
		
		foreach ($Datarow as $Medico) 
		{
			
			$arrayEspecialidades[i]=$EspecialidadRepositorio->Buscar($Medico['IdEspecialidad']);
			$i++;
		}
		
		$LocalidadRepositorio = new LocalidadRepositorio();
		$Localidad = $LocalidadRepositorio->Buscar($Datarow['IdLocalidad']);
		
		$Medico= new Medico($Datarow['IdUsuario'],$Datarow['Nombre'],$Datarow['Email'],$Datarow['Pass'],$Localidad,$arrayEspecialidades);
		return $Medico;
	}
}
?>