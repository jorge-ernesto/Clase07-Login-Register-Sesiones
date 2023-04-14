<?php
$cnx=mysqli_connect('localhost', 'root', '', 'php2g09', 3306);
mysqli_query($cnx, 'set names utf8');
$q="select * from personas";
$caja=mysqli_query($cnx, $q);

$data=array();
while ($f=mysqli_fetch_assoc($caja)) {
    $data[]=$f;
}
mysqli_close($cnx);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Personas</title>
</head>

<body>
    <a href="registro.html">Nuevo</a>
    <br><br>
    <table border=1>
        <tr>
            <td>Id</td>
            <td>Paterno</td>
            <td>Materno</td>
            <td>Nombre</td>
            <td>DNI</td>
            <td>Foto</td>
        </tr>
        <?php foreach ($data as $r) { ?>
        <tr>
            <td><?=$r['id']?></td>
            <td><?=$r['paterno']?></td>
            <td><?=$r['materno']?></td>
            <td><?=$r['nombre']?></td>
            <td><?=$r['dni']?></td>
            <td>
                <?php if ($r['foto']) { ?>
                <img src="<?="data:image/png;base64,".base64_encode($r['foto']??'')?>" height="100">
                <?php } else { ?>
                -
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>

</html>