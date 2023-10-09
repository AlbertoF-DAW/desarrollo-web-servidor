<!DOCTYPE html>
<html>

<head>
    <title>Hola mundo</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
    class Jarra
    {
        public $cap = null;
        public $can = null;
        function __construct($capacidad)
        {
            $this->cap = $capacidad;
            $this->can = 0;
        }

        function __toString()
        {
            return "Capacidad: $this->cap\nCantidad: $this->can\n";
        }
    }
    ?>

    <?php
    $j = new Jarra(10);
    echo $j . "<br>";
    var_dump($j);
    ?>

    <?php
    $n1 = 1;
    echo "<table style='border-collapse:collapse; width:100%;'>";
    while ($n1 <= 10) {
        echo "<tr>";
        $n2 = 0;
        while ($n2 <= 10) {
            echo "<td style='border:1px solid;'>$n1 x $n2 = ", $n1 * $n2, "</td>";
            $n2++;
        }
        echo "</tr>";
        $n1++;
    }
    echo "</table>";

    $arr = [];
    $arr[2] = 555;
    $arr[0] = 222;
    $arr[1] = 999;
    echo "<br>";
    var_dump($arr);
    echo "<br>";

    $bool = boolval(null);
    var_dump($bool);
    echo "<br>";

    $num = intval(null);
    var_dump($num);
    echo "<br>";

    $r = rand(1, 150);
    echo ($r < 10 ? "1 digito" : ($r < 100 ? "2 digitos" : "3 digitos"));
    echo "<br>";
    ?>

    <?php
    $dias_es = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
    echo $dias_es[getdate()['wday']];

    echo "<br>";
    ?>

    <?php
    // Ej 1
    echo rand(1, 10) % 2 ? "Es impar" : "Es par";

    echo "<br>";

    // Ej 2
    switch (rand(-10, 10) <=> 0) {
        case 1:
            echo "positivo";
            break;
        case 0:
            echo "cero";
            break;
        case -1:
            echo "negativo";
            break;
    }

    echo "<br>";

    // Ej 3
    echo "<ul style='display:inline; list-style-type: none;'>";
    for ($i = 1; $i < 20; $i += 2)
        echo "<li>$i</li>";
    echo "</ul>";

    echo "<br>";

    // Ej 4
    echo getdate()['mday'] . " de ";
    $meses_es = ["Enero", "Febrero", "Marzo", "", "", "", "", "", "Septiembre", "Octubre", "", ""];
    echo $meses_es[getdate()['mon'] - 1];

    echo "<br>";

    // Ej 5
    echo date("e") . "<br>";
    echo date("T") . "<br>";

    // Match
    $m = match (date("l")) {
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miércoles",
        default => "cositas",
    };

    echo $m;
    ?>

    <?php
    echo "<br>Suma pares: ";
    $sum = 0;
    for ($i = 0; $i <= 20; $i++)
        $sum += $i % 2 ? 0 : $i;
    echo "$sum<br>";
    ?>

    <?php
    echo "<br>Primos 1 - 50:<br>";
    for ($i = 2; $i < 50; $i++) {
        $primo = true;
        for ($j = 2; $primo && $j < $i; $j++) {
            if (!($i % $j))
                $primo = !$primo;
        }
        echo $primo ? "$i " : "";
    }
    ?>

    <?php
    echo "<br>";
    $p = 2;
    for ($i = 0; $i < 50;) {
        $primo = true;
        for ($j = 2; $primo && $j < $p; $j++)
            if (!($p % $j))
                $primo = !$primo;
        if ($primo) {
            echo "$p ";
            $i++;
        }
        $p++;
    }
    echo "<br>";

    ?>

    <?php
    echo "<br>";

    $arr = [1, 2, 3, 4];
    printf("%d<br>", array_sum($arr));

    count($arr);
    print_r($arr);
    echo "<br>";


    $arr2 = array("k1" => 1, "k2" => 2);
    print_r($arr2);

    echo "<br>";

    ?>

    <?php
    $dnis = [
        "76880542F" => "Alberto",
        "99999999C" => "Nacho",
    ];

    foreach ($dnis as $d => $v)
        printf("<p>%s : %s</p>", $d, $v);

    print_r(array_values($dnis)); // re-map keys to ints
    ?>
</body>

</html>