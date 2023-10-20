<?php
function depurar($in) {
    return preg_replace("/\s+/", ' ', trim(htmlspecialchars($in)));
}
?>