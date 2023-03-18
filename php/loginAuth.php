<?php
// Import database connection
include_once 'dbConnection.php';

// Check if data exists
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Set data
    $email = checkData($_POST['email']);
    $password = checkData($_POST['password']);
}

// Check for empty data, return if error occurs.
if (empty($email) && empty($password)) { 
    // No email or password
    header("Location: ../login.php?error=Aston Email And Password is Required!");
    exit();
} else if (empty($email)) { // No email
    header("Location: ../login.php?error=Aston Email is Required!");
    exit();
} else if (empty($password)) { // No password
    header("Location: ../login.php?error=Password is Required!");
    exit();
}

// Check if contains @.
if (!str_contains($email, "@")) { // Email contains @aston.ac.uk
    header("Location: ../login.php?error=Incorrect Email Format.");
    exit();
}

// Check if user is in the database
$sqlGetUser = "SELECT * FROM users WHERE email='$email'";
$result = $db->query($sqlGetUser);

// If there is a row that means the user exists
if ($result->rowCount() == 1) {

    // Fetch user data
    $result = $result->fetchObject();

    // Check the password is correct, if not they are return back to login page.
    if (!password_verify($password, $result->password)) {
        header("Location: ../login.php?error=Incorrect Email or Password!");
        exit();
    }

    // Set session to this user account. and then returned to home page.
    session_start();
    $_SESSION['user'] = $result;
    header("Location: ../dashboard.php?notif=Welcome Back {$_SESSION['user']->firstName}");
    exit();
} else {
    // If no rows are return then incorrect email or user doesnt exists.
    header("Location: ../login.php?error=Incorrect Email or Password!");
    exit();
}

// Funciton to check data.
function checkData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}