<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <style>
        * {
            padding: 5px;
        }
    </style>
    <?php require '../funciones/db_peliculas_func.php'; ?>
    <?php require '../objetos/pelicula.php'; ?>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['action'] == 'peliculas') {
            # Validación id
            $temp_id = depurar($_POST['id']);
            if (strlen($temp_id) == 0) {
                $err_id = "El ID no puede quedar vacio";
            } else {
                if (!is_numeric($temp_id)) {
                    $err_id = "El ID debe ser un numero";
                } else {
                    $id = (int) $temp_id;
                }
            }
            # Validación titulo
            $temp_titulo = depurar($_POST['titulo']);
            if (strlen($temp_titulo) == 0) {
                $err_titulo = "El titulo no puede quedar vacio";
            } else {
                $titulo = $temp_titulo;
            }
            # Validación fecha estreno
            $temp_fecha = depurar($_POST['fecha']);
            if (strlen($temp_fecha) == 0) {
                $err_fecha = "La fecha de estreno no puede quedar vacio";
            } else {
                $fecha = new DateTime($temp_fecha);
            }
            # Validación edad recomendada
            $temp_edad_rec = depurar($_POST['edad_rec']);
            if (strlen($temp_edad_rec) == 0) {
                $err_edad_rec = "La edad recomendada no puede quedar vacio";
            } else {
                $edad_rec = $temp_edad_rec;
            }
        }
    }
    ?>

    <form action="" method="post">
        <label>ID pelicula: </label>
        <input type="text" name="id">
        <?= isset($err_id) ? $err_id : '' ?>
        <br><br>
        <label for="titulo">Titulo:</label>
        <input id="titulo" type="text" name="titulo">
        <?= isset($err_titulo) ? "<p>$err_titulo</p>" : '' ?>
        <br><br>
        <label for="fecha">Fecha de estreno:</label>
        <input id="fecha" type="date" name="fecha">
        <?= isset($err_fecha) ? "<p>$err_fecha</p>" : '' ?>
        <br><br>
        <label for="edad_rec">Edad recomendada:</label>
        <input id="edad_rec" type="text" name="edad_rec">
        <?= isset($err_edad_rec) ? "<p>$err_edad_rec</p>" : '' ?>
        <br><br>
        <input type="hidden" name="action" value="peliculas">
        <input type="submit" value="Insertar">
    </form>
    <?php
    if (isset($id) && isset($titulo) && isset($fecha) && isset($edad_rec)) {
        $fecha_str = $fecha->format('Y-m-d');

        echo
        "<h3>ID: $id</h3>",
        "<h3>Titulo: $titulo</h3>",
        "<h3>Fecha de estreno: $fecha_str</h3>",
        "<h3>Edad recomendada: $edad_rec</h3>";

        $sql = "INSERT INTO usuarios (usuario, nombre, apellidos, fecha_nacimiento)
            VALUES ('$id', '$titulo', '$fecha_str', '$edad_rec')";

        $connection->query($sql);
    }
    ?>
</body>

</html>