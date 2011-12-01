function Buscador(){
var xmlhttp=false;
try {
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
} catch (E) {
xmlhttp = false;
}
}
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
xmlhttp = new XMLHttpRequest();
}
return xmlhttp;
}


function Buscar() {
var Texto = document.getElementById('TxtLocalidad').value;
var Principal = document.getElementById('Buscador');
if(!document.getElementById('Resultados'))
	{
	var Resultados = document.createElement('DIV');
	Resultados.id="Resultados";
	Principal.appendChild(Resultados);
	}
else
	{
	var Resultados = document.getElementById('Resultados');
	
	}
Resultados.className="Resultado";
ajax = Buscador();
ajax.open("GET","Buscador.php?q="+Texto);
ajax.onreadystatechange = function() {
if (ajax.readyState == 4) {
Resultados.innerHTML = ajax.responseText;
if(Texto=="")
{
Borrar();
}
}
}
ajax.send(null)

}

function Completar(valor)
{
var texto = document.getElementById(valor);
var TxtBox = document.getElementById('TxtLocalidad');
TxtBox.value=texto.innerHTML;
texto.onclick=Borrar();
}

function Borrar()
{
	var Principal = document.getElementById('Buscador');
	var Resultados = document.getElementById('Resultados');
	Principal.removeChild(Resultados)
}