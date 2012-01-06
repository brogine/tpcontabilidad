<?PHP
include_once 'Conexion/conexion.php';
include_once '../../Dominio/medico.php';
include_once 'personarepositorio.php';
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
		/*
		$parametros = array();
		$parametros = $this->PersonaRepo->CompletarDatosPersonalesBasicos($Profesional, $parametros);
	    $parametros[4]=$Profesional->Titulo;
	    $parametros[5]=$Profesional->Especialidad;
	    $parametros[6]=$Profesional->TelGuardia;
	    $parametros[7]=$Profesional->Estado;
	    //$this->Conexion->StoreProcedureSinRetorno('ProfesionalesAlta',$parametros); 
	    */
		$Consulta = " INSERT INTO personas (Apellido, Nombre, Email, Telefono) VALUES 
		('" . $Medico->Apellido . "', '" . $Medico->Nombre . "', '" . $Medico->Contacto->Email . "', '" . $Medico->Contacto->Telefono . "'); ";
		$result = $this->conexion->ConsultaSinRetorno($Consulta);
		$IdPersona = $this->conexion->GetLastID();
		$Consulta = " INSERT INTO medicos (IdClinica, IdPersona) VALUES (" . $Medico->Clinica->IdClinica . ", " . $IdPersona .  "); ";
		$Consulta .= " INSERT INTO medicos_especialidad (IdPersona, IdEspecialidad) VALUES (" . $IdPersona . ", " . $Medico->Especialidad->IdEspecialidad . "); ";
		$this->conexion->MultipleConsulta($Consulta);
		return $IdPersona;
	}
	
	public function Modificar(Medico $Medico)
	{
	    $parametros = array();
		$parametros = $this->PersonaRepo->CompletarDatosPersonalesBasicos($Profesional, $parametros);
	    $parametros[4]=$Profesional->Titulo;
	    $parametros[5]=$Profesional->Especialidad;
	    $parametros[6]=$Profesional->TelGuardia;
	    $parametros[7]=$Profesional->Estado;
	    $this->Conexion->StoreProcedureSinRetorno('ProfesionalesMod',$parametros); 
	}
	
	public function Buscar(Medico $Medico)
	{
		$tabla = $this->conexion->StoreProcedureConRetorno('ProfesionalesBuscar',$Profesional->DniCuitCuil);
		$datarow = mysqli_fetch_array($tabla);
		return $this->Mapear($datarow);
	}
	
	public function Borrar(Medico $Medico)
	{
	    $this->conexion->StoreProcedureSinRetorno('ProfesionalesBorrar',$Profesional->DniCuitCuil);
	}
	
	public function ListarPorEspecialidad(Medico $Medico)
	{  
		$lista = array();
	    $result = $this->conexion->StoreProcedureConRetorno('ProfesionalesListar',$Profesional->Especialidad);
	    while($Datarow=mysql_fetch_array($result))
	    {
			$lista[i]=$this->Mapear($Datarow);
	    }
	    
	    return $lista;
	}
	    
	public function ListarPorEspecialidadYLocalidad($Localidad,$IdEspecialidad)
	{  
		$lista = array();
	    //$result = $this->conexion->StoreProcedureConRetorno('ProfesionalesListar',$Profesional->Especialidad)
        $Consulta = "select c.IdClinica, p.Nombre,p.Apellido,p.Telefono,p.Email, e.idEspecialidad as Especialidad from medicos m inner join personas p on p.IdPersona = m.IdPersona
		inner join clinicas c on m.IdClinica = c.IdClinica inner join medicos_especialidad me
		on me.IdPersona = m.IdPersona inner join especialidades e on me.IdEspecialidad = e.IdEspecialidad inner join Localidad l on c.idLocalidad = l.Idlocalidad
		where l.Nombre = '".$Localidad."'  and  e.IdEspecialidad = $IdEspecialidad order by c.IdClinica; ";
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
	
	public function ListarPorClinica($idClinica){
    	$lista = array();
	    //$result = $this->conexion->StoreProcedureConRetorno('ProfesionalesListar',$Profesional->Especialidad)
        $Consulta = "select p.Nombre,p.Apellido, e.idEspecialidad as Especialidad from medicos m inner join personas p on p.IdPersona = m.IdPersona
		inner join clinicas c on m.IdClinica = c.IdClinica inner join medicos_especialidad me
		on me.IdPersona = m.IdPersona inner join especialidades e on me.IdEspecialidad = e.IdEspecialidad where c.IdClinica = " . $idClinica . " order by p.Nombre, p.Apellido; ";
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
		include_once 'clinicarepositorio.php';
		include_once 'especialidadrepositorio.php';
		$ClinicaRepo = new ClinicaRepositorio();
		$Clinica = $ClinicaRepo->Buscar($Datarow['IdClinica']) ;
		$Contacto = new Contacto($Datarow['Email'], $Datarow['Telefono']);
		$Nombre = $Datarow['Nombre'];
		$Apellido = $Datarow['Apellido'];
		$EspRepo = new EspecialidadRepositorio();
		$Especialidad = $EspRepo->Buscar($Datarow['Especialidad']); 
	    $Medico = new Medico(null, $Apellido, $Nombre, $Contacto, $Clinica, $Especialidad);
	    return $Medico;
	}
}
?>