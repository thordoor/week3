<?php
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../source/writeOutput.php";

class WriteOutputTest extends TestCase
{
    public function testFormatOutput()
    {
        $writer = new WriteOutput();
        $result = $writer->formatOutput(['hej','hat']);
        $this->assertEquals('hej\n hat\n', $result);
    }
    
    public function testPrintOutput()
    {
        $writer = new WriteOutput();
        $result = $writer->printOutput('hej hej');
        $this->assertEquals('hej hej', $result);
    }
}