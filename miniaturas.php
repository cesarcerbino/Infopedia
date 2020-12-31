<?php
$condicion = 1;
$categoria = $_GET["id"];
$sql = "SELECT * FROM guias WHERE categorias_id ='$categoria'";
$result = mysqli_query($db,$sql);
$queryResults = mysqli_num_rows($result);
if ($queryResults > 0 ){
    while($row = mysqli_fetch_assoc($result)){
        echo "<a href='articulo.php?titulo=".$row['titulo']."&fecha=".$row['fecha']." &condicion=".$condicion."  ' style=' text-decoration:none; color:white;'><div style=' 
                height: 100%;
                width: 100%;
                background-color: rgba(0,0,0,0.3);
                padding-left: 10px;
                border-radius: 5px;
                margin-bottom:10px;'>
            <h3>".$row['titulo']."</h3>
            <p id='fecha'> Fecha de publicacion: ".$row['fecha']."</p>
            <p>".$row['descripcion']."</p>
            <p style='text-align:right; margin-right:10px;'> autor: ".$row['usuarios_nom_us']."</p> 
        </div> </a>";
    }
}
else{
    echo "No hay resultados para esta categoria";
}
?>