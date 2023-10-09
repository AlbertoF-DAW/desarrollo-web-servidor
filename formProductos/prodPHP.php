<?php
$GLOBALS['tabla'] = [
    ['Pelota', 20.99, 8],
    ['Raqueta', 120.95, 3],
    ['Palo golf', 998.00, 1],
];

function mostrarTabla(): void {
    if (!count($GLOBALS['tabla']))
        return;
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Precio</th><th>Cantidad</th></tr>";
    foreach ($GLOBALS['tabla'] as $prod) {
        list($name, $price, $amount) = $prod;
        echo "<tr>",
        "<td>$name</td>",
        "<td>$price</td>",
        "<td>$amount</td>",
        "</tr>";
    }

    echo "</table>";
}

function addProd(string $name, float $precio, int $cantidad) : void {
    array_push($GLOBALS['tabla'], [$name, $precio, $cantidad]);
}
