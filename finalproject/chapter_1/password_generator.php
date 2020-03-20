<?php
/* $lower= 'abcdefghijklmnopqrstuvwxyz';
$upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$numbers = '0123456789';
$symbols = '$*?!-';
$chars= $lower . $upper .$numbers . $symbols;
variables moved to generate_password function */

//can also use PHP range()
$upper_array= range('A', 'Z');
$num_array = range(0, 9);
$lower_array = range('a', 'z');
$lower = implode('', $lower_array);
$upper = implode('', $upper_array);
$num = implode('', $num_array);

function random_char($string){
    $i = mt_rand(0, strlen($string)-1);
    return $string[$i];
}

function random_string($length, $char_set){
    for($i=0; $i < $length; $i++){
    $output .= random_char($char_set);
    }
return $output;
}

function generate_password($options){
    $lower= 'abcdefghijklmnopqrstuvwxyz';
    $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $symbols = '$*?!-';

    $use_lower = isset($options['lower']) ? $options['lower']: '0';
    $use_upper = isset($options['upper']) ? $options['upper']: '0';
    $use_numbers = isset($options['numbers']) ? $options['numbers']: '0';
    $use_symbols = isset($options['symbols']) ? $options['symbols']: '0';

    $chars= '';
    if($use_lower === '1'){ $chars .= $lower; }
    if($use_upper === '1'){ $chars .= $upper; }
    if($use_numbers === '1'){ $chars .= $numbers; }
    if($use_symbols === '1'){ $chars .= $symbols; }

    //default value of 8 is not functioning, though created verbatum the LinkedIn Learning video
    $length = isset($options['length']) ? $options['length']: 8;
    
    return random_string($length, $chars);
}

$options = array(
    'length' => $_GET['length'],
    'lower' => $_GET['lower'],
    'upper' => $_GET['upper'],
    'numbers' => $_GET['numbers'],
    'symbols' => $_GET['symbols']
);


$password = generate_password($options);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Final Project</title>
        <link rel="stylesheet" type="text/css" href="../../finalproject/finalproject.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="#">Chapter 1: Password Generator</a></li>
                <li><a href="../chapter_2/readable_password.php">Chapter 2: Readable Password Generator</a></li>
                <li><a href="../chapter_3/password_strength.php">Chapter 3: Password Strength Meter</a></li>
            </ul>
        </nav>
        <p><pre><?php print_r($lower_array) ?><p></pre>
        <p><?php echo $chars ?><p>
        <p><?php echo $lower . $upper . $num . $symbols?><p>
        <p><?php echo random_char($chars); ?><p>
        <p><?php echo random_string(10, $chars); ?><p>
        <p><?php echo generate_password(8); ?><p>

        <p>Generate a new password using the form options.</p>
        <form action="" method="get">
            Length: <input type="text" name="length" value="<?php if(isset($_GET['length'])) { echo $_GET['length']; } ?>" /><br />
            <input type="checkbox" name="lower" value="1" <?php if($_GET['lower'] == 1) { echo 'checked'; } ?> /> Lowercase<br />
            <input type="checkbox" name="upper" value="1" <?php if($_GET['upper'] == 1) { echo 'checked'; } ?> /> Uppercase<br />
            <input type="checkbox" name="numbers" value="1" <?php if($_GET['numbers'] == 1) { echo 'checked'; } ?> /> Numbers<br />
            <input type="checkbox" name="symbols" value="1" <?php if($_GET['symbols'] == 1) { echo 'checked'; } ?> /> Symbols<br />
            <input type="submit" value="Submit" />
        </form>

        <p>Generated Password: <?php echo $password; ?></p>
    
    </body>
  </html>