<?php
$userWord = "";
$userWord = $_POST['userWord'];

function isPalindrome($str){
    $str = strtolower(htmlspecialchars($str));
    $backwardsWord = strrev($str);
    $palindrome = strcmp($str, $backwardsWord);
    if($palindrome == 0){
        return true;
    } else {
        return false;
    }
}


?>
<html>
    <head>
        <title>Assignment 7</title>
        <link rel="stylesheet" type="text/css" href="functions.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <h1>Seattle Central College</h1>
        <p>Assignment 7: PHP Functions</p>
        <h2></h2>
        <p>A palindrome is a word that reads the same backward as forward, e.g., radar or kayak. Input a word that will be checked to see if it's a palindrome.</p>
        <form method="post">
            <label for="userWord">Enter a word:</label>
            <input type="text" id="userWord" name="userWord">
            <input type="submit" value="Submit">
        </form>
        <p>
        <?php 
        if(isset($userWord)){
            if(isPalindrome($userWord) == true){
                echo "Good Job! This word is a palindrome!";
            } elseif (isPalindrome($userWord) == false) {
                echo "Not quite yet. Why don't you give it another try?";
            }
        } 
        ?>
    </body>
</html>