<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare</title>
    <style>
        * {
            padding: 5px;
        }

        form {
            border: 1px solid black;
        }
    </style>

    <?php require 'comparePHP.php'; ?>
</head>

<body>
    <form action="" method="post">
        <label for="n1">N1</label>
        <input type="number" name="n1" id="n1" step="2">
        <br><br>
        <label for="n2">N2</label>
        <input type="number" name="n2" id="n2" step="2">
        <br><br>
        <label for="n3">N3</label>
        <input type="number" name="n3" id="n3" step="2">
        <br><br>
        <input type="submit" value="Máximo">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $n1 = (int)$_POST["n1"];
        $n2 = (int)$_POST["n2"];
        $n3 = (int)$_POST["n3"];
        echo "<p>", max3($n1, $n2, $n3), "</p>";
    }
    ?>
</body>

</html>