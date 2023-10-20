<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>array_sorting & matrix</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
    $personas = [
        "76880542W" => "Alberto",
        "99999999C" => "Nacho",
        "01234567X" => "Jaime ElBombas",
    ];
    ?>
    <!-- Mostrar array como table -> sort -->
    <table>
        <caption>Tabla ordenada con <b>sort</b></caption>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            sort($personas);
            foreach ($personas as $dni => $nombre)
                echo ("<tr><td>$dni</td><td>$nombre</td></tr>");
            ?>
        </tbody>
    </table>
    <br>
    <!-- Fin array como table -> sort -->
    <?php
    $personas = [
        "76880542W" => "Alberto",
        "99999999C" => "Nacho",
        "01234567X" => "Jaime ElBombas",
    ];
    ?>
    <!-- Mostrar array como table -> rsort -->
    <table>
        <caption>Tabla ordenada con <b>rsort</b></caption>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            rsort($personas);
            foreach ($personas as $dni => $nombre)
                echo ("<tr><td>$dni</td><td>$nombre</td></tr>");
            ?>
        </tbody>
    </table>
    <br>
    <!-- Fin array como table -> rsort -->
    <?php
    $personas = [
        "76880542W" => "Alberto",
        "99999999C" => "Nacho",
        "01234567X" => "Jaime ElBombas",
    ];
    ?>
    <!-- Mostrar array como table -> asort -->
    <table>
        <caption>Tabla ordenada con <b>asort</b></caption>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            asort($personas);
            foreach ($personas as $dni => $nombre)
                echo ("<tr><td>$dni</td><td>$nombre</td></tr>");
            ?>
        </tbody>
    </table>
    <br>
    <!-- Fin array como table -> asort -->
    <?php
    $personas = [
        "76880542W" => "Alberto",
        "99999999C" => "Nacho",
        "01234567X" => "Jaime ElBombas",
    ];
    ?>
    <!-- Mostrar array como table -> arsort -->
    <table>
        <caption>Tabla ordenada con <b>arsort</b></caption>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            arsort($personas);
            foreach ($personas as $dni => $nombre)
                echo ("<tr><td>$dni</td><td>$nombre</td></tr>");
            ?>
        </tbody>
    </table>
    <br>
    <!-- Fin array como table -> arsort -->
    <?php
    $personas = [
        "76880542W" => "Alberto",
        "99999999C" => "Nacho",
        "01234567X" => "Jaime ElBombas",
    ];
    ?>
    <!-- Mostrar array como table -> ksort -->
    <table>
        <caption>Tabla ordenada con <b>ksort</b></caption>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            ksort($personas);
            foreach ($personas as $dni => $nombre)
                echo ("<tr><td>$dni</td><td>$nombre</td></tr>");
            ?>
        </tbody>
    </table>
    <br>
    <!-- Fin array como table -> ksort -->
    <?php
    $personas = [
        "76880542W" => "Alberto",
        "99999999C" => "Nacho",
        "01234567X" => "Jaime ElBombas",
    ];
    ?>
    <!-- Mostrar array como table -> krsort -->
    <table>
        <caption>Tabla ordenada con <b>krsort</b></caption>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            krsort($personas);
            foreach ($personas as $dni => $nombre)
                echo ("<tr><td>$dni</td><td>$nombre</td></tr>");
            ?>
        </tbody>
    </table>
    <br>
    <!-- Fin array como table -> krsort -->


    <!-- Matrix -->
    <?php
    $juegos = [
        ["Pacman", "Atari", 60],
        ["Fortnite", "PS4", 0],
        ["Mario Kart", "Super Nintendo", 70],
        ["Street Fighter", "PS4", 50],
        ["Legend of Zelda", "Nintendo 64", 40],
        ["Castlevania", "Nintendo 64", 55],
    ];
    ?>
    <!-- Fin matrix -->

    <table>
        <caption> <b>Array multidimensional</b> </caption>
        <thead>
            <th>Nombre</th>
            <th>Consola</th>
            <th>Precio</th>
        </thead>
        <tbody>
            <?php
            foreach ($juegos as $juego) :
                list($nombre, $consola, $precio) = $juego;
            ?>
                <tr>
                    <?=
                    "<td>$nombre</td>",
                    "<td>$consola</td>",
                    "<td>$precio</td>";
                    ?>
                </tr>
            <?php
            endforeach;
            ?>
        <tbody>
    </table>
    <br>

    <!-- Matrix sort (multisort) -->
    <table>
        <caption> <b>Multisort</b> </caption>
        <thead>
            <th>Nombre</th>
            <th>Consola</th>
            <th>Precio</th>
        </thead>
        <tbody>
            <?php
            array_multisort(
                array_column($juegos, 1),
                SORT_ASC,
                array_column($juegos, 0),
                SORT_ASC,
                array_column($juegos, 2),
                SORT_ASC,
                $juegos
            );
            foreach ($juegos as $juego) :
                list($nombre, $consola, $precio) = $juego;
            ?>
                <tr>
                    <?=
                    "<td>$nombre</td>",
                    "<td>$consola</td>",
                    "<td>$precio</td>";
                    ?>
                </tr>
            <?php
            endforeach;
            ?>
        <tbody>
    </table>
    <br>
    <!-- Fin multisort -->

    <!-- Insertar columna en matrix -->
    <table>
        <caption> <b>Insertar columna</b> </caption>
        <thead>
            <th>Nombre</th>
            <th>Consola</th>
            <th>Precio</th>
            <th>Nota</th>
        </thead>
        <tbody>
            <?php
            $colcount = count($juegos);
            for ($i = 0; $i < $colcount; $i++)
                $juegos[$i][count($juegos[$i])] = rand(0, 10);
            foreach ($juegos as $juego) :
                list($nombre, $consola, $precio, $nota) = $juego;
            ?>
                <tr>
                    <?=
                    "<td>$nombre</td>",
                    "<td>$consola</td>",
                    "<td>$precio</td>",
                    "<td>$nota</td>";
                    ?>
                </tr>
            <?php
            endforeach;
            ?>
        <tbody>
    </table>
    <br>
    <!-- Fin insertar columna en matrix -->

    <!-- Insertar los pares del 1 al 50 en array,
        mostrarlos, barajarlos, mostrarlos en orden descendente
    -->
    <h1>Ejercicio 1</h1>
    <?php
    $pares = [];
    for ($i = 1; $i <= 50; $i++)
        $i % 2 ?: array_push($pares, $i);
    foreach ($pares as $n)
        echo "$n ";
    echo "<br>";
    shuffle($pares) && arsort($pares);
    foreach ($pares as $n)
        echo "$n ";
    ?>
    <br><br>
    <!-- Fin insertar columna en matrix -->

    <!-- Ejercicio 2 -->
    <h1>Ejercicio 2</h1>
    <?php
    $rand = [];
    for ($i = 0; $i < 10; $i++)
        array_push($rand, rand(0, 100));
    arsort($rand);
    foreach ($rand as $n)
        echo $n . ' ';
    echo "<br>";
    asort($rand);
    foreach ($rand as $n)
        echo $n . ' ';
    echo "<br>";
    ?>
    <br><br>

    <!-- Ejercicio 3 -->
    <h1>Ejercicio 3</h1>
    <?php
    $paises = array(
        "Italy" => "Rome",
        "Luxembourg" => "Luxembourg",
        "Belgium" => "Brussels",
        "Denmark" => "Copenhagen",
        "Finland" => "Helsinki",
        "France" => "Paris",
        "Slovakia" => "Bratislava",
        "Slovenia" => "Ljubljana",
        "Germany" => "Berlin",
        "Greece" => "Athens",
        "Ireland" => "Dublin",
        "Netherlands" => "Amsterdam",
        "Portugal" => "Lisbon",
        "Spain" => "Madrid",
        "Sweden" => "Stockholm",
        "United Kingdom" => "London",
        "Cyprus" => "Nicosia",
        "Lithuania" => "Vilnius",
        "Czech Republic" => "Prague",
        "Estonia" => "Tallin",
        "Hungary" => "Budapest",
        "Latvia" => "Riga",
        "Malta" => "Valetta",
        "Austria" => "Vienna",
        "Poland" => "Warsaw",
    );
    ksort($paises);
    ?>
    <table>
        <tr>
            <th>Pais</th>
            <th>Capital</th>
        </tr>
        <?php
        foreach ($paises as $p => $c)
            echo "<tr><td>$p</td><td>$c</td></tr>";
        ?>
    </table>
    <br><br>

    <!-- Ejercicio 4 -->
    <h1>Ejercicio 4</h1>
    <?php
    $series = [
        ["Breaking Bad", "HBO", 5],
        ["One Piece", "Netflix", 1],
        ["Only Murders in the Building", "Hulu", 3],
        ["American Horror Story", "Prime Video", 12],
        ["Black Mirror", "Netflix", 6],
        ["The Walking Dead", "Netflix", 11],
    ];
    ?>
    <table>
        <caption>Orden inserción</caption>
        <tr>
            <th>Serie</th>
            <th>Plataforma</th>
            <th>Temporadas</th>
        </tr>
        <?php
        foreach ($series as $s) :
            list($tit, $plat, $temp) = $s;
            echo "<tr>
            <td>$tit</td>
            <td>$plat</td>
            <td>$temp</td>
            </tr>";
        endforeach;
        ?>
    </table>
    <br><br>
    <table>
        <caption>Orden temporadas</caption>
        <tr>
            <th>Serie</th>
            <th>Plataforma</th>
            <th>Temporadas</th>
        </tr>
        <?php
        array_multisort(array_column($series, 2), SORT_ASC, $series);
        foreach ($series as $s) :
            list($tit, $plat, $temp) = $s;
            echo "<tr>
            <td>$tit</td>
            <td>$plat</td>
            <td>$temp</td>
            </tr>";
        endforeach;
        ?>
    </table>
    <br><br>
    <table>
        <caption>Orden plataforma + titulo</caption>
        <tr>
            <th>Serie</th>
            <th>Plataforma</th>
            <th>Temporadas</th>
        </tr>
        <?php
        array_multisort(
            array_column($series, 1),
            SORT_ASC,
            array_column($series, 0),
            SORT_ASC,
            $series
        );
        foreach ($series as $s) :
            list($tit, $plat, $temp) = $s;
            echo "<tr>
            <td>$tit</td>
            <td>$plat</td>
            <td>$temp</td>
            </tr>";
        endforeach;
        ?>
    </table>
    <br><br>
    <!-- Ejercicio 5 -->
    <h1>Ejercicio 5</h1>
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
    <table>
        <caption>Estudiantes</caption>
        <tr>
            <th>Nombre</th>
            <th>Nota</th>
            <th>Calificacion</th>
        </tr>
        <?php
        // Asignar nota aleatoria
        for ($i = count($estudiantes) - 1; $i >= 0; $i--)
            $estudiantes[$i][1] = rand(0, 10);
        
        // Ordenar alfabetico
        array_multisort(
            array_column($estudiantes, 0),
            SORT_ASC,
            $estudiantes
        );
        foreach ($estudiantes as $e) :
            list($nombre, $nota) = $e;
            $c = match($nota) {
                0, 1, 2, 3, 4 => 'Suspenso',
                5, 6 => 'Aprobado',
                7, 8 => 'Notable',
                9, 10 => 'Sobresaliente',
            };
            echo "<tr>
            <td>$nombre</td>
            <td>$nota</td>
            <td>$c</td>
            </tr>";
        endforeach;
        ?>
    </table>
    <br><br>
</body>

</html>