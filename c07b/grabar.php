<?php

$a=$_POST['txtpat'];
$b=$_POST['txtmat'];
$c=$_POST['txtnom'];
$d=$_POST['txtdni'];

$f1=$_FILES['foto']['name'];
$f2=$_FILES['foto']['tmp_name'];

# Pasar contenido de archivo a variable
$ff=fopen($f2, 'r');
$imagen=fread($ff, filesize($f2));
$imagen=addslashes($imagen);
fclose($ff);
# Fin de conversion

$q="insert into personas(paterno,materno,nombre,dni,foto) ";
$q.=" values('$a','$b','$c','$d','$imagen')";

$cnx=mysqli_connect('localhost', 'root', '', 'php2g09', 3306);
mysqli_query($cnx, 'set names utf8');
$ex=mysqli_query($cnx, $q);

header('location: listado.php');