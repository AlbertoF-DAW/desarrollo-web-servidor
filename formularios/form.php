<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input id="nombre" type="text" name="nombre">
        <br>
        <label for="apellidos">Apellidos:</label>
        <input id="apellidos" type="text" name="apellidos">
        <br>
        <input type="submit">
    </form>
    <br><br>
    <?php
    foreach ($_SERVER as $k => $v)
        echo $k, "->", $v, "<br>";
    echo "<br><br>";
    foreach ($_ENV as $k => $v)
        echo $k, "->", $v, "<br>";
    echo "<br><br>";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        foreach ($_POST as $k => $v)
            echo $k, "->", $v;
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        //echo "<h3>$nombre ----> $apellidos</h3>";
    }
    ?>
</body>

</html>