<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVA</title>
    <style>
        * {
            padding: 5px;
        }
    </style>
    <?php require 'ivaPHP.php'; ?>
</head>

<body>
    <form action="" method="post">
        <label for="precio">Precio:</label>
        <input id="precio" type="number" name="precio">
        <br>
        <label for="iva">IVA:</label>
        <select id="iva" name="iva">
            <option value="SIN IVA">
                Sin IVA
            </option>
            <option value="SUPERREDUCIDO">
                Superreducido
            </option>
            <option value="REDUCIDO">
                Reducido
            </option>
            <option value="GENERAL">
                General
            </option>
        </select>
        <input type="hidden" name="action" value="iva">
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['action'] == 'iva') {
            $precio = (float) $_POST['precio'];
            $ivatype = $_POST['iva'];
            echo "<p>", precioconiva($precio, $ivatype), "</p>";
        }
    }
    ?>

    <hr>

    <form action="" method="post">
        <label for="salario">Salario:</label>
        <input id="salario" type="number" name="salario" step="1000">
        <br>
        <input type="hidden" name="action" value="irpf">
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['action'] == 'irpf') {
            $salario = (float) $_POST['salario'];
            echo ($salario);
        }
    }
    ?>
</body>

</html>