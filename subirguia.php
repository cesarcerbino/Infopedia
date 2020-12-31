<?php
    /*
        Categorias ID: 
            Redes => 1
            Hardware => 2
            Base de datos => 3
            Programacion => 4
            Modelos y Sistemas => 5
            Seg Informatica => 6
            Sis digitales => 7
    */

    // cuando se pulsa el boton para subir se carga todo a la base de datos. 

    if(isset($_POST['subir'])){
        $texto = mysqli_real_escape_string($db,$_POST['textarea']);
        $username = $_SESSION['username'];
        $hora = date("YmdHis");
        $titulo = mysqli_real_escape_string($db,$_POST['Titulo']);
        $categorias = mysqli_real_escape_string($db,$_POST['categoria']);    

        if($categorias == "Redes"){
                $categoria = 1 ;
        }
        else if($categorias == "Hardware"){ 
           $categoria = 2;
        }
        else if($categorias == "Base de datos"){
            $categoria = 3;
        }
        else if($categorias == "Programacion"){
            $categoria = 4;
        }
        else if($categorias == "Modelos y sistemas"){
            $categoria = 5;
        }
        else if($categorias == "Seguridad informatica"){
            $categoria = 6;
        }
        else if($categorias == "Sistemas Digitales"){
            $categoria = 7;
        }
        $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']);
        //echo "DESCRIPCION -> ",$descripcion," HORA-> " ,$hora ," CATEGORIA ->" ,$categoria," USUARIO -> " ,$username," TEXTO -> " ,$texto, " TITULO-> ", $titulo;
        $subirguia = "INSERT INTO guias (titulo , fecha , descripcion , texto,pdf ,usuarios_nom_us, categorias_id) VALUES ('$titulo','$hora','$descripcion','$texto','NO','$username','$categoria')";
        $guiaquerry = mysqli_query($db,$subirguia);
    }
?>
