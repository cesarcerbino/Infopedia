<?php
    if($_SESSION['condicional']== "2"){
         $titulo = $_SESSION['titulo'];
         $fecha = $_SESSION['fecha'];
    }  
    else{
         $titulo = mysqli_real_escape_string($db,$_GET['titulo']);
         $fecha = mysqli_real_escape_string($db,$_GET['fecha']);
         $_SESSION['titulo'] = $titulo;
         $_SESSION['fecha'] = $fecha;
    }
    $sql = "SELECT * FROM guias WHERE titulo = '$titulo' AND fecha = '$fecha'";
    $querry = mysqli_query($db,$sql);
    $queryResults = mysqli_num_rows($querry);
    if($queryResults > 0 ){
        while($row = mysqli_fetch_assoc($querry)){
            if($row['pdf'] == "NO" ){
                echo "<div class='guia'  Style='
                background-color: rgba(0,0,0,0.3);
                width: 80%;
                margin-left:10%;
                margin-right:10%;
                margin-top:20px;
                margin-bottom:10px;
                color:white;
                border-radius:5px;
                padding:5px;
                '>
                    <h1>".$row['titulo']."</h3>
                    <p id='fecha'> Fecha de publicacion: ".$row['fecha']."</p>
                    <p>".str_replace("\r\n",'<br />', $row['texto'])."</p>
                    <p style='text-align:right; margin-right:10px;'> autor: ".$row['usuarios_nom_us']."</p> 
                    <div class='likes'>
                        <form method='POST' action='articulo.php'>
                            <button name='like'><i class='fas fa-thumbs-up'></i></button>
                            <p>".$cantidadlikes."</p>
                            <button name='dislike'><i class='fas fa-thumbs-down'></i></button>
                            <p>".$cantidaddislikes."</p>
                        </form>
                    </div>
                </div>";
            }        
            else{
                echo "
                <div class='guia'  Style='
                background-color: rgba(0,0,0,0.3);
                width: 80%;
                margin-left:10%;
                margin-right:10%;
                margin-top:20px;
                margin-bottom:10px;
                color:white;
                border-radius:5px;
                padding:5px;
                '>
                    <h1>".$row['titulo']."</h3>
                    <p id='fecha'> Fecha de publicacion: ".$row['fecha']."</p>
                    <p>".$row['descripcion']."</p>
                    <p style='text-align:right; margin-right:10px;'> autor: ".$row['usuarios_nom_us']."</p> 
                    <div class='descarga-likes'>
                        <a href='articulo.php?titulo=".$row['titulo']."&fecha=".$row['fecha']."&file=".$row['pdf']."'> Descargar Archivo </a>    
                        <div class='likes'>
                                <form method='POST' action='articulo.php'>
                                <button name='like'><i class='fas fa-thumbs-up'></i></button>
                                <p>".$cantidadlikes."</p>
                                <button name='dislike'><i class='fas fa-thumbs-down'></i></button>
                                <p>".$cantidaddislikes."</p>
                                </form>
                        </div>
                    </div>
                </div>";
            }   
        }
    }
    else{
        echo "Hubo un error para cargar la guia.";
    }

?>