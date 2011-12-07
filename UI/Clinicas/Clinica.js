function nuevoAjax()
{ 
	var xmlhttp = false; 
	try 
	{ // Creacion del objeto AJAX para navegadores no IE
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); 
	}
	catch(e)
	{ 
		try
		{ // Creacion del objet AJAX para IE 
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		catch(E) { xmlhttp=false; }
	}
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') { xmlhttp = new XMLHttpRequest(); } 
		return xmlhttp; 
}

function Search(id, control)
{
	ajax = nuevoAjax();
	ajax.open("POST", "../../Servicio/ubicacionservicio.php", true);
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4) {
			if(ajax.responseText != "undefined"){
				document.getElementById(control.id).innerHTML = ajax.responseText;
			}
		}
	}
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send("id="+id+"&src="+control.id);
}

$(document).ready(function () {
	var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	$("#btnAceptar").click(function (){
		$(".error").remove();
		if( $("#txtNombre").val() == "" ){
			$("#txtNombre").focus().after("<span class='error'>Ingrese un Nombre.</span>");
			return false;
		}else if( $("#txtEmail").val() == "" || !emailreg.test($("#txtEmail").val()) ){
			$("#txtEmail").focus().after("<span class='error'>Ingrese un email correcto</span>");
			return false;
		}else if( $("#cboPais").attr("value") == "" ){
			$("#cboPais").focus().after("<span class='error'>Elija un Pais.</span>");
			return false;
		}else if( $("#cboProvincia").attr("value") == "" ){
			$("#cboProvincia").focus().after("<span class='error'>Elija una Provincia.</span>");
			return false;
		}else if( $("#cboLocalidad").attr("value") == "" ){
			$("#cboLocalidad").focus().after("<span class='error'>Elija una Localidad.</span>");
			return false;
		}else if( $("#txtDomicilio").val() == "" ){
			$("#txtDomicilio").focus().after("<span class='error'>Ingrese un Domicilio.</span>");
			return false;
		}else if( $("#txtTelefono").val() == "" ){
			$("#txtTelefono").focus().after("<span class='error'>Ingrese un Teléfono.</span>");
			return false;
		}else if( $("#txtPassword").val() == "" ){
			$("#txtPassword").focus().after("<span class='error'>Ingrese un Password Válido.</span>");
			return false;
		}
	});
	$("#btnIngresar").click(function(){
		$(".error").remove();
		if( $("#txtUsuario").val() == "" ){
			$("#txtUsuario").focus().after("<span class='error'>Ingrese un Usuario.</span>");
			return false;
		}else if( $("#txtContrasenia").val() == "" ){
			$("#txtContrasenia").focus().after("<span class='error'>Ingrese un Password.</span>");
			return false;
		}
	});
	$("#txtNombre, #txtDomicilio, #txtTelefono, #txtPassword").keyup(function(){
		if( $(this).val() != "" ){
			$(".error").fadeOut();
			return false;
		}
	});
	$("#cboPais, #cboProvincia, #cboLocalidad").click(function(){
		if( $(this).attr("value") != "" ){
			$(".error").fadeOut();
			return false;
		}
	});
	$("#txtUsuario, #txtContrasenia").keyup(function(){
		if( $(this).val() != "" ){
			$(".error").fadeOut();
			return false;
		}
	});
	$(".txtEmail").keyup(function(){
		if( $(this).val() != "" && emailreg.test($(this).val())){
			$(".error").fadeOut();
			return false;
		}		
	});
});