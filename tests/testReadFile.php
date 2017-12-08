<?php
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../source/readFile.php";


class ReadFileTest extends TestCase
{
    public function testGetFileHandle()
    {
        $fileReader = new ReadFile();
        $result = $fileReader->getFileHandle();
        $this->assertInternalType('resource', $result);
    }

    //stub
    public function testStubGetFileHandle()
    {
        $stub = $this->createMock(ReadFile::class);
        $stub->method('getFileHandle')->willReturn(['0 5 6 4 8', 'Horse']);
        $this->assertEquals(['0 5 6 4 8', 'Horse'], $stub->getFileHandle());
    } 
    
}
?>