<?php
function max3(int $num1, int $num2, int $num3): string {
    if ($num1 == $num2 && $num2 == $num3)
        return "Son iguales";
    return "El máximo es : " . max($num1, $num2, $num3);
}
