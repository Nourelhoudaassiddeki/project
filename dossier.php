<?php
$file =$_GET['file'];
if(file_exists('files/'.$file)){
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    header('Content-Description:File Transfer');
    header('Expires:0');
header('Cache-control:must-revelidate');
header('Programa: public');
header('Content-length:'.filesize('files/'.$file));
// read file
readfile('files/'.$file);
exit;
}else{
    echo "file not found";
}