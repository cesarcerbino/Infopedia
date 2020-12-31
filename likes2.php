<?php
    $username = $_SESSION['username'];  
    $titulo = $_SESSION['titulo'];
    $fecha = $_SESSION['fecha'];    
    
    $sql = ("SELECT id FROM guias WHERE titulo = '$titulo' AND fecha = '$fecha'");
    $querry = mysqli_query($db,$sql);
    $querryresult = mysqli_fetch_assoc($querry);
    $guiaid = $querryresult['id'];
    

    $likesconsulta = ("SELECT * FROM votos WHERE guias_id = '$guiaid' and tipo = '1' ");
    $consulta1 = mysqli_query($db,$likesconsulta);
    $cantidadlikes = mysqli_num_rows($consulta1);
    
    //consulta para cantidad de dislikes
    $dislikesconsulta = ("SELECT * FROM votos WHERE guias_id = '$guiaid' and tipo = '0' ");
    $consulta2 = mysqli_query($db,$dislikesconsulta);
    $cantidaddislikes = mysqli_num_rows($consulta2);
    
    //se fija si el usuario ya voto

    $sql = "SELECT tipo FROM votos WHERE guias_id = '$guiaid' AND usuarios_nom_us = '$username'";
    $consultavoto = mysqli_query($db,$sql);
    $resultadovoto = mysqli_num_rows($consultavoto);
	
	//Me fijo si coincide el voto
	$tipo_voto_row = mysqli_fetch_assoc($consultavoto);
    $tipo_voto = $tipo_voto_row['tipo'];

    if(isset($_POST['like'])){
        $_SESSION['condicional'] = "2";
        if ($resultadovoto == 0){
            $like = "INSERT INTO votos (tipo,usuarios_nom_us,guias_id) VALUES ('1','$username','$guiaid')";
            $insertarlike = mysqli_query($db,$like);
        }
	// Borro solamente si cambio su voto.
        elseif ($tipo_voto == 0) {
            $borrarvoto = "DELETE FROM votos WHERE usuarios_nom_us = '$username' AND guias_id = '$guiaid'";
            $querryborrar = mysqli_query($db,$borrarvoto);
        }
	// Recalculo la cantidad de likes porque cambia luego de mi voto. 
    $consulta1 = mysqli_query($db,$likesconsulta);
    $cantidadlikes = mysqli_num_rows($consulta1);
    $consulta2 = mysqli_query($db,$dislikesconsulta);
	$cantidaddislikes = mysqli_num_rows($consulta2);
    }

    if(isset($_POST['dislike'])){
        $_SESSION['condicional'] = "2";
        if ($resultadovoto == 0){
            $like = "INSERT INTO votos (tipo,usuarios_nom_us,guias_id) VALUES ('0','$username','$guiaid')";
            $insertarlike = mysqli_query($db,$like);
        }
	// Borro solamente si cambio su voto.
        elseif ($tipo_voto == 1){
            $borrarvoto = "DELETE FROM votos WHERE usuarios_nom_us = '$username' AND guias_id = '$guiaid'";
            $querryborrar = mysqli_query($db,$borrarvoto);
        }
	// Recalculo la cantidad de likes porque cambia luego de mi voto. 
    $consulta1 = mysqli_query($db,$likesconsulta);
    $cantidadlikes = mysqli_num_rows($consulta1);
    $consulta2 = mysqli_query($db,$dislikesconsulta);
	$cantidaddislikes = mysqli_num_rows($consulta2);
    }

?>