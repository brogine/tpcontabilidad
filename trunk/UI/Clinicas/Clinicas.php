<?php
	if($_POST && count($_POST) > 0)
    {
    	if(isset($_POST['btnAceptar'])){
	    	if(isset($_POST['cboLocalidad']) && isset($_POST['txtDomicilio']) && isset($_POST['txtEmail']) &&
	    		isset($_POST['txtTelefono']) && isset($_POST['txtPassword']) && isset($_POST['txtNombre']))
	    	{
		      	include_once '../../Dominio/clinica.php';
		      	include_once '../../Dominio/contacto.php';
		      	include_once '../../Dominio/ubicacion.php';
		      	include_once '../../Dominio/login.php';
		      	include_once '../../Servicio/clinicaservicio.php';
		      	/* RECIBO LOS DATOS DEL FORMULARIO*/
		      	$Localidad = $ubicacionServicio->BuscarLocalidad($_POST['cboLocalidad']);
		      	$Ubicacion = new Ubicacion($Localidad, $_POST['txtDomicilio']);
		      	
		      	$Contacto = new Contacto($_POST['txtEmail'], $_POST['txtTelefono']);
		      	$Login = new Login($_POST['txtEmail'], $_POST['txtPassword']);
		      	
		      	$Clinica = new Clinica(null, $_POST['txtNombre'], $Ubicacion, $Contacto, null, $Login);
		
		      	$clinicaServicio = new ClinicaServicio();
		        $resultado = $clinicaServicio->Agregar($Clinica);
		      	if (is_numeric($resultado)) {
		        	$succ_msg = "Clínica o Consultorio agregado con éxito.";
		      	} else {
		      		$err_msg = $resultado;
		      	}
	    	} else {
	    		$err_msg = "Complete todos los campos antes de continuar.";
	    	}
    	}
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<link href="../Commons/Header/Header.css" type="text/css" rel="stylesheet" />
<link href="../Commons/Footer/Footer.css" type="text/css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" media="all" href="../Commons/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="../Commons/text.css" />
<link rel="stylesheet" type="text/css" media="all" href="../Commons/960.css" />

<link href="Clinica.css" type="text/css" rel="stylesheet" />
<link href="../Commons/Login/Login.css" type="text/css" rel="stylesheet" />

<link href="../Commons/Publicidad/Publicidad.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../Commons/Publicidad/jquery.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/jCarouselLite.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/captify.tiny.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/Publicidad.js"></script>

<script type="text/javascript" src ="Clinica.js"> </script>

</head>

<body>

<?php include_once '../Commons/Header/Header.php'; ?>
<div class="container_12" id="Contenido">

<div class="prefix_1 grid_5">
	<div id="profesional">
	<h2>Registro de Nueva Clínica o Consultorio</h2>
	<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
		<label for="txtNombre">Nombre: </label>
		<input type="text" id="txtNombre" name="txtNombre" class="texto" />
		<label for="txtEmail">Email: </label>
		<input type="text" id="txtEmail" name="txtEmail" class="texto" />
		<label for="cboPais">Pais: </label>
		<select id="cboPais" onclick="Search(this.value, cboProvincia);">
      	<?php 
      	include_once '../../Servicio/ubicacionservicio.php';
      	$ubicacionServicio = new UbicacionServicio();
      	$listaPaises = $ubicacionServicio->ListarPaises();
      	if(isset($listaPaises)){
      		foreach ($listaPaises as $Pais){
      			echo "<option value='$Pais->IdPais'>$Pais->Nombre</option>";
      		}
      	}
      	?>
      	</select>
      	<label for="cboProvincia">Provincia: </label>
      	<select id="cboProvincia" onclick="Search(this.value, cboLocalidad);">
      	</select>
      	<label for="cboLocalidad">Localidad: </label>
      	<select id="cboLocalidad" name="cboLocalidad">
      	</select>
      	<label for="txtDomicilio">Domicilio: </label>
      	<input type="text" id="txtDomicilio" name="txtDomicilio" class="texto" />
      	<label for="txtTelefono">Telefono: </label>
      	<input type="text" id="txtTelefono" name="txtTelefono" class="texto" />
      	<label for="txtPassword">Password: </label>
      	<input type="password" id="txtPassword" name="txtPassword" class="texto" autocomplete="off" /><br />
        <input type="submit" id="btnAceptar" name="btnAceptar" value="Registrarme!" class="botonenviar" />
	</form>
	<?php
		if(isset($error_msg)) echo "<div class='error-msg'>$error_msg</div>";
		if(isset($succ_msg)) echo "<div class='succ-msg'>$succ_msg</div>";
	?>
	</div>
</div>
<div class="grid_5 prefix_1">
	<?php include_once '../Commons/Login/Login.php'; ?>
</div>
<div class="grid_12 prefix_1 publicidad">
	<?php include_once '../Commons/Publicidad/index.php'; ?>
</div>
</div>
<?php include_once '../Commons/Footer/index.php'; ?>

</body>

</html>