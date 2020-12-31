<?php  
    error_reporting(0);
    include('dbconnect.php');
    include('subircomentario.php');
    include('likes2.php');
    include('download.php');
    include('visitas.php');
    include('borrarcomentario.php');
    if(!isset($_SESSION['username'])){
        $_SESSION['msg']="Primero tenes que iniciar sesion";
        header("Location: index.php");

    }
?>
<!DOCTYPE HTML5>
<html >
    <head>
        <script src=”prefixfree.min.js” type="text/javascript"></script>
        <script src="./Scripts/comentarios.js"></script>
        <LINK REL=StyleSheet HREF="./Styles/Guiascategorias.css?v=1" TYPE="text/css" />
        <LINK REL=StyleSheet HREF="./Styles/Barraarriba.css?v=1" TYPE="text/css" />
        <LINK REL=StyleSheet HREF="./Styles/categorias.css?v=1" TYPE="text/css" />
        <LINK REL=StyleSheet href="./Styles/articulo.css?v=1" TYPE ="text/css"/>
        <script src="https://kit.fontawesome.com/032d71f8ad.js" crossorigin="anonymous"></script>
        <script src="../Scripts/Sidebar.js"></script>
        <title>INFOPEDIA</title>
        <link rel="shortcut icon" href="../Imagenes/logo.png" />
    </head>
    
        <!--======================= BODY =======================-->
    <body>
       <div class="barraarriba">
           <div class="logo">
           <img src="../Imagenes/logo.png"> 
           <a href="principal.php" id="infopedia">INFOPEDIA</a>
            </div>
           <div class="navegationbar">
               <form action="search.php"  method="POST">
               <input type="search" name="search" placeholder="Buscar"> <button type="submit" name="buscar"><i class="fas fa-search"></i>
               </button>
               </form>
           </div>
           
           
           <div class="Nombredeusuario">   <!-- Opciones para usuario y nombre de usuario-->
                <ul>
                     <li ><?php echo $_SESSION['username']; ?>
                        <ul>
                            <li ><a href="perfil.php">Historial</a></li>
                            <?php
                                if($_SESSION['tipo'] == 'admin'){
                                echo "<li ><a onclick='subir()'>Subir Guia</a></li>";
                            }
                            ?>
                            <li><a href="sessionend.php">Cerrar Sesion</a></li>
                        </ul>
                    </li>
                </ul>    
            </div>
        </div>
        <div class="cuerpov2">
            <center>
            <div class="Opciones">
                <button id="cerrar" onclick="cerrar()"><i class="fas fa-times"></i></button>
                <button id="arriba" onclick="location.href='subirarchivo.php'"> <i class="fas fa-file-upload fa-1x"></i>  Cargar Archivo </button>
                <hr id="izq">
                <h3>O</h3>
                <hr id="der">
                <button id="abajo" onclick="location.href='RedactarGuia.php'"><i class="fas fa-keyboard fa-1x"></i> Crear Guia</button>
            </div>
            </center>
            <div class="guiamarco">
                <?Php include('mostrar_guia.php')?>
            </div>         
            <!-- COMENTARIOS: -->
            <div class='subircomentario'>
                <form action='articulo.php'   id='formulario' method="post">
                    <textarea name='comentario' type='texto' id='text' onkeyup='countChars(this);' name='comentario'></textarea>
                    <div class='subir'>
                        <p id='charNum'>0/500</p>
                        <button name="subircomentario" id='subircomentario'>Subir</button>
                    </div>
                </form>
            </div>                
            <?php
                include('comentarios.php');
            ?>
        </div>
    </body>
</html>