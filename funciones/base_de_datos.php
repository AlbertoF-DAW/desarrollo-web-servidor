<?php
    $_server = 'localhost';
    $_user = 'root';
    $_pass = 'medac';
    $_db = 'db_usuarios';

    $connection = new mysqli($_server, $_user, $_pass, $_db)
        or die('Error de conexion');
?>