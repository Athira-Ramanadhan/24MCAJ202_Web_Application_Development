<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css"> <!-- Linking to external CSS file -->
</head>
<body>

    <div class="container">
        <h2>Registration Form</h2>

        <!-- PHP Section to Handle Form Submission -->
        <?php
        // Initialize variables
        $name = $email = $password = $confirm_password = "";
        $nameErr = $emailErr = $passwordErr = $confirm_passwordErr = "";
        $successMsg = ""; 

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate Name
            if (empty($_POST["name"])) {
                $nameErr = "Name is required"; 
            } else {
                $name = htmlspecialchars($_POST["name"]); 
            }

            // Validate Email
            if (empty($_POST["email"])) {
                $emailErr = "Email is required"; 
            } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
            } else {
                $email = htmlspecialchars($_POST["email"]); 
            }

            // Validate Password
            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
            } elseif (strlen($_POST["password"]) < 6) {
                $passwordErr = "Password must be at least 6 characters"; 
            } else {
                $password = $_POST["password"]; 
            }

            // Validate Confirm Password
            if (empty($_POST["confirm_password"])) {
                $confirm_passwordErr = "Confirm Password is required"; 
            } elseif ($_POST["confirm_password"] !== $_POST["password"]) {
                $confirm_passwordErr = "Passwords do not match"; 
            } else {
                $confirm_password = $_POST["confirm_password"]; 
            }

            // If no errors, show success message
            if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($confirm_passwordErr)) {
                $successMsg = "Registration successful!";
            }
        }
        ?>

        <!-- Display success message -->
        <?php if (!empty($successMsg)): ?>
            <div class="success"><?php echo $successMsg; ?></div>
        <?php endif; ?>

        <!-- Registration Form -->
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>">
            <span class="error"><?php echo $nameErr; ?></span>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>">
            <span class="error"><?php echo $emailErr; ?></span>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <span class="error"><?php echo $passwordErr; ?></span>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password">
            <span class="error"><?php echo $confirm_passwordErr; ?></span>

            <input type="submit" value="Register">
        </form>
    </div>

</body>
</html>
