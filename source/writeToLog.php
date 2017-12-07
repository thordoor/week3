<?php
class LogWriter
{
    public function writeToLog($data)
    {
        $file = __DIR__ . '/../errorlog.txt';
        $current = file_get_contents($file);
        $current .= $data . "\n";
        file_put_contents($file, $current);
        return $data;
    }
}