<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <style>
        * {
            padding: 5px;
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
        }

        form {
            border: 1px solid black;
        }
    </style>
    <?php require 'prodPHP.php'; ?>
</head>

<body>

    <br><br>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input id="nombre" type="text" name="nombre">
        <br><br>
        <label for="precio">Precio:</label>
        <input id="precio" type="number" name="precio" step="0.01">
        <br><br>
        <label for="cantidad">Cantidad:</label>
        <input id="cantidad" type="number" name="cantidad">
        <br><br>
        <input type="submit" value="Añadir producto">
    </form>
    <br><br>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        addProd($_POST['nombre'], (float) $_POST['precio'], (int) $_POST['cantidad']);
    mostrarTabla();
    ?>
</body>

</html>