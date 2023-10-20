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
</head>

<body>

    <?php
    # La validación de nombre estaria mejor si separamos:
    # primero length, luego pattern
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['action'] == 'user') {
            # Validar nombre
            $tmp_nombre = depurar($_POST['nombre']);
            if (!preg_match("/^[a-zA-Z][a-zA-Z ]{0,28}[a-zA-Z]$/", $tmp_nombre))
                $err_nombre = "Mal nombre, debe tener entre 2 y 30 caracteres,
                 e incluir solo letras y espacios";
            else
                $nombre = ucwords(strtolower($tmp_nombre));
            # Validar apellidos
            $tmp_apellidos = depurar($_POST['apellidos']);
            if (!preg_match("/^[a-zA-Z][a-zA-Z ]{0,28}[a-zA-Z]$/", $tmp_apellidos))
                $err_apellidos = "Mal apellidos, debe tener entre 2 y 30 caracteres,
                 e incluir solo letras y espacios";
            else
                $apellidos = ucwords(strtolower($tmp_apellidos));
            # Validar edad
            $tmp_edad = depurar($_POST['edad']);
            //TODO

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
        <label for="nombre">Nombre:</label>
        <input id="nombre" type="text" name="nombre">
        <?= isset($err_nombre) ? "<p>$err_nombre</p>" : '' ?>
        <br>
        <label for="apellidos">Apellido:</label>
        <input id="apellidos" type="text" name="apellidos">
        <?= isset($err_apellidos) ? "<p>$err_apellidos</p>" : '' ?>
        <br>
        <label for="edad">Edad:</label>
        <input id="edad" type="text" name="edad">
        <?= isset($err_edad) ? "<p>$err_edad</p>" : '' ?>
        <br>
        <label for="fecha">Fecha de nacimiento:</label>
        <input id="fecha" type="date" name="fecha">
        <?= isset($err_fecha) ? "<p>$err_fecha</p>" : '' ?>
        <br>
        <input type="hidden" name="action" value="user">
        <input type="submit" value="AAAAAA">
    </form>
    <?= isset($nombre) ? "<h3>$nombre</h3>" : '' ?>
</body>

</html>