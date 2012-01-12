<div id="menu-container">
<ul id="menu">
	<li <?php if(isset($inicio)) echo 'class="current"'; ?>  id="inicio"><a href="MenuClinicas.php" title="Inicio">Inicio</a></li>
	<li <?php if(isset($profesionales)) echo 'class="current"'; ?> id="profesionales"><a href="AdministrarProfesionales.php" title="Profesionales">Profesionales</a>
		<ul>
			<li><a href="AdministrarProfesionales.php" title="Administrar">Administrar</a></li>
			<li><a href="AbmProfesionales.php" title="Nuevo">Nuevo</a></li>
		</ul>
	</li>
	<li <?php if(isset($turnos)) echo 'class="current"'; ?> id="turnos"><a href="" title="Turnos">Turnos</a>
		<ul>
			<li><a href="" title="Nuevo">Nuevo</a></li>
			<li><a href="" title="Pendientes">Pendientes</a></li>
			<li><a href="TurnosAprobados.php" title="Aprobados">Aprobados</a></li>
		</ul>
	</li>
	<li <?php if(isset($datos)) echo 'class="current"'; ?> id="datos"><a href="" title="Mis Datos">Mis Datos</a></li>
	<li <?php if(isset($tutoriales)) echo 'class="current"'; ?> id="tutoriales"><a href="" title="Tutoriales">Tutoriales</a></li>
	<li><a href="../Commons/Menu/CerrarSesion.php?logout=1" title="Desconectarme">Desconectarme</a></li>
</ul>
</div>