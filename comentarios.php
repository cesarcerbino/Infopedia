<?php
$sql = ("SELECT id FROM guias WHERE titulo = '$titulo' AND fecha = '$fecha'");
$querry = mysqli_query($db,$sql);
$querryresult = mysqli_fetch_assoc($querry);
$guiaid = $querryresult['id'];
$sql = ("SELECT * FROM comentarios WHERE guias_id = '$guiaid'");
$resultado = mysqli_query($db,$sql);
$queryResults = mysqli_num_rows($resultado);
if ($queryResults > 0 ){
    while($row = mysqli_fetch_assoc($resultado)){
        if ( $row['usuarios_nom_us'] == $_SESSION['username']){
            echo 
            "
            <form method='post'>
                <div class='comentario'>                            
                    <p>".str_replace("\r\n",'<br />', $row['contenido'])."</p>
                    <div class='fecha-usuario'>
                        <p name='textocom'>".$row['usuarios_nom_us']."</p>
                        <p name='fechacom'>".$row['fecha']."</p>
                    </div>
                    <button name='borrarcomentario'>X</button>                       
                </div>
            </form>"; 
        }
        else{
            echo 
            "<div class='comentario'>                            
                <p>".str_replace("\r\n",'<br />', $row['contenido'])."</p>
                <div class='fecha-usuario'>
                    <p>".$row['usuarios_nom_us']."</p>
                    <p>".$row['fecha']."</p>
                </div>
             </div>";
        }    
    }
}
?>