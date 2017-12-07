<?php
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../source/writeToLog.php";

class TestClass extends TestCase
{
    public function testWriteToLog()
    {
        $log = new LogWriter();
        $result = $log->writeToLog('Horse');
        $this->assertEquals('Horse', $result);
    }
}
