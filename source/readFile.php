<?php
class ReadFile
{
    public function getFileHandle()
    {
        $handle = fopen(__DIR__ . "/../numberfile.txt", "r");
        return $handle;
    }
}
?>