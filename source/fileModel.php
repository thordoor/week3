<?php
require 'writeOutput.php';
require 'writeToLog.php';
require 'readFile.php';

class FileModel
{

    public function parseText()
    {
        $readFile = new ReadFile();
        $handle = $readFile->getFileHandle();
        $parsedText = '';
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                $parsedText .= $buffer;
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }
            fclose($handle);
        }
        return $parsedText;
    }

    public function getText()
    {
        $text = $this->parseText();
        return $text;
    }

    public function splitText()
    {
        $streamToExplode = $this->getText();
        $arrayFromExplode = explode(PHP_EOL, $streamToExplode);
        return $arrayFromExplode;
    }

    public function writeToOutputHandler($data)
    {
        $writeOutput = new WriteOutput();
        $writeOutput->printOutput($data);
        return $data;
    }

    public function writeToLogHandler($data)
    {
        $log = new LogWriter();
        $log->writeToLog($data);
        return $data;
    }
}
?>