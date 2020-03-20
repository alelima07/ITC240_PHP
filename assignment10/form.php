<?php
$first_name = "";
$last_name = "";
$email = "";
$phone = "";

function user_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["first_name"])) {
        $first_nameErr = "First name is mandatory. Try again.";
    } else {
        $first_name = user_input($_POST["first_name"]);
        if (!preg_match("/^[a-zA-Z-]*$/",$first_name)){
            $first_nameErr = "Only letters, hyphens and white space allowed";
        }
    }

    if (empty($_POST["last_name"])) {
        $last_nameErr = "Last name is mandatory. Try again.";
    } else {
        $last_name = user_input($_POST["last_name"]);
        if(!preg_match("/^[a-zA-Z-]*$/",$last_name)){
            $last_nameErr = "Only letters, hyphens and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = user_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Please insert a phone number.";
    } else {
        $phone = user_input($_POST["phone"]);
        if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
            $phoneErr = "Invalid phone number format. Please enter area code and six digit phone number with hyphens.";
          }
    }
}
?>

<html>
    <head>
        <title>ITC 240 - PHP </title>
        <link rel="stylesheet" type="text/css" href="form.css">
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <h1>Seattle Central College</h1>
        <h1>ITC 240 - PHP</h1>
        <h2>Assignment 10: A form</h2>
        <p> For this assingment, a form was created with name, email and phone number input fields. And added validation to the form fields, such as required fields and correct formats for name (all characters), email and phone number with the correct format and permitted characters or number and special characters.</p>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name">
            <p class="error"><?php echo $first_nameErr;?></p>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name">
            <p class="error"><?php echo $last_nameErr;?></p>            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <p class="error"><?php echo $emailErr;?></p>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone">
            <p class="error"><?php echo $phoneErr;?></p>
            <input type="submit" value="Submit">
        </form>
    </body>
</html> 