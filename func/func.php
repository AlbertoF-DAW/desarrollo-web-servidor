<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions</title>
</head>

<body>

    <!-- Tipado de argumentos, funciones como argumento -->
    <?php
    function a($f, $n1, $n2) {
        return $f($n1, $n2);
    }

    function sumar($n1, $n2) {
        var_dump($n1);
        var_dump($n2);
        echo "<br>";
        if (gettype($n1) == "integer")
            return ($n1 + $n2);
        else if (gettype($n1) == "double")
            return ($n1 + $n2);
        else if (gettype($n1) == "string")
            return ($n1 . $n2);
        echo "<br>";
    }

    echo "<h3>", a("sumar", 5, 2), "</h3>";
    echo "<h3>", a("sumar", 5.2, 2.7), "</h3>";
    echo "<h3>", a("sumar", "a", "b"), "</h3>";
    ?>


    <?php
    $estudiantes = [
        ["Miguel Rueda"],
        ["Nacho Diaz"],
        ["Inma Gonzalez"],
        ["Fernando Dominguez"],
        ["Adrian Zambrana"],
        ["Adrian Corrionero"],
        ["Alberto Florido"],
    ];
    ?>

    <?php
    // Asignar nota aleatoria
    for ($i = count($estudiantes) - 1; $i >= 0; $i--)
        $estudiantes[$i][1] = rand(0, 10);
    ?>

    <!-- Funciones -->
    <?php
    function obtenerCalificacion(int $p): string {
        return match (true) {
            $p < 5 => "Suspenso",
            $p < 7 => "Aprobado",
            $p < 9 => "Notable",
            true => "Sobresaliente"
        };
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Puntuación</th>
                <th>Calificación</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($estudiantes as $est) {
                list($n, $p) = $est;
                echo "<tr>",
                "<td>$n</td>",
                "<td>$p</td>",
                "<td>" . obtenerCalificacion($p) . "</td>",
                "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Función primos de 1 a n -->
    <?php
    // Funcion utilitaria para imprimir arrays
    function print_array(array $arr, string $sep = ", "): void {
        for ($i = 0; $i < count($arr); $i++)
            echo $arr[$i], $i == count($arr) - 1 ? "" : $sep;
    }
    function print_map(array $arr): void {
        foreach ($arr as $e)
            echo $e, " ";
    }
    ?>
    <?php
    // Funcion booleana para saber si un num es primo
    function primo(int $n): bool {
        for ($i = 2; $i < $n / 2; $i++)
            if ($n % $i == 0)
                return false;
        return $n > 1;
    }

    // Funcion que devuelve un array con los primos de 1 hasta n
    function primos(int $n): array {
        $primos = [];
        for ($i = 2; $i <= $n; $i++)
            if (primo($i))
                array_push($primos, $i);
        return $primos;
    }
    echo "<br>";
    print_array(primos(50));
    echo "<br>";
    ?>


    <br>
    <?php
    // Ahora vamos a hacer historia
    print_map(array_filter(range(1, 50), "primo"));
    ?>
    <br>


    <!-- Funciones conversión temperaturas -->
    <?php
    function C_K(int | float $c) {
        return $c + 273.15;
    }

    function C_F(int | float $c) {
        return $c * 9 / 5 + 32;
    }

    function F_C(int | float $f) {
        return ($f - 32) * 5 / 9;
    }

    function F_K(int | float $f) {
        return ($f - 32) * 5 / 9 + 273.15;
    }

    function K_C(int | float $k) {
        return $k - 273.15;
    }

    function K_F(int | float $k) {
        return ($k - 273.15) * 9 / 5 + 32;
    }
    ?>

    <!-- Función conversión temperaturas (usando funciones previas) -->
    <?php
    function convert_temp(int | float $t, string $src, string $dst) {
        return eval("return {$src}_{$dst}($t);");
    }
    ?>


    <!-- Función conversión temperaturas (independiente) -->
    <?php
    function conv(int | float $t, string $src, string $dst) {
        return match ($src) {
            "C" => match ($dst) {
                "K" => $t + 273.15,
                "F" => $t * 9 / 5 + 32,
                default => $t
            },
            "K" => match ($dst) {
                "C" => $t - 273.15,
                "F" => conv(conv($t, "K", "C"), "C", "F"),
                default => $t
            },
            "F" => match ($dst) {
                "C" => ($t - 32) * 5 / 9,
                "K" => conv(conv($t, "F", "C"), "C", "K"),
                default => $t
            }
        };
    }
    ?>

    <?php
    function potencia(int $b, int $e): int {
        if ($e < 0 || !$b && !$e)
            return ~0;
        $res = 1;
        while ($e-- > 0)
            $res *= $b;
        return $res;
    }
    ?>

    <!--
    <?php
    echo "<br>";
    echo potencia(2, 3);
    echo "<br>";
    echo potencia(-2, 3);
    echo "<br>";
    echo potencia(2, 0);
    echo "<br>";
    echo potencia(2, -5);
    echo "<br>";
    echo potencia(-5, -5);
    echo "<br>";
    echo potencia(0, 8);
    echo "<br>";
    ?>
-->

    <!-- Función devolver precio después de quitar IVA -->
    <?php
    function preciosiniva(float $precio, string $iva): float {
        return match (true) {
            $iva == 'SIN IVA' => $precio,
            $iva == 'SUPERREDUCIDO' => $precio * (1 / 1.04),
            $iva == 'REDUCIDO' => $precio * (1 / 1.1),
            $iva == 'GENERAL' => $precio * (1 / 1.21),
            default => $precio
        };
    }

    function precioconiva(float $precio, string $iva): float {
        return match (true) {
            $iva == 'SIN IVA' => $precio,
            $iva == 'SUPERREDUCIDO' => $precio * 1.04,
            $iva == 'REDUCIDO' => $precio * 1.1,
            $iva == 'GENERAL' => $precio * 1.21,
            default => $precio
        };
    }
    ?>

    <!-- Función devolver IRPF según salario -->
    <?php
    function salariosinirpf(float $bruto): float {
        return $bruto
            - min($bruto, 12450) * 0.19
            - max(min($bruto, 20200) - 12450, 0) * 0.24
            - max(min($bruto, 35200) - 20200, 0) * 0.30
            - max(min($bruto, 60000) - 35200, 0) * 0.37
            - max(min($bruto, 300000) - 60000, 0) * 0.45
            - max($bruto - 300000, 0) * 0.47;
    }

    /*
    // MAL
    function salariosinirpf2(float $bruto): float {
        if ($bruto > 300000)
            $bruto -= ($bruto - 300000) * 0.47;
        if ($bruto > 60000)
            $bruto -= max(min(($bruto - 60000), 0), 300000 - 60000) * 0.45;
        if ($bruto > 35200)
            $bruto -= max(min(($bruto - 35200), 0), 60000 - 35200) * 0.37;
        if ($bruto > 20200)
            $bruto -= max(min(($bruto - 20200), 0), 35200 - 20200) * 0.30;
        if ($bruto > 12450)
            $bruto -= max(min(($bruto - 12450), 0), 20200 - 12450) * 0.24;
        $bruto -= max($bruto, 12450) * 0.19;
        return $bruto;
    }
    */

    echo "<p>", salariosinirpf(400000), "</p>";
    //echo "<p>", salariosinirpf2(400000), "</p>";
    ?>

</body>

</html>