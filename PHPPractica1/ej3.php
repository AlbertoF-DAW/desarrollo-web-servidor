<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            padding: 7px;
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
    <h1>Cuadrados perfectos</h1>
    <?php
    $perfect_squares = [];
    for ($i = 1; $i <= 50; $i++)
        array_push($perfect_squares, $i * $i);
    for (print("<table>"), $i = 0; $i < 50; $i++)
        echo "<tr><td>", $perfect_squares[$i], "</td><td>", $i + 1, "</td></tr>";
    echo "</table>";
    ?>
</body>

</html>