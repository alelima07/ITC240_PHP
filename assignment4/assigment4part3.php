<?php

$randNumber = rand (5, 7);

for ($i = 0; $i <= 10; $i++) {
    if ($i == $randNumber) {
        echo "$i is your random number <br>";

    } else {
        echo "$i <br>";
    }

}

?>
