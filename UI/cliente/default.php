      <div class="sidebar">
        <fieldset id="registrousuario">
        <h3>Ingresar</h3>
        <h5>Sólamente usuarios con cuenta</h5>
        <form method="post" id="frmLogin" action="#" class="form_settings">
            <label>E-mail:</label>
            <input type="text" name="txtUsuario" id="txtUsuario" class="texto" />
            <label>Password:</label>
            <input type="password" name="txtContrasenia" id="txtContrasenia" class="texto" />
            <label><input type="checkbox" name="chkRecordarme" id="chkRecordarme" /> Recordarme</label>
            <input type="submit" id="btnIngresar" value="Aceptar" class="botonenviar" />
        </form>
        </fieldset>
        </div>
      
      <!-- Formulario de Registro -->
      <div id="content">
      <fieldset id="registrousuario">
      <h3>Registro de Nuevo Cliente</h3>
      <form action="default.php" class="form_settings" method="POST">
      <label for="txtDni">Ingrese Su Dni:</label><input type="text" id="txtDni" class="texto" name="txtDni">
      <label for="txtNombre">Ingrese Su Nombre:</label><input type="text" id="txtNombre" class="texto" name="txtNombre">
      <label for="txtApellido">Ingrese Su Apellido:</label><input type="text" id="txtApellido" class="texto" name="txtApellido">
      <label for="txtEmail">Ingrese Su E-mail:</label><input type="text" id="txtEmail" class="texto" name="txtEmail">
      <label for="txtTelefono">Ingrese Un Telefono (Opcional):</label><input type="text" id="txtTelefono" class="texto" name="txtTelefono">
      <label for="txtPassword">Ingrese Un Password:</label><input type="text" id="txtPassword" class="texto" name="txtPassword">
      <input type="submit" id="btnRegistrar" name="btnRegistrar" class="botonenviar" value="Registrame!" />
	  </form>
	  </fieldset>
      </div>
      <?php 
      
      if($_POST)
      {
      	include_once '../../Dominio/cliente.php';
      	include_once '../../Servicio/clienteservicio.php';
      	
      	$nombre=$_POST['txtNombre'];
      	$apellido=$_POST['txtApellido'];
      	$dni = $_POST['txtDni'];
      	$email=$_POST['txtEmail'];
      	$Telefono=$_POST['txtTelefono'];
      	$Pass = $_POST['txtTelefono'];
      	
      	$Cliente = new Cliente();
      	
      	$Cliente->DniCuitCuil=$dni;
      	$Cliente->Apellido=$apellido;
      	$Cliente->Nombre=$nombre;
      	$Cliente->Password=$Pass;
      	$Cliente->Contacto->Telefono=$Telefono;
      	
      	$ClienteServ = new ClienteServicio();
      	$ClienteServ->Agregar($Cliente);
      	}
      	
      	
      
      ?>
