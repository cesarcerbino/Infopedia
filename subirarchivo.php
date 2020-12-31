<?php
  include('dbconnect.php');
  include('archivobackend.php');
    if(!isset($_SESSION['username'])){
        $_SESSION['msg']="Primero tenes que iniciar sesion";
        header("Location: login.php");
    }
?>

<!DOCTYPE HTML5>
<html >
    <head>
        <script src=”prefixfree.min.js” type="text/javascript"></script>
        <LINK REL=StyleSheet HREF="./Styles/Barraarriba.css?v=1" TYPE="text/css" />
        <LINK REL=StyleSheet HREF="./Styles/redactarguia.css?v=1" TYPE="text/css" />
        <LINK REL=StyleSheet HREF="./Styles/Subirarchivo.css?v=1" TYPE="text/css" />
        <script Type = "text/javaScript" src="./Scripts/comentarios.js"></script>
        <script src="https://kit.fontawesome.com/032d71f8ad.js" crossorigin="anonymous"></script>
        <script src="../Scripts/Sidebar.js"></script>
        <title>INFOPEDIA</title>
        <link rel="shortcut icon" href="../Imagenes/logo.png" />
    </head>
        <!--======================= BODY =======================-->
    <body >
       <div class="barraarriba">
            <div class="logo">
                <img src="../Imagenes/logo.png"> 
                <a href="principal.php" id="infopedia">INFOPEDIA</a>
            </div>
           <div class="navegationbar">
               <form action="search.php"  method="POST">
                    <input type="search" name="search" placeholder="Buscar"> 
                    <button type="submit" name="buscar"><i class="fas fa-search"></i></button>
               </form>
           </div>
           
           
           <div class="Nombredeusuario">   <!-- Opciones para usuario y nombre de usuario-->
                <ul>
                     <li ><?php echo $_SESSION['username']; ?>
                        <ul>
                            <li ><a href="perfil.php">Usuario</a></li>
                            <li><a href="sessionend.php">Cerrar Sesion</a></li>
                        </ul>
                    </li>
                </ul>    
            </div>
        </div>

        <!--==================EDITOR DE TEXTO=====================================-->

        <div class="zonaderedaccion2">
            <form method="POST" enctype="multipart/form-data" >
                <h1>Cargar Archivo</H1>
                <div class="titulo-categorias">
                    <div class="input1">
                        <p>Titulo</p>
                        <input id="titulo" required name="Titulo" autocomplete="off"/>
                    </div>
                    <div class="input2">
                        <p>Categoria</p>
                        <input list="categorias" required name="categoria" placeholder="Categoria" autocomplete="off">
                        <datalist id="categorias">
                            <option>Redes</option>
                            <option>Hardware</option>
                            <option>Base de datos</option>
                            <option>Programacion</option>
                            <option>Modelos y sistemas</option>
                            <option>Seguridad Informatica</option>
                            <option>Sistemas Digitales</option>
                        </datalist>
                    </div>
                </div>
                <p>Ingrese una pequeña descripcion para el archivo:</p>
                <textarea name="descripcion"></textarea> 
                <div class="button-subir">
                    <input type="file" name="file" />
                    <button name="SubirArchivo" accept="aplication/pdf">Cargar Archivo <i class="fas fa-file-upload fa-1x"></i></button>
                </div>
            </form>
        </div>
    </body>
</html> 


