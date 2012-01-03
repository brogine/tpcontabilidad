/**
 * Funciones para el manejo de la grilla de turnos
 */

function agregarHorarios(){
	var table = document.getElementById("tablaTurnos");
	 
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

	var selectedDays = "";
	if(document.frmProfesional.chkLunes.checked){
		selectedDays = "Lunes, ";
	}
	if(document.frmProfesional.chkMartes.checked){
		selectedDays = selectedDays + " Martes, ";	
	}
	if(document.frmProfesional.chkMiercoles.checked){
		selectedDays = selectedDays + " Miércoles, ";	
	}
	if(document.frmProfesional.chkJueves.checked){
		selectedDays = selectedDays + " Jueves, ";	
	}
	if(document.frmProfesional.chkViernes.checked){
		selectedDays = selectedDays + " Viernes, ";	
	}
	if(document.frmProfesional.chkSabado.checked){
		selectedDays = selectedDays + " Sábado, ";	
	}
	if(document.frmProfesional.chkDomingo.checked){
		selectedDays = selectedDays + " Domingo, ";	
	}
    var celdaDias = row.insertCell(0);
    celdaDias.innerHTML = selectedDays;

    var celdaDesde = row.insertCell(1);
    celdaDesde.innerHTML = document.frmProfesional.cboDesde.value;

    var celdaHasta = row.insertCell(2);
    celdaHasta.innerHTML = document.frmProfesional.cboHasta.value;
    
    var celdaDuracion = row.insertCell(3);
    celdaDuracion.innerHTML = document.frmProfesional.txtDuracion.value;

    var celdaQuitar = row.insertCell(4);
    var link = document.createElement("input");
    link.type = "button";
    link.setAttribute('id', "tt" + rowCount);
    link.setAttribute('onclick', "quitarHorarios(" + rowCount + ");");
    link.value = "Quitar";
    celdaQuitar.appendChild(link);
}

function quitarHorarios(filaClickeada){
	var Tabla = document.getElementById("tablaTurnos");
	for (var i = filaClickeada + 1; i < Tabla.rows.length; i++) {
		var elemento = document.getElementById("tt" + i);
		elemento.setAttribute('id', "tt" + (i - 1));
		elemento.setAttribute('onclick', "quitarHorarios(" + (i - 1) + ");");
	}
	Tabla.deleteRow(filaClickeada);
}