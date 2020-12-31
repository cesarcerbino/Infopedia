<?php
    if(isset($_GET['file'])){
        $file = $_GET['file'];
        $filepath =  $_SERVER['DOCUMENT_ROOT'] .'/server_files/' . $file;
        header('Content-Type: application/octet-stream');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment;filename='.basename($filepath));
        header('Expires: 0');
        Header('Cache-Control: must-revalidate');
        header('Pragma:public');
        header ('Content-length:'.filesize($filepath));
        readfile($filepath);
    }
?>