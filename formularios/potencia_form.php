<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencia form</title>
</head>
<body>
<form action="" method="post">
        <label for="base">Base:</label>
        <input id="base" type="text" name="base">
        <br>
        <label for="exp">Exponente:</label>
        <input id="exp" type="text" name="exp">
        <br>
        <input type="submit">
    </form>
    <br><br>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $base = (int) $_POST['base'];
        $exp = (int) $_POST['exp'];
        echo "<br><h1>", $base ** $exp,"</h1><br>";
    }
    ?>
</body>
</html>