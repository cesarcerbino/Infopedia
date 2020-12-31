<?php include('server.php'); ?>
<!DOCTYPE html5>
<html lang="es">
    <head>
        <!--<LINK REL=StyleSheet HREF="../Styles/StyleLogin.css?v=1" TYPE="text/css" />-->
        <LINK REL=StyleSheet HREF="../Styles/Styleindex.css?v=1" TYPE="text/css" />
        <LINK REL=StyleSheet HREF="../Styles/Barraarriba.css" TYPE="text/css" />
        <title>INFOPEDIA</title>
        <link rel="shortcut icon" href="../Imagenes/logo.png" />
    </head>
        <!--======================= BODY =======================-->
    <body>
       <div class="barraarriba">
        <div class="logo">
           <img src="../Imagenes/logo.png"> 
            <p>INFOPEDIA</p>
        </div>  
        </div>
        <div class="body2">
            <div class="caja">
                <div class="Titulo">
                    <p>Iniciar Sesión</p>
                </div>
                <div class="login">
                    <form action="index.php" method="post">
                        <?php  include('error.php'); ?>
                        <p>Nombre de usuario</p>
                        <input type="text" name="nombre" required>
                        <br>
                        <p>Contraseña</p>
                        <input type="password" name="contraseña1" required>
                        <button type="submit"  name="log_user">Ingresar</button>
                    </form>
                </div>    
                <div class="registro">
                    <p>No tenes una cuenta? <a href="register.php">Registrate</a></p>
                </div>
            </div>
        </div>
    </body>
</html>
