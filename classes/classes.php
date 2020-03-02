<?php
class Calculator {
    public $num1 = 0;
    public $num2 = 0;
    public $result = 0;
    public $operator = "";

    function add(){
        $this->result = $this->num1 + $this->num2;
        return $this->result; 
    }

    function subtract(){
        $this->result = $this->num1 - $this->num2;
        return $this->result;   
    }

    function divide(){
        $this->result = $this->num1 / $this->num2;
        return $this->result;   
    }

    function multiply(){
        $this->result = $this->num1 * $this->num2;
        return $this->result; 
    }
}
?>

<html>
    <head>
        <title>Classes PHP</title>
        <link rel="stylesheet" type="text/css" href="classes.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <h1>Seattle Central College</h1>
        <h1>ITC 240 - PHP</h1>
        <h1>Classes</h1>
        <p>Assignment: Write a class to represent a basic artithmetic operations calculator.</p>
        <p>Your class should have the ability to add, subtract, multiply or divide two numbers.</p>
        <h2>Calculator</h2>
        <p>Feel free to use this calculator for basic math.</p>
        <form method="POST">
            <input type="number" name="num1">
            <select name="operations">
                <option value="">Select operator</option>
                <option value="add">SUM</option>
                <option value="sub">MINUS</option>
                <option value="mult">MULTIPLICATION</option>
                <option value="div">DIVISION</option>
            </select>
            <input type="number" name="num2">
            <input type="submit" value="CHECK ANSWER">
        </form>
        <?php
        $calc = new Calculator;
        $calc->num1 = $_POST['num1'];
        $calc->num2 = $_POST['num2'];

        if(isset($_POST['operations'])){
            if($_POST['operations'] == 'add'){
                $calc->result = $calc->add();
                $calc->operator = "+";
            } elseif($_POST['operations'] == 'sub'){
                $calc->result = $calc->subtract();
                $calc->operator = "-";
            } elseif($_POST['operations'] == 'mult'){
                $calc->result = $calc->multiply();
                $calc->operator = "*";
            } elseif($_POST['operations'] == 'div') {
                $calc->result = $calc->divide();
                $calc->operator = "/";
            } else {
                $calc->result = "Choose an operator.";
            }
            echo "<p>" . $calc->num1 . " " . $calc->operator. " " . $calc->num2 . " = " . $calc->result . "</p>";
        } 
        ?>
    </body>
</html>