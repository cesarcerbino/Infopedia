<?php
if(isset($_POST['borrarcomentario'])){
    $username = $_SESSION['username'];
    $fecha = $_POST['fechacom'];
    $comentario = $_POST['textocom'];
    
    // * echo $comentario;
    // * echo $fecha;
     $deletesql = "DELETE FROM comentarios 
     WHERE contenido = '$comentario' 
     AND usuarios_nom_us = '$username' 
     AND fecha = ' '";
     $deletequerry = mysqli_query($db,$deletesql);
}
?>