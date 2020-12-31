<?php include('server.php'); ?>
<!DOCTYPE html5>
<html lang="es">
    
    <head>
        <LINK REL=StyleSheet HREF="../Styles/Styleregister.css" TYPE="text/css" />
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
                    <p>Registro de Usuario</p>
                </div>
                <div class="login">
                    <form action="register.php" method="post">
                        <div class="error">
                            <?php  include('error.php'); ?>
                        </div>
                        <p>Email</p>
                        <input type="email" name="Email"  required>
                        <p>Nombre</p>
                        <input type="text" name="Name"  required>
                        <p>Contraseña</p>
                        <input type="password" name="contraseña1" required>
                        <p>Confirmar contraseña</p>
                        <input type="password" name="contraseña2" required>
                        <button type="submit" name="reg_user">Registrarse</button>
                    </form>
                </div>
                <div class="Ingresar">
                    <p>Ya tenes cuenta? <a href="index.php">Ingresar</a></p>
                </div>
            </div>
        </div>
    </body>
</html>