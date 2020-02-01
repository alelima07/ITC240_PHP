<?php
//get the data from the form
$product_description = filter_input(INPUT_POST, 'product_description');
$list_price = filter_input(INPUT_POST, 'list_price');
$discount_percent = filter_input(INPUT_POST, 'discount_percent');

// calculate the discount and discounted price
$discount = $list_price * $discount_percent *.01;
$discount_price = $list_price - $discount;

// apply currency formatting and percent format
$list_price_f = "$".number_format($list_price, 2);
$discount_percent_f = $discount_percent . "%";
$discount_f = "$".number_format($discount, 2);
$discount_price_f = "$".number_format($discount_price, 2);
$product_description_escaped = htmlspecialchars($product_description);

// set sales tax rate to 8.0 %
$sales_tax_rate = 8.0;
$sales_tax_rate_f = $sales_tax_rate."%"; //formatting

//calculate tax amount below
$sales_tax_amount = $discount_price * $sales_tax_rate * 0.01;
$sales_tax_amount_f = "$".number_format($sales_tax_amount, 2); //formatting

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Product Discount calc</title>
        <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <h1>Product Discount Calculator</h1>

    <label>Product Description</label>
    <span><?php echo htmlspecialchars ($product_description); ?> </span>
    <br>

    <label>List Price</label>
    <span><?php echo htmlspecialchars ($list_price_f); ?> </span>
    <br>

    <label>Standard Discount</label>
    <span><?php echo htmlspecialchars ($discount_percent_f); ?> </span>
    <br>

    <label>Discount Amount</label>
    <span><?php echo $discount_f; ?> </span>
    <br>

    <label>Discount Price:</label>
    <span><?php echo $discount_price_f; ?></span><br>

    <!-- Print out Sales Tax Rate below -->
    <label>Sales Tax Rate:</label>
    <span><?php echo $sales_tax_rate_f; ?></span>
    <br>

    <!-- Print out Sales Tax Amount below -->
    <label>Sales Tax Amount:</label>
    <span><?php echo $sales_tax_amount_f; ?></span>
    <br>

</body>
</html>