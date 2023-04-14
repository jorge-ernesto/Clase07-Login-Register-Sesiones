<?php

session_start();
if ($_SESSION['acceso']<>'concedido') {
    session_destroy();
    header('location: login.html');
}
