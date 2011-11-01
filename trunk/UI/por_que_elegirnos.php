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
        <h1>�Por qu� elegirnos?</h1>
        <ul>
        	<li>Facilita la obtenci�n de turnos</li>
        	<li>Libera recursos: tiempo suyo y de su personal y l�neas telef�nicas. Ahorra costos.</li>	
        	<li>Act�a de Plan B si un d�a se corta el tel�fono o Usted / sus asistentes no pueden tomar turnos (o se van de vacaciones)</li>
        	<li>Elimina reclamos por la sobrecarga de l�neas telef�nicas y los mensajes no respondidos del contestador</li>
        	<li>Disminuye errores cometidos en la asignaci�n de los turnos</li>
        	<li>Incrementa la Tasa de Asistencia a los turnos mediante recordatorios autom�ticos (via e-mail y posible SMS, y env�a e-mail por ausencia sin previo aviso a los turnos)</li>
        	<li>Les permite visualizar y controlar la agenda en tiempo real desde cualquier computadora con Internet - habilitando el trabajo simult�neo en forma remota de los asistentes / secretarias</li>
        	<li>Permite un alto nivel de personalizaci�n en la configuraci�n de las agendas (Ej: �Cu�ntos turnos puede tomar un paciente/cliente? �Hasta cu�ntas horas antes puede cancelar un turno un cliente? etc)</li>
        	<li>Brinda reportes de gesti�n e historia de los turnos (concretados, cancelados por el establecimiento, cancelados por los pacientes/clientes, turnos ausentes)</li>
        	<li>El servicio es confidencial: sus clientes/pacientes s�lo ver�n si un turno est� disponible/ocupado de acuerdo a como usted lo disponga</li>
        </ul>
      </div>

<?php 
	include_once("home/footer.php");
?>