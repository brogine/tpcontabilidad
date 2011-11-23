<html>
<head>
<link href="../Commons/Header/Header.css" type="text/css" rel="stylesheet"/>
<link href="../Commons/Footer/Footer.css" type="text/css" rel="stylesheet"/>
<link href="Profesional.css" type="text/css" rel="stylesheet"/>
<link href="../Commons/Login/Login.css" type="text/css" rel="stylesheet" />

<script language="JavaScript" src ="Profesional.js"> </script>

</head>

<body id="body">

<div id="Contenido">
<div>
<?php include_once '../Commons/Header/index.php';
DibujarHead();
?>

</div>

<?php 
include_once '../Commons/Login/Login.php';
?>
<div id="content">
	<fieldset id="registrousuario">
	<h3>Registro de Nueva Entidad</h3>
	<form action="" method="post" class="form_settings">
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
	</fieldset>
</div>

<div>
<?php include_once '../Commons/Publicidad/index.php';?>
</div>

<div id="Pie">
<?php include_once '../Commons/Footer/index.php';?>
</div>
</div>
</body>

</html>