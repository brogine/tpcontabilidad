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
    var elementDias = document.createElement("input");
    elementDias.type = "text";
    elementDias.disabled = "disabled";
    elementDias.name = "dias[]";
    elementDias.value = selectedDays;
    celdaDias.appendChild(elementDias);

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

/*
 * antes, de cualquier cosa, gracias a todos por contestar.. después de horas y horas pude encontrar esto código ya esta full, derrepente hay alguna manera de mejorarlo pero ami me funciona perfecto!!, ya saben .. meter una tabla dinamica creada con javacript con n tr, o n td aki esta:

function datosTextos() {
var textos = '';
for (var i=1;i<document.getElementById('tbl').rows.length;i ++){
for (var j=0;j<=4;j++){
if (j==4){
textos = textos + document.getElementById('tbl').rows[i].cells[j].innerHTML;
}else{
textos = textos + document.getElementById('tbl').rows[i].cells[j].innerHTML + '-';
}
}
textos = textos + '/';
}
alert(textos);

return textos;
}

$cadena=textos; // obviamente textos lo envias mediante post o get y lo recogesy lo almacenos en la variable $cadena.

$partes = explode("/",$cadena); // divide una cadena según separador
array_pop($partes); // elimina el ultimo elemento del array

y ahi ya tienen toda la base de datos en arreglos divididos por filas para poderlos meter en la base de datos...

Ahora el código para meterlo en la base de datos: (Ahi viene).


for($i=0;$i<=(count($partes)-1);$i++){
$subpartes = explode("-",($partes[$i]));

if(count($subpartes)==5)
$coma=" , ";

if($subpartes[2]=="Si")
$subpartes[2]="NOT NULL";
else
$subpartes[2]="";

if($subpartes[4]=="Si")
$subpartes[4]="AUTO_INCREMENT";
else
$subpartes[4]="";

$sql="create table ".$_GET['bdd']." ( ";
$var.=$subpartes[0]." ".$subpartes[1]." (".$subpartes[3].") ".$subpartes[2]." ".$subpartes[4].$coma;



if ($i==(count($partes)-1)){ //con esto borras la ultima coma y pones el ultimo parentesis, eso es
$var = substr ($var, 0, -2); // cuando hay muxas filas con registros.
$var.=" )"; //

}

}

$sqlTotal=$sql.$var; //ahi tienen el sql para enviarlo

obviamente lo q yo hago aca creo una tabla nueva con los datos q vienen desde una tabla dinamica de javascrpit para guardarlos .. los grabo en una bdd de mysql utilizando PHP

espero q los ayude muxoo..

si alguien puede mejorar este codigo seria muy interesante.. gracias ojala lo puedan mejorar para asi ir puliendo mas esto.
 * 
 */


