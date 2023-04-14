<?php

include_once('libreria.php');

$a=$_POST['txtuser'];
$b=md5($_POST['txtpass']);

$q="select * from usuarios ";
$q.="where usuario='$a' and clave2='$b' and estado=1";

$reg=consultar($q);

if (count($reg)==1) {
    #encontre 1
    session_start();
    $_SESSION['acceso']='concedido';

    header('location: pag01.php');
} else {
    #no existe
    header('location: login.html');
}
