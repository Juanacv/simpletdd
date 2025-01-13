<?php
use PHPUnit\Framework\TestCase;
use App\Maths\Calculator;

class CalculatorTest extends TestCase {

    private $calculator;

    protected function setUp(): void {
        $this->calculator = new Calculator();
    } 

    public function testAddition() {
        $result = $this->calculator->add(2,3);
        $this->assertEquals(5, $result);
    }

    public function testSubstraction() {
        $result = $this->calculator->subtract(5,3);
        $this->assertEquals(2, $result);
    }

    public function testMultiplication() {
        $result = $this->calculator->multiply(2,3);
        $this->assertEquals(6, $result);
    }

    public function testDivisionByZeroThrowsException() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("División por 0 no permitida");
        $this->calculator->divide(10,0);
    }

    public function testValidDivision() {
        $result = $this->calculator->divide(2,3);
        // Comparar con una tolerancia (delta) de 0.0001
        $this->assertEquals(0.6667, $result);
    }

    public function testModByZeroThrowsExcetpion() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("El divisor no puede ser 0 en el módulo");
        $this->calculator->mod(19,0);
    }

    public function testValidModDivision() {
        $result = $this->calculator->mod(5,3);
        $this->assertEquals(2, $result);
    }
}


?>