<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ2</title>
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
    <?php
    $temps = [
        ["Málaga", 20, 27],
        ["Sevilla", 17, 36],
        ["Cádiz", 19, 31],
        ["Jaén", 19, 33],
        ["Granada", 12, 35],
        ["Almería", 20, 27],
        ["Huelva", 16, 33]
    ];
    ?>

    <?php
    /* Parte 1 */
    foreach ($temps as $i => $tmp)
        $temps[$i][3] = ($temps[$i][1] + $temps[$i][2]) / 2;
    ?>

    <?php
    /* Parte 2 */
    array_multisort(
        array_column($temps, 1),
        SORT_ASC,
        array_column($temps, 0),
        SORT_ASC,
        $temps
    );
    ?>

    <!-- Parte 3 -->
    <table>
        <thead>
            <tr>
                <th>
                    Ciudad
                </th>
                <th>
                    Mínima
                </th>
                <th>
                    Máxima
                </th>
                <th>
                    Media
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($temps as $tmp) {
                list($c, $min, $max, $avg) = $tmp;
                echo "<tr>",
                "<td>$c</td>",
                "<td>$min</td>",
                "<td>$max</td>",
                "<td>$avg</td>",
                "</tr>";
            }
            ?>
        </tbody>

        <!-- Parte 4 -->
        <tfoot>
            <?php
            $summin = $summax = 0;
            foreach ($temps as $tmp) {
                $summin += $tmp[1];
                $summax += $tmp[2];
            }
            echo "<tr>",
            "<th>MEDIA</th>",
            "<th>" . round($summin / count($temps), 1) . "</th>",
            "<th>" . round($summax / count($temps), 1) . "</th>",
            "<th></th>",
            "</tr>";
            ?>
        </tfoot>
    </table>
</body>

</html>