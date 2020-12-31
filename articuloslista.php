<?php
  include('dbconnect.php');
    if(!isset($_SESSION['username'])){
        $_SESSION['msg']="Primero tenes que iniciar sesion";
        header("Location: login.php");
    }
    
?>

<!DOCTYPE HTML5>
<html >
    
    <head>
        <script src=”prefixfree.min.js” type="text/javascript"></script>
        <LINK REL=StyleSheet HREF="./Styles/Guiascategorias.css?v=1" TYPE="text/css" />
        <LINK REL=StyleSheet HREF="./Styles/Barraarriba.css?v=1" TYPE="text/css" />
        <LINK REL=StyleSheet HREF="./Styles/categorias.css?v=1" TYPE="text/css" />
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
    <div class="cuerpo">
        <center>
        <div class="Opciones">
            <button id="cerrar" onclick="cerrar()"><i class="fas fa-times"></i></button>
            <button id="arriba"  onclick="location.href='subirarchivo.php'"> <i class="fas fa-file-upload fa-1x"></i>  Cargar Archivo </button>
            <hr id="izq">
            <h3>O</h3>
            <hr id="der">
            <button id="abajo" onclick="location.href='RedactarGuia.php'"><i class="fas fa-keyboard fa-1x"></i> Crear Guia</button>
        </div>
        </center>
        <div class="Cajacategorias">                                    
          <div class="CATTI">
                  <p>Categorias</p>
                </div>
                <div class="categorias">
                <br>
                    <a href="articuloslista.php?id=1" >Redes</a> <!--1-->
                    <hr>
                    <a href="articuloslista.php?id=2" >Hardware</a> <!--2-->
                    <hr>
                    <a href="articuloslista.php?id=3">Base de datos</a> <!--3-->
                    <hr>
                    <a href="articuloslista.php?id=4">Programacion</a> <!--4-->
                    <hr>
                    <a href="articuloslista.php?id=5">Modelos Y sistemas</a> <!--5-->
                    <hr>
                    <a href="articuloslista.php?id=6">Seguridad Informatica</a> <!--6-->
                    <hr>
                    <a href="articuloslista.php?id=7">Sistemas Digitales</a> <!--7-->
                    <hr>
                </div>  
        </div>                                                                                                                                                            
        <div class="miniaturas">
            <?php include('miniaturas.php') ?>
        </div>
    </div>
    </body>
</html>