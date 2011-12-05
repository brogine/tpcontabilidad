<html>
<head>
<link href="../Commons/Header/Header.css" type="text/css" rel="stylesheet"/>

<link href="Profesional.css" type="text/css" rel="stylesheet"/>
<link href="../Commons/Login/Login.css" type="text/css" rel="stylesheet" />

<script language="JavaScript" src ="Profesional.js"> </script>

<link href="../Commons/Publicidad/Publicidad.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../Commons/Publicidad/jquery.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/jCarouselLite.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/captify.tiny.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/Publicidad.js"></script>

<link href="../Commons/Footer/Footer.css" type="text/css" rel="stylesheet"/>

</head>

<body id="body">

<?php 
include_once '../Commons/Header/Header.php'; 
?>
<div id="Contenido">

<div id="profesional">
	<h3>Registro de Nueva Cl�nica o Consultorio</h3>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form_settings">
		<label for="txtNombre">Nombre: </label>
		<input type="text" id="txtNombre" name="txtNombre" class="texto" />
		<label for="cboPais">Pais: </label>
		<select id="cboPais" onclick="Search(this.value, cboProvincia);">
      	<?php 
      	include_once '../../Servicio/ubicacionservicio.php';
      	$ubicacionServicio = new UbicacionServicio();
      	$listaPaises = $ubicacionServicio->ListarPaises();
      	if(isset($listaPaises)){
      		foreach ($listaPaises as $Pais){
      			echo "<option value='$Pais->IdPais'>$Pais->Descripcion</option>";
      		}
      	}
      	?>
      	</select>
      	<label for="cboProvincia">Provincia: </label>
      	<select id="cboProvincia" onclick="Search(this.value, cboLocalidad);">
      	</select>
      	<label for="cboLocalidad">Localidad: </label>
      	<select id="cboLocalidad">
      	</select>
      	<label for="txtDomicilio">Domicilio: </label>
      	<input type="text" id="txtDomicilio" name="txtDomicilio" class="texto" />
      	<label for="txtTelefono">Telefono: </label>
      	<input type="text" id="txtTelefono" name="txtTelefono" class="texto" />
      	<label for="txtPassword">Password: </label>
      	<input type="password" id="txtPassword" name="txtPassword" class="texto" />
        <input type="submit" id="btnAceptar" name="btnAceptar" value="Registrarme!" class="botonenviar"  />
	</form>
	<?php
	if($_POST)
    {
      	include_once '../../Dominio/entidad.php';
      	include_once '../../Servicio/clienteservicio.php';
      	include_once '../../Dominio/contacto.php';
      	/* RECIBO LOS DATOS DEL FORMULARIO*/
      	
      	$nombre=$_POST['txtNombre'];
      	$apellido=$_POST['txtApellido'];
      	$dni = $_POST['txtDni'];
      	$email=$_POST['txtEmail'];
      	$Telefono=$_POST['txtTelefono'];
      	$Pass = $_POST['txtTelefono'];
      	/* CREO UN OBJETO CONTACTO*/
      	
      	$Contacto = new Contacto();
      	$Contacto->Telefono=$Telefono;
      	$Contacto->Email=$email;
      	/*CREO EL OBJETO CLIENTE Y LO COMPLETO*/
         	
      	$Cliente = new Cliente($dni, $apellido, $nombre, $Pass, $Contacto);
      	/*LO PASO POR PARAMETRO AL SERVICIO*/
      	$ClienteServ = new ClienteServicio();
        $Cli = $ClienteServ->Buscar($Cliente->DniCuitCuil);
      	if ($Cli->DniCuitCuil!="" && $Cli->Contacto->Email!="")
      	{
        echo "Ese Ususario ya Existe";
      	}
      	else
      	{
      		$ClienteServ->Agregar($Cliente);
      	}
    }
    ?>
</div>
<div id="login">
<?php 
include_once '../Commons/Login/Login.php';
?>
</div>
<div class="separador"></div>
<div class="publicidad">
<?php include_once '../Commons/Publicidad/index.php'; ?>
</div>
</div>
<div id="Pie">
<?php include_once '../Commons/Footer/index.php'; ?>
</div>

</body>

</html>