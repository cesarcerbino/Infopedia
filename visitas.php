<?php
    $sql = ("SELECT id FROM guias WHERE titulo = '$titulo' AND fecha = '$fecha'");
    $querry = mysqli_query($db,$sql);
    $querryresult = mysqli_fetch_assoc($querry);
    $guiaid = $querryresult['id'];
    $username = $_SESSION['username'];
    $hora = date("YmdHis");
    $visita = "SELECT * FROM visitas WHERE usuarios_nom_us = '$username' AND guias_id = '$guiaid'";
    $result = mysqli_query($db,$visita);
    $visitacant = mysqli_num_rows($result);
    if ($visitacant == 0){
        $visitanueva = "INSERT INTO visitas (fecha,usuarios_nom_us,guias_id) VALUES ('$hora','$username','$guiaid')";
        $insertarvisitas = mysqli_query($db,$visitanueva);

    }
    else{
            
    }
?>