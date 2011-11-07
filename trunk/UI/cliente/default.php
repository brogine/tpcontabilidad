<?php 
	include_once 'header.php';
?>
<div id="site_content">
      <div class="sidebar">
        <h3>Ingresar</h3>
        <h5>Sólamente usuarios logueados</h5>
        <form method="post" id="frmLogin" action="#" id="search_form">
            <label>Usuario:</label>
            <input type="text" name="txtUsuario" id="txtUsuario" />
            <label>Password:</label>
            <input type="password" name="txtPassword" id="txtPassword" />
            <h5><input type="checkbox" name="chkRecordarme" id="chkRecordarme" /> Recordarme</h5>
            <input type="submit" id="btnIngresar" value="Aceptar" />
        </form>
      </div>
      
      <div id="content">
      <label>Ingrese Su Dni:</label><input type="text" id="txtDni">
      <label>Ingrese Su Nombre</label><input type="text" id="txtNombre">
      <label>Ingrese Su Apellido</label><input type="text" id="txtApellido">
      <label>Ingrese Su E-mail</label><input type="text" id="txtEmail">
      <label>Ingrese Un Telefono (Opcional)</label><input type="text" id="txtTelefono">
      <input type="button" id="btnRegistrar" name="btnSacar" class="megabutton" value="Registrame!" />
      </div>
<?php 
	include_once 'footer.php';
?>