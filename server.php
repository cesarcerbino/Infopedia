<?php
include('dbconnect.php');


$username = "";
$email = "";
$password1="";
$password2="";
$password = "";
$errors = array();

//the register starts when the "reg_user" button isset

If(isset($_POST['reg_user'])){
$hora = date("YmdHis");
$tipo = "basico";
$estado = "activo";
$username = mysqli_real_escape_string($db, $_POST['Name']);
$email = mysqli_real_escape_string($db, $_POST['Email'] );
$Password1 = mysqli_real_escape_string($db, $_POST['contraseña1'] );
$Password2 = mysqli_real_escape_string($db, $_POST['contraseña2'] );

//if any variable is empty -> push array error 

if(empty($username)){
    array_push($errors,'El nombre es obligatorio');
}

if(empty($email)){
    array_push($errors,'El Email es obligatorio');
}
if(empty($Password1)){
    array_push($errors,'La contraseña es obligatoria');
}
if(empty($Password2)){
    array_push($errors,'Debe confirmar la contraseña');
}
if($Password1 != $Password2){
    array_push($errors,'Las contraseñas no coinciden');
}

//If the user already exists -> push array error

$user_check_querry = "SELECT * FROM usuarios WHERE nom_us = '$username' OR mail =' $email 'LIMIT 1";
$results = mysqli_query($db, $user_check_querry);
$user = mysqli_fetch_assoc($results);

if ($user){
    if($user['nom_us']==$username){
        array_push($errors,'Este Nombre de usuario ya existe');
    }
    if($user['email']==$email){
        array_push($errors,'Este Email ya esta registrado');
    }
}

//register the user if there are no errors

if(count($errors)==0){
    $password = md5($Password1); //password encript 
    $query = "INSERT  INTO usuarios (nom_us,mail,contraseña,f_creacion,estado,tipo) VALUES ('$username','$email','$password','$hora','$estado','$tipo')";
    mysqli_query($db,$query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "Registro completado";
    header("Location: index.php");
    }
}

//LOGGIN DE USUARIOS

if(isset($_POST['log_user'])){

    $username = mysqli_real_escape_string($db, $_POST['nombre']);
    $Password1 = mysqli_real_escape_string($db, $_POST['contraseña1'] );

    if(empty($username)){
        array_push($errors,'El nombre de usuario es obligatorio');
    }
    if(empty($Password1)){
        array_push($errors,'La contraseña es obligatoria');
    }

  

    if(count($errors)==0){
        //password encript
        $password = md5($Password1);
        
       // $query = "SELECT * FROM users WHERE Username = '$username' AND password = '$password' LIMIT 1 ";
        $query = "SELECT * FROM `usuarios` WHERE nom_us= '$username' AND contraseña = '$password' LIMIT 1";
        
        $results = mysqli_query($db,$query);
        if (mysqli_num_rows($results)){
            $_SESSION['username'] = $username;
            $sql = "SELECT tipo FROM usuarios WHERE nom_us = '$username'";
            $querry = mysqli_query($db,$sql);
            $resultado = mysqli_fetch_assoc($querry);
            $_SESSION['tipo'] = $resultado['tipo'];
            header('Location: principal.php');
           
        }  

        else{
            array_push($errors,'El usuario o contraseña que ingreso no corresponden a una cuenta existente revise los datos ingresados');
        
        }
     }

}
?>