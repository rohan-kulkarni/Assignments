<?php
    $input=$_GET['input'];
    $word=$_GET['word'];
    $count=0;
    $pos=null;
    $wrongGuess=$_COOKIE["count"];
    $letterArray=str_split($word);
    for($i=0;$i<strlen($word);$i++)
    {
        if(strtolower($letterArray[$i])==$input)
        {
            $pos=$i+1;
            echo $pos;
        }
    }
    if($pos==null)
    {
        echo "not found";
    }
?>
