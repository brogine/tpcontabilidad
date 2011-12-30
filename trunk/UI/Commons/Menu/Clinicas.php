<script type="text/javascript">
function CleanElementByClass(theClass) {
    var allHTMLTags=document.getElementsByTagName("li");
    for (i=0; i<allHTMLTags.length; i++) {
        if (allHTMLTags[i].className==theClass) {
            allHTMLTags[i].className = "";
        }
    }
}
function cambiar(e){
    e = e || window.event;
    e = e.target || e.srcElement;
    CleanElementByClass("current");
    var parentId = document.getElementById(e.parentNode.id);
    alert(e.parentNode.id);
    document.getElementById(parentId).className = "current";
}
</script>

<div id="menu-container">
<ul id="menu" onclick="cambiar();">
	<li class="current" id="inicio"><a href="MenuClinicas.php" title="Inicio">Inicio</a></li>
	<li id="profesionales"><a href="AdministrarProfesionales.php" title="Profesionales">Profesionales</a>
		<ul>
			<li><a href="AdministrarProfesionales.php" title="Administrar">Administrar</a></li>
			<li><a href="" title="Nuevo">Nuevo</a></li>
		</ul>
	</li>
	<li id="turnos"><a href="" title="Turnos">Turnos</a>
		<ul>
			<li><a href="" title="Nuevo">Nuevo</a></li>
			<li><a href="" title="Pendientes">Pendientes</a></li>
			<li><a href="" title="Aprobados">Aprobados</a></li>
		</ul>
	</li>
	<li id="datos"><a href="" title="Mis Datos">Mis Datos</a></li>
	<li id="tutoriales"><a href="" title="Tutoriales">Tutoriales</a></li>
	<li><a href="" title="Desconectarme">Desconectarme</a></li>
</ul>
</div>