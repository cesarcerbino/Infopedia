

<?php
    if(isset($_POST['SubirArchivo'])){
        $titulo = mysqli_real_escape_string($db,$_POST['Titulo']);
        $categorias = mysqli_real_escape_string($db,$_POST['categoria']);
        $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']);
        $username = $_SESSION['username'];
        $hora = date("YmdHis");

        if($categorias == "Redes"){
                $categoria = 1;
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

        $filename = $_FILES['file']['name'];
        $fichero = $_FILES['file']['tmp_name'];
        $filesize = $_FILES['file']['size'];
        $fileExt = explode('.',$filename);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = "pdf";
        if($fileActualExt == $allowed){
            if($filesize < 40000000){
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/server_files/'; //find the sv folder
                move_uploaded_file($_FILES['file']['tmp_name'],$carpeta_destino.$filename);
                $sql = "INSERT INTO guias (titulo , fecha , descripcion , texto ,pdf,usuarios_nom_us, categorias_id) VALUES ('$titulo','$hora','$descripcion','$descripcion','$filename','$username','$categoria')";
                $subirarchivo = mysqli_query($db,$sql);
            }
            else{
            }
        }
        else{
        }
    }

?>


