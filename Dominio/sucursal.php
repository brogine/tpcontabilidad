<?
include 'clinica.php';
include 'localidad.php';
class Sucursal
{
	public $Clinica;
	public $IdSucursal;
	public $Direccion;
	public $Telefono;
	public $Localidad;

	public function __construct(Clinica $Clinica,$IdSucursal,$Direccion,$Telefono,Localidad $Localidad)
	{
		$this->Clinica = $Clinica;
		$this->IdSucursal = $IdSucursal;
		$this->Direccion = $Direccion;
		$this->Telefono = $Telefono;
		$this->Localidad = $Localidad;
	}
	
}
?>
