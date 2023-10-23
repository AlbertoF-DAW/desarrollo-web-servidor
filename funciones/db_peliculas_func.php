<?php
$_server = 'localhost';
$_user = 'root';
$_pass = 'medac';
$_db = 'db_peliculas';

$connection = new mysqli($_server, $_user, $_pass, $_db)
    or die('Error de conexion');
?>

<?php
function depurar($in) {
    return preg_replace("/\s+/", ' ', trim(htmlspecialchars($in)));
}
?>