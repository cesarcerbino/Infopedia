<?php

$_SESSION['condicional'] = "1";

if(isset($_POST['subircomentario'])){
    $hora = date("YmdHis");
    $contenido = mysqli_real_escape_string($db,$_POST['comentario']);
    $username = $_SESSION['username'];
    $titulo = $_SESSION['titulo'];
    $fecha = $_SESSION['fecha'];
    $_SESSION['condicional'] = "2";
    $sql = ("SELECT id FROM guias WHERE titulo = '$titulo' AND fecha = '$fecha'");
    $querry = mysqli_query($db,$sql);
    $querryresult = mysqli_fetch_assoc($querry);
    $guiaid = $querryresult['id'];
    $sql = ("INSERT INTO comentarios (fecha,contenido,usuarios_nom_us,guias_id) VALUES ('$hora','$contenido','$username','$guiaid')");
    $cargarcomentario = mysqli_query($db,$sql);
}




?>
