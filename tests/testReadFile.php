<?php
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../source/readFile.php";


class TestClass extends TestCase
{
    public function testGetFileHandle()
    {
        $fileReader = new ReadFile();
        $result = $fileReader->getFileHandle();
        $this->assertInternalType('resource', $result);
    }
    
}
?>