<html>
<head>
<link href="../Commons/Header/Header.css" type="text/css" rel="stylesheet"/>

<link href="Clinica.css" type="text/css" rel="stylesheet"/>
<link href="../Commons/Login/Login.css" type="text/css" rel="stylesheet" />

<link href="../Commons/Publicidad/Publicidad.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../Commons/Publicidad/jquery.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/jCarouselLite.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/captify.tiny.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/Publicidad.js"></script>

<script language="JavaScript" src ="Clinica.js"> </script>

<link href="../Commons/Footer/Footer.css" type="text/css" rel="stylesheet"/>

</head>

<body id="body">

<?php 
include_once '../Commons/Header/Header.php'; 
?>
<div id="Contenido">

<div id="profesional">
	<h2>Registro de Nueva Clínica o Consultorio</h2>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form_settings">
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
        <input type="submit" id="btnAceptar" name="btnAceptar" value="Registrarme!" class="botonenviar"  />
	</form>
	<?php
	if($_POST)
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
        	echo "Exito";
      	}
      	else {
      		echo $resultado;
      	}
    }
    ?>
</div>
<div id="login">
<?php 
include_once '../Commons/Login/Login.php';
?>
</div>
<div class="publicidad">
<?php include_once '../Commons/Publicidad/index.php'; ?>
</div>
</div>
<div id="Pie">
<?php include_once '../Commons/Footer/index.php'; ?>
</div>

</body>

</html>