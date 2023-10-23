<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <style>
        * {
            padding: 5px;
        }
    </style>
    <?php require '../funciones/user_php.php'; ?>
    <?php require '../funciones/base_de_datos.php'; ?>
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['action'] == 'user') {
            # Validación usuario
            $temp_usuario = depurar($_POST["usuario"]);
            if (!strlen($temp_usuario) > 0) {
                $err_usuario = "El nombre de usuario es obligatorio";
            } else {
                $patron = "/^[a-zA-Z0-9]{4,8}$/";
                if (!preg_match($patron, $temp_usuario)) {
                    $err_usuario = "El nombre debe tener entre 4 y 8 caracteres
                    y contener solamente letras o números";
                } else {
                    $usuario = $temp_usuario;
                }
            }

            # Validar nombre
            $tmp_nombre = depurar($_POST['nombre']);
            if (strlen($tmp_nombre) < 2 || strlen($tmp_nombre) > 30)
                $err_nombre = "El nombre debe tener entre 2 y 30 caracteres";
            else if (!preg_match("/^[a-zA-Z][a-zA-Z ]*[a-zA-Z]$/", $tmp_nombre))
                $err_nombre = "El nombre debe incluir solo letras y espacios";
            else
                $nombre = ucwords(strtolower($tmp_nombre));

            # Validar apellidos
            $tmp_apellidos = depurar($_POST['apellidos']);
            if (strlen($tmp_apellidos) < 2 || strlen($tmp_apellidos) > 30)
                $err_apellidos = "Los apellidos deben tener entre 2 y 30 caracteres";
            else if (!preg_match("/^[a-zA-Z][a-zA-Z ]*[a-zA-Z]$/", $tmp_apellidos))
                $err_apellidos = "Los apellidos deben incluir solo letras y espacios";
            else
                $apellidos = ucwords(strtolower($tmp_apellidos));

            # Validar fecha de nacimiento
            if (strlen($_POST['fecha'] > 0)) {
                $tmp_fecha = new DateTime($_POST['fecha']);
                $hoy = new DateTime();
                $diff_fecha = $hoy->diff($tmp_fecha);
                if ($diff_fecha->format("%y") < 18)
                    $err_fecha = "Es menor de edad";
                else
                    $fecha = $tmp_fecha;
            } else
                $err_fecha = "No hay fecha";
        }
    }
    ?>

    <form action="" method="post">
        <label>Usuario: </label>
        <input type="text" name="usuario">
        <?= isset($err_usuario) ? $err_usuario : '' ?>
        <br><br>
        <label for="nombre">Nombre:</label>
        <input id="nombre" type="text" name="nombre">
        <?= isset($err_nombre) ? "<p>$err_nombre</p>" : '' ?>
        <br>
        <label for="apellidos">Apellido:</label>
        <input id="apellidos" type="text" name="apellidos">
        <?= isset($err_apellidos) ? "<p>$err_apellidos</p>" : '' ?>
        <br>
        <label for="fecha">Fecha de nacimiento:</label>
        <input id="fecha" type="date" name="fecha">
        <?= isset($err_fecha) ? "<p>$err_fecha</p>" : '' ?>
        <br>
        <input type="hidden" name="action" value="user">
        <input type="submit" value="Registrarse">
    </form>
    <?php
    if (isset($usuario) && isset($nombre) && isset($apellidos) && isset($fecha)) {
        $fecha_str = $fecha->format('Y-m-d');

        echo
        "<h3>Usuario: $usuario</h3>",
        "<h3>Nombre: $nombre</h3>",
        "<h3>Apellidos: $apellidos</h3>",
        "<h3>Fecha de nacimiento: $fecha_str</h3>";

        $sql = "INSERT INTO usuarios (usuario, nombre, apellidos, fecha_nacimiento)
            VALUES ('$usuario', '$nombre', '$apellidos', '$fecha_str')";
        
        $connection->query($sql);
    }
    ?>
</body>

</html>