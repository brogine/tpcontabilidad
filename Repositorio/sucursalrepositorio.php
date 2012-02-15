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
	
	}

	public function ModificarSucursal(Sucursal $Sucursal)
	{
	
	}

	public function BorrarSucursal(Sucursal $Sucursal)
	{

	}
	
	public function BuscarSucursal($IdSucursal)
	{
		
	}
	
	public function ListarSucursal()
	{
	
	}	
	
	public function ListarSucursalesPorClinica($IdClinica)
	{
		
	}
	
	public function Mapear($DataRow)
	{
		
	}
}
?>