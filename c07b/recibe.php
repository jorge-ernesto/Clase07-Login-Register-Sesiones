<?php

//var_dump($_GET);
//var_dump($_POST);
var_dump($_FILES);


if ($_FILES['archivo']['error']>0) {
    echo "Error al subir archivo";
    die();
} else {
    # Llego bien
    $nombre_real=$_FILES['archivo']['name'];
    $nombre_temporal=$_FILES['archivo']['tmp_name'];
    if (file_exists("imagenes/$nombre_real")) {
        echo "ya existe el archivo en la carpeta";
    } else {
        //procedemos a moverlo
        move_uploaded_file($nombre_temporal, 'imagenes/'.$nombre_real);
        echo '<img src="imagenes/'.$nombre_real.'" height=100/>';
    }
}
