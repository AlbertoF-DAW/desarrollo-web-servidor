<?php
    function preciosiniva(float $precio, string $iva): float {
        return match (true) {
            $iva == 'SIN IVA' => $precio,
            $iva == 'SUPERREDUCIDO' => $precio * (1 / 1.04),
            $iva == 'REDUCIDO' => $precio * (1 / 1.1),
            $iva == 'GENERAL' => $precio * (1 / 1.21),
            default => $precio
        };
    }

    function precioconiva(float $precio, string $iva): float {
        return match (true) {
            $iva == 'SIN IVA' => $precio,
            $iva == 'SUPERREDUCIDO' => $precio * 1.04,
            $iva == 'REDUCIDO' => $precio * 1.1,
            $iva == 'GENERAL' => $precio * 1.21,
            default => $precio
        };
    }
    ?>