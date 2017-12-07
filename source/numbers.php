<?php
require 'fileModel.php';
class Numbers
{
    private $outputArray = [];
    public function findNumbers()
    {
        $fileModel = new FileModel();
        $strArr = $fileModel->splitText();
        $resArr = [];
        $allArray = [];
        for ($i=0; $i < count($strArr) ; $i++) {
            $allArray = explode(' ', $strArr[$i]);
            for($j=0; $j < count($allArray); $j++){
                $value = ctype_digit($allArray[$j]) ? intval($allArray[$j]) : $allArray[$j];
                if(empty($value)){
                    array_push($resArr, 0);
                }
                else if (is_int($value))
                {
                    array_push($resArr, $value);
                }
                else{
                    $fileModel->writeToLogHandler($value);
                    array_push($resArr, 'NaN');
                }
            }
            $this->calculate($resArr);
            $resArr = [];
        }
        $fileModel->writeToOutputHandler($this->outputArray);
        return $resArr;
    }

    public function calculate($numArray)
    {
        $result = 0;
        for ($i=0; $i < count($numArray); $i++) {
            if(is_int($numArray[$i])){
                $result += $numArray[$i];
            }
            else{
                $result = 'NaN';
            }
        }
        $this->storeOutput($result);
        return $result;
    }

    public function storeOutput($data)
    {
        array_push($this->outputArray, $data);
        return $this->outputArray;
    }
}

$num = new Numbers();
$num->findNumbers();