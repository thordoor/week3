<?php
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../source/fileModel.php";


class FileModelTest extends TestCase
{
    private $fileModel;

    public function testParseText()
    {
        $testString = '0 5 6 4 8' . PHP_EOL . 'Horse' . PHP_EOL . '5' . PHP_EOL . PHP_EOL . '5 6 7 8';

        $fileModel = new FileModel();
        $result = $fileModel->parseText();
        $this->assertEquals($testString, $result);
    }

    public function testGetText()
    {
        $testString = '0 5 6 4 8' . PHP_EOL . 'Horse' . PHP_EOL . '5' . PHP_EOL . PHP_EOL . '5 6 7 8';        

        $fileModel = new FileModel();
        $result = $fileModel->getText();
        $this->assertEquals($testString, $result);
    }

    public function testGetFileHandleStub()
    {
        $stub = $this->createMock(ReadFile::class);
        $stub->method('getFileHandle')->willReturn(['0 5 6 4 8', 'Horse']);
        $this->assertEquals(['0 5 6 4 8', 'Horse'], $stub->getFileHandle());
    }

    public function testSplitText()
    {
        $testArray = ['0 5 6 4 8', 'Horse', '5', '', '5 6 7 8'];

        $fileModel = new FileModel();
        $result = $fileModel->splitText();
        $this->assertEquals($testArray, $result);
    }

    public function testWriteToOutputReturnsFormattedString()
    {
        $testArray = ['0 5 6 4 8', 'Horse', '5', '', '5 6 7 8'];
        $stub = $this->createMock(WriteOutput::class);
        $stub->method('printOutput')->willReturn('0 5 6 4 8', 'Horse', '5', '', '5 6 7 8');
        $this->assertEquals('0 5 6 4 8', $stub->printOutput($testArray));
    }

    public function testWriteToOutputhandler()
    {
        $fileModel = new FileModel();
        $result = $fileModel->writeToOutputHandler([23]);
        $this->assertEquals([23], $result);
    }

    public function testWriteToLogHandler()
    {
        $fileModel = new FileModel();
        $result = $fileModel->writeToLogHandler('Horse');
        $this->assertEquals('Horse', $result);
    }
}
?>