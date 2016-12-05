<?php
    $word="";
    function getword()
    {
        $file="BandsList.txt";
        $fopen = fopen($file, "r");
        $fread = fread($fopen,filesize($file));
        $split = explode("\n", $fread);
        $array[] = null;
        if(!empty($split))
        {   
            foreach ($split as $string)
            {
                array_push($array,$string);
            }
            $wordIndex = array_rand($array,1);
            $word = $array[$wordIndex];
            return $word;
        }
        else
        {
            echo "Failed To read Word";
        }
    } 
    function setBlanks()
    {
        global $word;
       $word=getword(); 
       $noOfBlanks=strlen($word);
       for($i=1;$i<=$noOfBlanks;$i++)
       {
            echo "<input type = text size='1'  id=".$i." readonly></input>";
       }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Hangman Game</title>
    <h1> HANGMAN </h1>
</head>
<body>
    <b>Guess The Band name</b>
    <?php
        setblanks();
        $alphabets=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
        echo "<br/>";
        foreach($alphabets as $alphabet) 
        {
            echo "<input type=button onclick=check('".$alphabet."','".$word."') value=".$alphabet." name=".$alphabet."></input>";
        }
    ?>
<footer>P.S. : - No actual Human beings were harmed. On the other hand think of the one you would like to hang and play :P</footer>
</body>
<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript">
var count=0;
function check(input,word)
{
    $.ajax({
        url:"check.php", //the page containing php script
        type: "GET", //request type
        data: {'input':input , 'word':word},
        success:function(result){
            if(count<6)
            {
                if(result=="not found")
                {
                    count++;
                    alert("Wrong guess you have "+(7-count)+" lives left");
                }
                else
                {
                    res=result.split("");
                    for(i=0;i<result.length;i++)
                    {
                        document.getElementById(res[i]).value=input;
                    }
                }
            }
            else
            {
                alert("You Lose");
            }
       }
     });
}
function reset()
{

}
</script>
</html>
