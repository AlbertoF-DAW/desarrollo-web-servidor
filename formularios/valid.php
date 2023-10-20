<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valid</title>
    <style>
        * {
            padding: 5px;
        }
    </style>
    <?php require '../funciones/valid_php.php'; ?>
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['action'] == 'iva') {
            // Validacion precio
            $tmp_precio = depurar($_POST['precio']);
            if (!strlen($tmp_precio) > 0) {
                $err_precio = "El precio es obligatorio";
            } else {
                if (filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) === FALSE) {
                    $err_precio = "El precio debe ser numérico";
                } else {
                    $tmp_precio = (float) $tmp_precio;
                    if ($tmp_precio < 0) {
                        $err_precio = "El precio debe ser mayor o igual a cero";
                    } else {
                        $precio = $tmp_precio;
                    }
                }
            }
            // Validacion iva
            if (isset($_POST['iva']))
                $tmp_ivatype = depurar($_POST['iva']);
            else
                $tmp_ivatype = "";
            if (!strlen($tmp_ivatype) > 0) {
                $err_iva = "El IVA es obligatorio";
            } else {
                $valores_iva = ["SIN IVA", "SUPERREDUCIDO", "REDUCIDO", "GENERAL"];
                if (!in_array($tmp_ivatype, $valores_iva)) {
                    $err_iva = "El IVA no es correcto";
                } else {
                    $iva = $tmp_ivatype;
                }
            }
        }
    }
    ?>

    <form action="" method="post">
        <label for="precio">Precio:</label>
        <input id="precio" type="number" name="precio">
        <?= isset($err_precio) ? '<p>' . $err_precio . '</p>' : '' ?>
        <br>
        <label for="iva">IVA:</label>
        <select id="iva" name="iva">
            <option selected disabled>
                -- Seleccione una opción --
            </option>
            <option value="SIN IVA">
                Sin IVA
            </option>
            <option value="SUPERREDUCIDO">
                Superreducido
            </option>
            <option value="REDUCIDO">
                Reducido
            </option>
            <option value="GENERAL">
                General
            </option>
        </select>
        <?= isset($err_iva) ? '<p>' . $err_iva . '</p>' : '' ?>
        <br><br>
        <input type="hidden" name="action" value="iva">
        <input type="submit" value="Calcular">
        <?= isset($iva) && isset($precio)
            ? "<h3>" . precioconiva($precio, $iva) . "</h3>"
            : '' ?>
    </form>

    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['action'] == 'irpf') {
            $salario = (float) $_POST['salario'];
            echo ($salario);
        }
    }
    ?>

    <form action="" method="post">
        <label for="salario">Salario:</label>
        <input id="salario" type="number" name="salario" step="1000">
        <br>
        <input type="hidden" name="action" value="irpf">
        <input type="submit" value="Calcular">
    </form>

</body>

</html>