<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 2</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            padding: 5px;
        }

        table {
            margin: 10px;
            display: inline-block;
            color: white;
            background-color: navy;
            border-collapse: collapse;
            border-radius: 8px;
            min-width: 110px;
        }

        form {
            margin: 10px;
            display: inline-block;
            border: 1px solid green;
            background-color: lightcyan;
            min-width: 110px;
        }
    </style>
    <?php require 'util.php'; ?>
</head>

<body>
    <h1>Ejercicio 1</h1>
    <form action="" method="post">
        <input type="number" name="dinero" id="dinero" step="0.01">
        <div>
            <input type="radio" name="divisaFrom" value="EUR" id="divisaFrom1">
            <label for="divisaFrom1">EUR</label>
            <input type="radio" name="divisaFrom" value="USD" id="divisaFrom2">
            <label for="divisaFrom2">USD</label>
            <input type="radio" name="divisaFrom" value="JPY" id="divisaFrom3">
            <label for="divisaFrom3">JPY</label>
        </div>
        <br>
        <div>
            <input type="radio" name="divisaTo" value="EUR" id="divisaTo1">
            <label for="divisaTo1">EUR</label>
            <input type="radio" name="divisaTo" value="USD" id="divisaTo2">
            <label for="divisaTo2">USD</label>
            <input type="radio" name="divisaTo" value="JPY" id="divisaTo3">
            <label for="divisaTo3">JPY</label>
        </div>
        <br>
        <input type="hidden" name="action" value="form-divisa">
        <input type="submit" value="Convertir">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        if ($_POST['action'] == 'form-divisa')
            printf('<p>%.2f %s</p>', cambiarDivisa((float) $_POST['dinero'],
            $_POST['divisaFrom'], $_POST['divisaTo']), $_POST['divisaTo']);
    ?>
    <h1>Ejercicio 2</h1>
    <form action="" method="post">
        <div>
            <label for="num">Número: </label>
            <input type="number" name="num" id="num">
        </div>
        <br>
        <select name="op" id="op">
            <option value="sum">Sumatorio</option>
            <option value="fact">Factorial</option>
        </select>
        <br><br>
        <input type="hidden" name="action" value="form-sumfact">
        <input type="submit" value="Calcular">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['action'] == 'form-sumfact') {
            $num = (int) $_POST['num'];
            $op = $_POST['op'];
            echo '<p><b>', match ($op) {
                'sum' => sumatorio($num),
                'fact' => factorial($num)
            }, '</b></p>';
        }
    }
    ?>
    <h1>Ejercicio 3</h1>
    <?php
    $animales = [
        ["Lobo ibérico", "Mamífero", 2500],
        ["Lince ibérico", "Mamífero", 1668],
        ["Quebrantahuesos", "Ave", 2000],
        ["Oso pardo", "Mamífero", 500]
    ];

    // Modificar tabla -> 4a columna con estado
    for ($i = 0; $i < count($animales); $i++)
        $animales[$i][3] = comprobarEstado($animales[$i][2]);
    ?>
    <h2>Buscar especie</h2>
    <form action="" method="post">
        <div>
            <label for="especie">Especie: </label>
            <input type="text" name="especie" id="especie">
        </div>
        <br>
        <input type="hidden" name="action" value="form-animales">
        <input type="submit" value="Comprobar">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['action'] == 'form-animales') {
            $especie = $_POST['especie'];
            foreach ($animales as $animal) {
                list($esp, $cla, $eje, $est) = $animal;
                if ($especie == $esp)
                    echo "<p>El $esp está $est</p>";
            }
        }
    }
    ?>
    <h2>Lista de especies</h2>
    <table>
        <thead>
            <tr>
                <th>Especie</th>
                <th>Clase</th>
                <th>Ejemplares</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($animales as $animal) {
                list($esp, $cla, $eje, $est) = $animal;
                echo '<tr>',
                "<td>$esp</td>",
                "<td>$cla</td>",
                "<td>$eje</td>",
                "<td>$est</td>",
                '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>