<?php
	include_once("home/header.php");
?>

<div id="site_content">
      <div class="sidebar">
        <h3>Ingresar</h3>
        <h5>S�lamente usuarios logueados</h5>
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
        <h1>�MegaTurnos? �Qu� es eso?</h1>
        <p><strong>MegaTurnos</strong> es un sistema que sirve a quienes deben dar turnos, permitiendo que sus pacientes / clientes tomen los mismos directamente por Internet, las 24 hrs del d�a, los 365 d�as del a�o brind�ndoles comodidad y servicio, y liber�ndolo a Usted y sus asistentes de la gesti�n de estos turnos. </p>
        <p>Usted no precisa contar con una p�gina de Internet para utilizar el servicio. Es un servicio totalmente gratis y no necesariamente debe ser v�a web.</p>
        <p>A parte de poder administrar sus turnos online v�a web, puede hacerlo offline si usted lo considera mejor.</p>
      </div>

<?php	
	include_once("home/footer.php");
?>