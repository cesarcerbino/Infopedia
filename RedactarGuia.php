<?php
  include('dbconnect.php');
  include('subirguia.php');
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
        <script Type = "text/javaScript" src="./Scripts/comentarios.js"></script>
        <script Type = "text/javaScript" src="./Scripts/SubirGuias.js"></script>
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

        <div class="zonaderedaccion" id="parte1">
            <form method="POST">
                <br>    
                <h1>CREAR GUIA</h1>   
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
                <div class="texto-edicion" >
                    <textarea name="textarea" id="texto" onkeyup='countChars2(this)';></textarea>
                   <!-- <div class="editor" disabled="true">
                        <button > <i class="fas fa-align-center fa-2x"></i></button>
                        <button > <i class="fas fa-align-left fa-2x"></i></button>
                        <button > <i class="fas fa-align-right fa-2x"></i></button>
                        <button > <i class="fas fa-align-justify fa-2x"></i></button>
                        <button > <i class="fas fa-bold fa-2x"></i></button>
                        <button > <i class="fas fa-italic fa-2x"></i></button>
                        <button > <i class="fas fa-underline fa-2x"></i></button>
                        <button > <i class="fas fa-highlighter fa-2x"></i></button>
                        <button > <i class="fas fa-list fa-2x"></i></button>
                        <button > <i class="fas fa-trash fa-2x"></i></button>
                    </div>-->
                </div>

                <div class="boton-subir">
                    <p id='charNum'>0/5000</p>   
                    <button type="button" onclick="cambiarpantalla()" name="siguiente">Siguiente <i class="fas fa-arrow-right"></i></button>
                </div>
        </div>
        <div class="descripcion">
                <br>    
                <h2>Agregue una descripcion</h2>   
                <div>
                    <p>Esta pequeña descripcion se mostrara en la miniatura de la guia</p>
                    <textarea name="descripcion"  required></textarea>
                </div>
                <div class="botones">
                    <button onclick="volver()"><i class="fas fa-arrow-left"></i> Volver</button>
                    <button  name="subir">Subir</button>
                </div>
            </form>
        </div>
    </body>
</html>