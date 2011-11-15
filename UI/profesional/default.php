
      <div class="sidebar">
        <fieldset id="registrousuario">
        <h3>Ingresar</h3>
        <h5>Sólamente usuarios con cuenta</h5>
        <form method="post" id="frmLogin" action="#" class="form_settings">
            <label>Usuario:</label>
            <input type="text" name="txtUsuario" id="txtUsuario" class="texto" />
            <label>Password:</label>
            <input type="password" name="txtContrasenia" id="txtContrasenia" class="texto" />
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
	      	<select id="cboPais" onchange="Search(this.value, cboProvincia);">
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
	      	<select id="cboProvincia" onchange="Search(this.value, cboLocalidad);">
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
