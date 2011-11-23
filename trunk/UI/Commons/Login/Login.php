<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<link href="Login.css" type="text/css" rel="stylesheet" />

<title>Login</title>
</head>

    <body>
<div class="Cuadro">
        
        <p class="Titulo">INGRESAR</p>
        <p class="Titulo2">Sólamente usuarios con cuenta</p>
        
        <form method="post" id="frmLogin" action="#" class="form_settings">
            <p>
            <label class="Texto" for="txtUsuario">Usuario:</label>
            </p>
            <p>
            <input type="text" name="txtUsuario" id="txtUsuario" class="texto" />
            </p>
            <p>
            <label class="Texto" for="TxtContrasenia">Password:</label>
            </p>
            <p>
            <input type="password" name="txtContrasenia" id="txtContrasenia" class="texto" />
            </p>
            <p>
            <label class="Texto"><input type="checkbox" name="chkRecordarme" id="chkRecordarme" /> Recordarme</label>
            
            <input type="submit" id="btnIngresar" value="Ingresar" class="botonenviar" />
            </p>
        </form>
        
      </div>
    </body>

</html>