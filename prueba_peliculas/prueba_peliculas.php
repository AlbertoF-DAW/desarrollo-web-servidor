<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Peliculas</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap.css">
    <?php require '../objetos/pelicula.php'; ?>
</head>

<body>
    <?php
    $pelicula1 = new Pelicula(1, "Spiderman", "2020-01-01", "7");
    $pelicula2 = new Pelicula(2, "Kung Fu Panda", "2008-02-02", "13");
    $pelicula3 = new Pelicula(3, "Batman", "2010-10-10", "16");
    $peliculas = [$pelicula1, $pelicula2, $pelicula3];
    ?>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Fecha estreno</th>
                <th>Edad recomendada</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($peliculas as $p) {
                echo '<tr>',
                '<td>' . $p -> id_pelicula . '</td>',
                '<td>' . $p -> titulo . '</td>',
                '<td>' . $p -> fecha_estreno . '</td>',
                '<td>' . $p -> edad_recomendada . '</td>',
                '</tr>';
            }
            ?>
        </tbody>
    </table>
    <script src="../bootstrap.js"></script>
</body>

</html>