<?php 
	include_once 'header.php';
?>
	<div id="site_content">
      <div class="sidebar">
        <fieldset id="registrousuario">
	        <h3>Ingresar</h3>
	        <h5>Sólamente usuarios con cuenta</h5>
	        <form method="post" id="frmLogin" action="#" class="form_settings">
	            <label>Usuario:</label>
	            <input type="text" name="txtUsuario" id="txtUsuario" class="texto" />
	            <label>Password:</label>
	            <input type="password" name="txtPassword" id="txtPassword" class="texto" />
	            <label><input type="checkbox" name="chkRecordarme" id="chkRecordarme" /> Recordarme</label>
	            <input type="submit" id="btnIngresar" value="Aceptar" class="botonenviar" />
	        </form>
        </fieldset>
      </div>
      <div id="content">
        <fieldset id="registrousuario">
        <h3>Registro de Nueva Entidad</h3>
      	<form action="" method="post" class="form_settings">
	      	<label for="txtNombre">Nombre: </label>
	      	<input type="text" id="txtNombre" name="txtNombre" class="texto" />
	      	<label for="cboPais">Pais: </label>
	      	<select id="cboPais">
	      	</select>
	      	<label for="cboProvincia">Provincia: </label>
	      	<select id="cboProvincia">
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
	        <input type="submit" id="btnAceptar" name="btnAceptar" value="Aceptar" class="botonenviar"  />
        </form>
        </fieldset>
      </div>
<?php 
	include_once 'footer.php';
?>