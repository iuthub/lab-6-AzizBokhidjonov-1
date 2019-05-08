<?php
    if(isset($_COOKIE['countPage'])){
        setcookie("countPage", $_COOKIE['countPage'] + 1, time()+60);
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reset'])){
        setcookie("user_animal", "", time()-1);
        setcookie("countPage", "", time()-1);
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['choose']) && !isset($_COOKIE['countPage'])){
        $animals = array("cat", "lion", "dog", "tiger", "rabbit");
        $randNumb = array_rand($animals);
       
        setcookie("user_animal", $animals[$randNumb], time()+60);
        setcookie("countPage", 0, time()+60);
    }
?>

<html>
    <head>
        <title>Lab #5: Regular expression</title>
        <meta charset="windows-1251">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="poweranimal.php" method="POST">
            <?if(isset($_COOKIE['user_animal']) && isset($_COOKIE['countPage'])){ ?>
                    <p>Your animal is <?=$_COOKIE['user_animal']?></p>
                    <p>Number of refreshing the page <? print $_COOKIE['countPage']?></p>
                    <!--<input type="submit" name="reset" value="Start Over">-->
            <? } else{ ?>

                <input type="submit" name="choose" value="Choose animal">

            <? } ?>
        </form>
    </body>
</html>
