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
        <h1>¿Por qué elegirnos?</h1>
        <ul>
        	<li>Facilita la obtención de turnos</li>
        	<li>Libera recursos: tiempo suyo y de su personal y líneas telefónicas. Ahorra costos.</li>	
        	<li>Actúa de Plan B si un día se corta el teléfono o Usted / sus asistentes no pueden tomar turnos (o se van de vacaciones)</li>
        	<li>Elimina reclamos por la sobrecarga de líneas telefónicas y los mensajes no respondidos del contestador</li>
        	<li>Disminuye errores cometidos en la asignación de los turnos</li>
        	<li>Incrementa la Tasa de Asistencia a los turnos mediante recordatorios automáticos (via e-mail y posible SMS, y envía e-mail por ausencia sin previo aviso a los turnos)</li>
        	<li>Les permite visualizar y controlar la agenda en tiempo real desde cualquier computadora con Internet - habilitando el trabajo simultáneo en forma remota de los asistentes / secretarias</li>
        	<li>Permite un alto nivel de personalización en la configuración de las agendas (Ej: ¿Cuántos turnos puede tomar un paciente/cliente? ¿Hasta cuántas horas antes puede cancelar un turno un cliente? etc)</li>
        	<li>Brinda reportes de gestión e historia de los turnos (concretados, cancelados por el establecimiento, cancelados por los pacientes/clientes, turnos ausentes)</li>
        	<li>El servicio es confidencial: sus clientes/pacientes sólo verán si un turno está disponible/ocupado de acuerdo a como usted lo disponga</li>
        </ul>
      </div>

<?php 
	include_once("home/footer.php");
?>