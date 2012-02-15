<?php
include_once 'Conexion/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/sucursal.php';

class SucursalRepositorio
{
private $Conexion;

	public function __construct()
	{
		$this->Conexion=new Conexion();
	}

	public function AgregarSucursal(Sucursal $Sucursal)
	{
	$Clinica=$Sucursal->Clinica->IdClinica;
	$Localidad=$Sucursal->Localidad->IdLocalidad;
	$Direccion=$Sucursal->Direccion;
	$Telefono=$Sucursal->Telefono;
	$Consulta="Insert Into Sucursales(IdCLinica,Direccion,Telefono,IdLocalidad) Values ($Clinica,$Direccion,$Telefono,$Localidad)";
	$this->Conexion->ConsultaSinRetorno($Consulta);
	}

	public function ModificarSucursal(Sucursal $Sucursal)
	{
	$IdSucursal=$Sucursal->IdSucursal;
	$Localidad=$Sucursal->Localidad->IdLocalidad;
	$Direccion=$Sucursal->Direccion;
	$Telefono=$Sucursal->Telefono;
	$Consulta="Update Sucursales set Direccion=$Direccion,Telefono=$Telefono,IdLocalidad=$Localidad where IdSucursal=$IdSucursal";
	$this->Conexion->ConsultaSinRetorno($Consulta);
	}

	public function BorrarSucursal(Sucursal $Sucursal)
	{
	$IdSucursal=$Sucursal->IdSucursal;
	$Consulta="Delete From Sucursales Where IdSucursal=$IdSucursal";
	$this->Conexion->ConsultaSinRetorno($Consulta);
	}
	
	public function BuscarSucursal($IdSucursal)
	{
		$Result=$this->Conexion->ConsultaConRetorno("Select * from Sucursales Where IdSucursal=$IdSucursal");
		$Datarow=mysqli_fetch_array($Result);
		return $this->Mapear($DataRow);
		
	}
	
	public function ListarSucursal()
	{
	$lista=array();
	$i=0;
	$result=$this->Conexion->ConsultaConRetorno("select * from Sucursales");
	if($result)
	{
		while($Datarow=mysql_fetch_array($result))
		{
		$lista[$i]=$this->Mapear($DataRow);
		$i++;
		}
	}
	return $lista;
	}	
	
	public function ListarSucursalesPorClinica($IdClinica)
	{
		$lista=array();
	$i=0;
	$result=$this->Conexion->ConsultaConRetorno("select * from Sucursales where IdClinica=$IdClinica");
	if($result)
	{
		while($Datarow=mysql_fetch_array($result))
		{
		$lista[$i]=$this->Mapear($DataRow);
		$i++;
		}
	}
	return $lista;
	}
	
    private function Mapear($DataRow)
	{
		$ClinicaRepositorio = new ClinicaRepositorio();
		$LocalidadRepositorio = new LocalidadRepositorio();
		
		$Clinica=$ClinicaRepositorio->Buscar($DataRow['IdClinica']);
		$Localidad=$LocalidadRepositorio->Buscar($DataRow['IdLocalidad']);
		$IdSucursal=$DataRow['IdSucursal'];
		$Direccion=$DataRow['Direccion'];
		$Telefono=$DataRow['Telefono'];
		
		$Sucursal= new Sucursal($Clinica,$IdSucursal,$Direccion,$Telefono,$Localidad);
		return $Sucursal;
	}
}
?>