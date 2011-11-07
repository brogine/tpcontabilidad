<!DOCTYPE HTML>
<html>

<head>
<title>MegaTurnos</title>
<style type='text/css'>

	body {
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		margin: 0;
	}
	
	h1 {
		margin: 0;
		padding: 0.5em;
	}
	
	p.description {
		font-size: 0.8em;
		padding: 1em;
		position: absolute;
		top: 3.2em;
		margin-right: 400px;
	}
	
	#message {
		font-size: 0.7em;
		position: absolute;
		top: 1em; 
		right: 1em;
		width: 350px;
		display: none;
		padding: 1em;
		background: #ffc;
		border: 1px solid #dda;
	}
	
</style>
	<!-- Estilos -->
	<link rel='stylesheet' type='text/css' href='css/reset.css' />
    <link rel='stylesheet' type='text/css' href='css/jquery-ui-1.8rc3.custom.css' />
	<link rel='stylesheet' type='text/css' href='css/jquery.weekcalendar.css' />
	<link rel='stylesheet' type='text/css' href='css/demo.css' />
	
	<!-- JavaScript -->
	<script type='text/javascript' src='js/jquery-1.4.2.min.js'></script>
    <script type='text/javascript' src='js/jquery-ui-1.8rc3.custom.min.js'></script>
	<script type='text/javascript' src='js/jquery.weekcalendar.js'></script>
	
<script type='text/javascript'>
	var year = new Date().getFullYear();
	var month = new Date().getMonth();
	var day = new Date().getDate();

	var eventData = {
		events : [
		    <?php
				include_once '../../Servicio/turnoservicio.php';
				$turnoServicio = new TurnoServicio();
				$listaTurnos;
				if(isset($_SESSION['Tipo'])){
					$tipo = $_SESSION['Tipo'];
					if($tipo == "Cliente"){
						$listaTurnos = $turnoServicio->ListarCliente($_SESSION['ID']);
					}
					else if($tipo == "Profesional"){
						$listaTurnos = $turnoServicio->ListarProfesional($_SESSION['ID']);
					}
				}
				
				foreach($listaTurnos as $turno):
					echo "{'id':$turno->idTurno, 'start': $turno->DiasHorarios->HoraDesde, 'end': $turno->DiasHorarios->HoraHasta, 'title': 'Turno Ocupado'}";
				endforeach;
		    ?>
		   
		   /*{"id":1, "start": new Date(year, month, day, 12), "end": new Date(year, month, day, 13, 35),"title":"Lunch with Mike"},
		    *{"id":2, "start": new Date(year, month, day, 14), "end": new Date(year, month, day, 14, 45),"title":"Dev Meeting"},
		    *{"id":3, "start": new Date(year, month, day + 1, 18), "end": new Date(year, month, day + 1, 18, 45),"title":"Hair cut"},
		    *{"id":4, "start": new Date(year, month, day - 1, 8), "end": new Date(year, month, day - 1, 9, 30),"title":"Team breakfast"},
		    *{"id":5, "start": new Date(year, month, day + 1, 14), "end": new Date(year, month, day + 1, 15),"title":"Product showcase"}
			*/
		]
	};

	$(document).ready(function() {

		$('#calendar').weekCalendar({
			timeslotsPerHour: 4,
			height: function($calendar){
				return $(window).height() - $("h1").outerHeight();
			},
			eventRender : function(calEvent, $event) {
				if(calEvent.end.getTime() < new Date().getTime()) {
					$event.css("backgroundColor", "#aaa");
					$event.find(".time").css({"backgroundColor": "#999", "border":"1px solid #888"});
				}
			},
			eventNew : function(calEvent, $event) {
				displayMessage("<strong>Turno Agregado</strong><br/>Inicia: " + calEvent.start + "<br/>Finaliza: " + calEvent.end);
				alert("Acabas de agregar un Turno.");
			},
			eventDrop : function(calEvent, $event) {
				displayMessage("<strong>Turno Movido</strong><br/>Inicia: " + calEvent.start + "<br/>Finaliza: " + calEvent.end);
			},
			eventResize : function(calEvent, $event) {
				displayMessage("<strong>Turno Cambiado Duración</strong><br/>Inicia: " + calEvent.start + "<br/>Finaliza: " + calEvent.end);
			},
			eventClick : function(calEvent, $event) {
				displayMessage("<strong>Turno Clickeado</strong><br/>Inicia: " + calEvent.start + "<br/>Finaliza: " + calEvent.end);
			},
			eventMouseover : function(calEvent, $event) {
				displayMessage("<strong>Mouse Sobre Turno</strong><br/>Inicia: " + calEvent.start + "<br/>Finaliza: " + calEvent.end);
			},
			eventMouseout : function(calEvent, $event) {
				displayMessage("<strong>Mouse Fuera de Turno</strong><br/>Inicia: " + calEvent.start + "<br/>Finaliza: " + calEvent.end);
			},
			noEvents : function() {
				displayMessage("No hay turnos esta semana.");
			},
			data:eventData
		});

		function displayMessage(message) {
			$("#message").html(message).fadeIn();
		}

		$("<div id=\"message\" class=\"ui-corner-all\"></div>").prependTo($("body"));
		
	});

</script>

</head>
<body>

<h1>Calendario de Turnos de: </h1>
	<p class="description">This calendar demonstrates a basic calendar. Events triggered are displayed in the message area. Appointments in the past are shaded grey.</p>
	<div id='calendar'></div>

</body>
</html>