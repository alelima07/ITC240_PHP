<?php
//PART 1 AND PART 2 BELOW

$meal_cost = 19.96;
//$meal_cost = -19.96;
// PRICE INPUT VALIDATION
if ($meal_cost < 0) {
    echo "Is this even a number?";
    exit();
}

//FORMULA TIME
$tip = $meal_cost * 0.15;
$tax = $meal_cost * 0.10;
$total = $meal_cost + $tip + $tax ;

//PRICE EVALUATION CRITIQUE TIME
$priceCritic = "Good price";
if ($total > 40) {
    $priceCritic = "This is pricey";
} else if ($total >= 20 && $total <= 40) {
    $priceCritic = "Reasonably priced";
}else {
    $priceCritic = "Good price";
}

// FORMAT TIME
$meal_cost_f = '$'.number_format($meal_cost, 2);
$tip_f       = '$'.number_format($tip, 2);
$tax_f       = '$'.number_format($tax, 2);
$total_f     = '$'.number_format($total, 2);

// OUTPUT TIME

echo "<h1><b>Total Meal Cost:</b></h1><br>";
echo "Meal Cost: $meal_cost_f <br>";
echo "Tip: $tip_f <br>";
echo "Tax: $tax_f <br>";
echo "Total: $total_f <br>";
echo "$priceCritic <br>";

?>
