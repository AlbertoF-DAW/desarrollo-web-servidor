<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap.css">
    <?php require '../funciones/db_peliculas_func.php'; ?>
    <?php require '../objetos/pelicula.php'; ?>
</head>

<body>
    <?php
    $sql = "SELECT * FROM peliculas";
    $res = $connection->query($sql);
    $peliculas = [];

    while ($fila = $res->fetch_assoc()) {
        $nueva_pelicula = new Pelicula(
            $fila['id_pelicula'],
            $fila['titulo'],
            $fila['fecha_estreno'],
            $fila['edad_recomendada']
        );
        array_push($peliculas, $nueva_pelicula);
    }
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
                '<td>' . $p->id_pelicula . '</td>',
                '<td>' . $p->titulo . '</td>',
                '<td>' . $p->fecha_estreno . '</td>',
                '<td>' . $p->edad_recomendada . '</td>',
                '</tr>';
            }
            ?>
        </tbody>
    </table>
    <script src="../bootstrap.js"></script>
</body>

</html>