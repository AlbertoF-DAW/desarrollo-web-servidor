<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 3: Arrays</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
    $productos = [
        ["Monster Energy", 2.3],
        ["Cafe Frio", 0.89],
        ["Pistola", 389.95],
        ["Nada", 0.0],
        ["Reponedor", 1450.45],
        ["Twix", 2.1],
        ["Tiempo", -15],
    ];

    function sumar1($carry, $item)
    {
        $carry += $item[1];
        return $carry;
    }
    function sumar2($carry, $item)
    {
        $carry += $item[2];
        return $carry;
    }
    function multisum($carry, $item)
    {
        $carry += $item[1] * $item[2];
        return $carry;
    }
    ?>

    <!-- Ejercicio 1 -->
    <h1>Ejercicio 1</h1>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            array_multisort(array_column($productos, 0), SORT_ASC, $productos);
            foreach ($productos as $producto) {
                list($n, $p) = $producto;
                printf("<tr><td>%s</td><td>%.2f</td></tr>", $n, $p);
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <?php
                echo "<td>", count($productos), "</td>";
                echo "<td>", array_reduce($productos, "sumar1", 0), "</td>";
                ?>
            </tr>
        </tfoot>
    </table>
    <br><br>

    <!-- Ejercicio 2 -->
    <h1>Ejercicio 2</h1>
    <?php
    for ($i = 0; $i < count($productos); $i++)
        $productos[$i][2] = rand(1, 6);
    ?>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //array_multisort(array_column($productos, 0), SORT_ASC, $productos);
            foreach ($productos as $producto) {
                list($n, $p, $c) = $producto;
                printf("<tr><td>%s</td><td>%.2f</td><td>%d</td><td>%.2f</td></tr>", $n, $p, $c, $p * $c);
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <?php
                echo "<td>", count($productos), "</td>";
                echo "<td>", array_reduce($productos, "sumar1", 0), "</td>";
                echo "<td>", array_reduce($productos, "sumar2", 0), "</td>";
                echo "<td>", array_reduce($productos, "multisum", 0), "</td>";
                ?>
            </tr>
        </tfoot>
    </table>
    <br><br>

    <!-- Ejercicio 3 -->
    <h1>Ejercicio 3</h1>
</body>

</html>