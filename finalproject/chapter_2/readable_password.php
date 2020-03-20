<?php

function read_dictionary($filename=""){
    $dictionary_file = "dictionaries/{$filename}";
    return file($dictionary_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

function pick_random($array){
    $i = mt_rand(0, count($array)-1);
    return $array[$i];
}

function pick_random_symbol(){
    $symbols = '$*?!-';
    $i = mt_rand(0, strlen($symbols)-1);
    return $symbols[$i];
}

function pick_random_number($digits=1){
    $min = pow(10, ($digits-1)); //e.g. 1000
    $max = pow(10, $digits)-1; //e.g. 9999
    return strval(mt_rand($min, $max));
}

function filter_words_by_length($array, $length){
    $select_words = array();
    foreach($array as $word){
        if(strlen($word) == $length){
            $select_words[] = $word;
        }
    }
    return $select_words;
}

$basic_words = read_dictionary('friendly_words.txt');
$brand_words = read_dictionary('brand_words.txt');

$words = array_merge($brand_words, $basic_words);
//could use array_unique()

$length = 12;
$word_count = 2;
$digit_count = 2;
$symbol_count = 1;
$avg_word_length = ($length - $digit_count - $symbol_count) / $word_count;

$password = "";

$next_word_length = mt_rand($avg_word_length - 1, $avg_word_length + 1);
$select_words = filter_words_by_length($words, $next_word_length);
$password .= pick_random($select_words);

$password .= pick_random_symbol();
$password .= pick_random_number($digit_count);

$next_word_length = $length - strlen($password);
$select_words = filter_words_by_length($words, $next_word_length);
$password .= pick_random($select_words);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Password Generator</title>
        <link rel="stylesheet" type="text/css" href="../../finalproject/finalproject.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="../chapter_1/password_generator.php">Chapter 1: Password Generator</a></li>
                <li><a href="#">Chapter 2: Readable Password Generator</a></li>
                <li><a href="../chapter_3/password_strength.php">Chapter 3: Password Strength Meter</a></li>
            </ul>
        </nav>
        <p><?php
        echo "Friendly password: " . $password . "<br />"; 
        echo "Length: " . strlen($password) . "<br />";
        ?></p>
    </body>
</html>