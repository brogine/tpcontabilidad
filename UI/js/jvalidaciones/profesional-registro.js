function Search(str, id)
{
	if (str == "")
	{
		return;
	}
	if (window.XMLHttpRequest)
	{// codigo para IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else
	{// codigo para IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	//usamos el medoto POST
    //archivo que realizará la operacion
	//profesionalservicio.php
	xmlhttp.open("POST", "../../Servicio/profesionalservicio.php", true);
	xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4) {
            //mostrar resultados en esta capa
        	if(id == "cboPais"){
        		document.getElementById("cboProvincia").innerHTML = xmlhttp.responseText;
        	}else{
        		if(id == "cboProvincia"){
        			document.getElementById("cboLocalidad").innerHTML = xmlhttp.responseText;
        		}
        	}
        }
    }
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //enviando los valores
	xmlhttp.send("id=" + str)

}

$(document).ready(function () {
	var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	$("#btnAceptar").click(function (){
		$(".error").remove();
		if( $("#txtNombre").val() == "" ){
			$("#txtNombre").focus().after("<span class='error'>Ingrese un Nombre.</span>");
			return false;
		/*}else if( $(".email").val() == "" || !emailreg.test($(".email").val()) ){
			$(".email").focus().after("<span class='error'>Ingrese un email correcto</span>");
			return false;*/
		}else if( $("#txtDomicilio").val() == ""){
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
		}else if( $("#txtContrasenia").val() == ""){
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
	$("#txtUsuario, #txtContrasenia").keyup(function(){
		if( $(this).val() != "" ){
			$(".error").fadeOut();
			return false;
		}
	});
	/*$(".email").keyup(function(){
		if( $(this).val() != "" && emailreg.test($(this).val())){
			$(".error").fadeOut();			
			return false;
		}		
	});*/
});