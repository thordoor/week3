<?php
class WriteOutput
{

    public function formatOutput($data)
    {
        $formatted = "";
        for($i = 0; $i < count($data); $i++){
            $formatted .= $data[$i] . "\n";
        }
        return $formatted;
    }

    public function printOutput($data)
    {
        $formatData = $this->formatOutput($data);
        echo nl2br($formatData);
        return $data;
    }
}