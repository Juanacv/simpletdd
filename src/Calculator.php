<?php
namespace App\Maths;

use InvalidArgumentException;

class Calculator {
    // Acepta enteros o flotantes y retorna un número flotante
    public function add(float $a, float $b): float {
        return $a + $b;
    }

    // Acepta enteros o flotantes y retorna un número flotante
    public function subtract(float $a, float $b): float {
        return $a - $b;
    }

    // Acepta enteros o flotantes y retorna un número flotante
    public function multiply(float $a, float $b): float {
        return $a * $b;
    }

    // Acepta enteros o flotantes y retorna un número flotante, lanza excepción si $b es 0
    public function divide(float $a, float $b): float {
        if ($b === 0.0) {
            throw new InvalidArgumentException("División por 0 no permitida");
        }
        return round($a / $b, 4);
    }

    // Acepta enteros y retorna un número entero, lanza excepción si $b no es entero
    public function mod(int $a, int $b): int {
        if ($b === 0) {
            throw new InvalidArgumentException("El divisor no puede ser 0 en el módulo");
        }
        return $a % $b;
    }
}
?>