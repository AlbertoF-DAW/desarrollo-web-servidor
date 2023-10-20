<?php
// Ejercicio 1
function cambiarDivisa (float $dinero, string $divisaFrom, string $divisaTo) : float {
    if ($divisaFrom == $divisaTo)
        return $dinero;
    return match ($divisaFrom) {
        'EUR' => ($divisaTo == 'USD') ? $dinero * 1.06 : $dinero * 157.56,
        'USD' => ($divisaTo == 'EUR') ? $dinero * 0.94 : $dinero * 148.73,
        'JPY' => ($divisaTo == 'EUR') ? $dinero * 0.0063 : $dinero * 0.0067
    };
}

// Ejercicio 2
function sumatorio (int $num) : int | string {
    return match (true) {
        $num < 0 => 'ERROR',
        default => $num * ($num + 1) / 2
    };
}

function factorial (int $num) : int | string {
    return match (true) {
        $num < 1 => 'ERROR',
        $num == 1 => 1,
        default => $num * factorial($num - 1)
    };
}

// Ejercicio 3
function comprobarEstado (int $ejemplares) : string {
    return match (true) {
        $ejemplares == 0 => 'Extinto',
        $ejemplares > 0 && $ejemplares <= 500 => 'En peligro crítico',
        $ejemplares > 500 && $ejemplares <= 2000 =>'En peligro',
        $ejemplares > 2000 => 'Amenazado',
        default => 'Error'
    };
}
