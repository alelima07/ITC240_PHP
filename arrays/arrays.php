<?php
/*Part 1: Given the following of pets containing the items ('dog', 'cat', 'fish', 'bird', 'iguana'); display the following text, pulling the animal types from the pets array.
Result: "You can adopt a dog, a cat, or a bird from the animal sanctuary." */

$pets = array('dog', 'cat', 'fish', 'bird', 'iguana');
$dog = $pets[0];
$cat = $pets[1];
$bird = $pets[3];

/*Part 2: Display the state and state capital from the below array $statecaps. Sort the list by the name of the capital. $statecaps = array("Washington => Olympia", "Oregon => Salem", "California => Sacramento", "Alaska => Juneau", "Hawaii => Honolulu", "Idaho => Boise", "Nevada => Carson City", "Arizona => Phoenix"); */

$statecaps = array('Washington' => 'Olympia', 'Oregon' => 'Salem', 'California' => 'Sacramento', 'Alaska' => 'Juneau', 'Hawaii' => 'Honolulu', 'Idaho' => 'Boise', 'Nevada' => 'Carson City', 'Arizona' => 'Phoenix');
asort($statecaps);

/*Part 3: Insert a new item in an array with elements 1, 2, 3, 4, 5, 6
Result: The array should now contain 1, 2, 3, 4, 42, 5, 6*/

$numbers = array(1, 2, 3, 4, 5, 6);
array_splice($numbers, 4, 0, '42');

/*Part 4: Given an array of week’s temperatures containing the items 32, 47, 55, 30, 42, 39, 45, calculate and display the average temperature as well as display the lowest and highest temperature in the week.
Result Average temp this week : 41.4 Lowest temp: 30 Highest temp : 55 */

$weekTemps = array(32, 47, 55, 30, 42, 39, 45);
sort($weekTemps);
$avgWeekTemp = array_sum($weekTemps) / count($weekTemps);
$avgWeekTempF = number_format($avgWeekTemp, 1);
$highTemp = $weekTemps[count($weekTemps) - 1];
$lowTemp = $weekTemps[0];
?>

<html>
    <head>
    <title>ITC 240 - Arrays</title>
    <link rel="stylesheet" type="text/css" href="basic_style.css">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <h1>Seattle Central College</h1>
        <p>ITC 240 - Arrays</p>
        <p>Student: Alessandra Lima</p>
        <p>PHP Arrays are being used in this assignment.</p>
        

        <h2>Part 1</h2>
        <p>You can adopt a <?php echo $dog;?>, a <?php echo $cat;?>, or a <?php echo $bird?> from the animal sanctuary.</p>
        
        <h2>Part 2</h2>
        <?php 
        echo'<ul>';
        foreach ($statecaps as $state => $capital){
            echo '<li>' . $capital . ', ' . $state . '</li>';
        }
        echo '</ul>';
        ?>

        <h2>Part 3</h2>
        <p>The array should now contain 
        <?php
        echo $numbers[0];
        for ($i = 1; $i < count($numbers); $i++){
            echo ', ' . $numbers[$i];
        }
        ?></p>

        <h2>Part 4</h2>
        <p>Average temp this week: <?php echo $avgWeekTempF?>. Lowest temp: <?php echo $lowTemp?>. Highest temp: <?php echo $highTemp?>.</p>
    </body>
</html>