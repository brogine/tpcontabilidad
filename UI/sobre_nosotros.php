<?php
	include_once("home/header.php");
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
        <h1>¿MegaTurnos? ¿Qué es eso?</h1>
        <p><strong>MegaTurnos</strong> es un sistema que sirve a quienes deben dar turnos, permitiendo que sus pacientes / clientes tomen los mismos directamente por Internet, las 24 hrs del día, los 365 días del año brindándoles comodidad y servicio, y liberándolo a Usted y sus asistentes de la gestión de estos turnos. </p>
        <p>Usted no precisa contar con una página de Internet para utilizar el servicio. Es un servicio totalmente gratis y no necesariamente debe ser vía web.</p>
        <p>A parte de poder administrar sus turnos online vía web, puede hacerlo offline si usted lo considera mejor.</p>
      </div>

<?php	
	include_once("home/footer.php");
?>