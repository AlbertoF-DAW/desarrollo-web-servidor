<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ4</title>
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

        div {
            margin: 10px;
            display: inline-block;
            max-width: max-content;
            background-color: greenyellow;
            border-radius: 8px;
        }

        p{
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    $arr_bi = $arr_uni1 = $arr_uni2 = [];
    for ($i = 0; $i < 10; $i++)
        array_push($arr_uni1, rand(1, 10)) + array_push($arr_uni2, rand(10, 100));
    foreach ($arr_uni1 as $k => $v)
        $arr_bi[0][$k] = $v;
    foreach ($arr_uni2 as $k => $v)
        $arr_bi[1][$k] = $v;
    ?>
    <table>
        <thead>
            <tr>
                <th>Array 1</th>
                <th>Array 2</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < max(count($arr_uni1), count($arr_uni2)); $i++) {
                echo "<tr>",
                "<td>" . $arr_bi[0][$i] . "</td>",
                "<td>" . $arr_bi[1][$i] . "</td>",
                "</tr>";
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <div>
        <p>Array 1:</p>
        <?php
        $a1max = -1;
        $a1min = 11;
        $a1sum = 0;
        foreach ($arr_uni1 as $v) {
            $a1max = max($a1max, $v);
            $a1min = min($a1min, $v);
            $a1sum += $v;
        }
        ?>
        <p>Máximo -> <?= $a1max ?></p>
        <p>Mínimo -> <?= $a1min ?></p>
        <p>Media -> <?= $a1sum / count($arr_uni1) ?></p>
    </div>
    <div>
        <p>Array 2:</p>
        <?php
        $a2max = -1;
        $a2min = 11;
        $a2sum = 0;
        foreach ($arr_uni2 as $v) {
            $a2max = max($a2max, $v);
            $a2min = min($a2min, $v);
            $a2sum += $v;
        }
        ?>
        <p>Máximo -> <?= $a2max ?></p>
        <p>Mínimo -> <?= $a2min ?></p>
        <p>Media -> <?= $a2sum / count($arr_uni2) ?></p>
    </div>
</body>

</html>