<?php
    session_destroy();
    header("Location: index.php");
    $_SESSION['username'] = "";
    $_SESSION[]="";
?>