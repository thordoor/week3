<?php
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../source/numbers.php";

class TestClass extends TestCase
{
    public function testFindNumbers()
    {
        $numbers = new Numbers();
        $result = $numbers->findNumbers(['']);
        $this->assertEquals([], $result);
    }

    public function testCalculate()
    {
        $numbers = new Numbers();
        $result = $numbers->calculate([0, 5, 6, 4, 8]);
        $this->assertEquals(23, $result);
        $result = $numbers->calculate('Horse');
        $this->assertEquals('NaN', $result);
        $result = $numbers->calculate([0]);
        $this->assertEquals(0, $result);
    }

    public function testStoreOutput()
    {
        $numbers = new Numbers();
        $result = $numbers->storeOutput(23);
        $result = $numbers->storeOutput('NaN');
        $result = $numbers->storeOutput(0);
        $this->assertEquals([23, 'NaN', 0], $result);
    }

    //stub
    
}