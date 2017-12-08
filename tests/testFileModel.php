<?php
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../source/fileModel.php";


class FileModelTest extends TestCase
{
    private $fileModel;

    public function testParseText()
    {
        $fileModel = new FileModel();
        $result = $fileModel->parseText();
        $this->assertEquals('hej', $result);
    }

    public function testGetText()
    {
        $fileModel = new FileModel();
        $result = $fileModel->getText();
        $this->assertEquals('hej', $result);
    }

    public function testGetFileHandleMock()
    {
        $stub = $this->createMock(ReadFile::class);
        $stub->method('getFileHandle')->willReturn(['0 5 6 4 8', 'Horse']);
        $this->assertEquals(['0 5 6 4 8', 'Horse'], $stub->getFileHandle());
    }

    public function testSplitText()
    {
        $fileModel = new FileModel();
        $result = $fileModel->splitText();
        $this->assertEquals([], $result);
    }

    public function testWriteToOutputhandler()
    {
        $fileModel = new FileModel();
        $result = $fileModel->writeToOutputHandler([23]);
        $this->assertEquals([], $result);
    }

    public function testWriteToLogHandler()
    {
        $fileModel = new FileModel();
        $result = $fileModel->writeToLogHandler('Horse');
        $this->assertEquals('Horse', $result);
    }
}
?>