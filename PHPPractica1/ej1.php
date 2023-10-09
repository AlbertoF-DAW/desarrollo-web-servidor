<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ1</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            padding: 2px;
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
    </style>
</head>

<body>
    <h1>Tablas de multiplicar</h1>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo $i == 6 ? "<br>" : "";
        echo "<table>";
        echo "<caption>Tabla del $i</caption>";
        for ($j = 1; $j <= 10; $j++)
            echo "<tr><td>$i x $j = ", $i * $j, "</td></tr>";
        echo "</table>";
    }
    ?>
</body>

</html>