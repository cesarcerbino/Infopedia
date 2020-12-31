<?php
    $username = $_SESSION['username'];
    $consultadevisitas = "SELECT * FROM visitas WHERE usuarios_nom_us = '$username'";
    $queryvisitas = mysqli_query($db,$consultadevisitas);
    $cantidadvisitas = mysqli_num_rows($queryvisitas);
    if($cantidadvisitas >0 ){
        while($row = mysqli_fetch_assoc($queryvisitas)){
            $guia_id = $row['guias_id'];
            $sql = "SELECT * FROM guias WHERE id = '$guia_id'";
            $result = mysqli_query($db,$sql);
            $queryResults = mysqli_num_rows($result);
                if ($queryResults > 0 ){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<a href='articulo.php?titulo=".$row['titulo']."&fecha=".$row['fecha']." &condicion=".$condicion."  ' style=' text-decoration:none; color:white;'><div style=' 
                                height: 100%;
                                width: 100%;
                                border-bottom:1px solid white;
                                padding-left: 10px;
                                margin-bottom:10px;'>
                            <h3>".$row['titulo']."</h3>
                            <p id='fecha'> Fecha de publicacion: ".$row['fecha']."</p>
                            <p>".$row['descripcion']."</p>
                            <p style='text-align:right; margin-right:10px;'> autor: ".$row['usuarios_nom_us']."</p> 
                        </div> </a>";
                    }
                }
        }
    }
    
    
    
?>
