<?php
// Import database connection
include_once 'dbConnection.php';

// Check if data exists and is not empty, else give error
$firstName = checkData('firstName', 'First Name Is Required!');
$lastName = checkData('lastName', 'Last Name Is Required!');
$dateOfBirth = checkData('dateOfBirth', 'Date Of Birth Is Required!');
$email = checkData('email', 'Email Is Required!');
$password = checkData('password', 'Password Is Required!');
$passwordConfirm = checkData('passwordConfirm', 'Confirm Password Is Required!');

// Check email contains aston email, else give error
if (!str_contains($email, "@aston.ac.uk")) {
    header("Location: ../signupPage.php?error=Email Must Be Aston Email!");
    exit();
}

// Check if password and password confirmation match, else give error
if ($password !== $passwordConfirm) {
    header("Location: ../signupPage.php?error=Password Confirmation Does Not Match!");
    exit();
}

// Check all boxes dont exceed character limit, else give error
if (strlen($firstName) > 25) {
    header("Location: ../signupPage.php?error=First Name is Too Long!");
    exit();
} else if (strlen($lastName) > 25) {
    header("Location: ../signupPage.php?error=Last Name is Too Long!");
    exit();
} else if (strlen($phoneNumber) > 11) {
    header("Location: ../signupPage.php?error=Phone Number is Too Long!");
    exit();
} else if (strlen($email) > 40) {
    header("Location: ../signupPage.php?error=Email is Too Long!");
    exit();
} else if (strlen($password) > 40) {
    header("Location: ../signupPage.php?error=Password is Too Long!");
    exit();
}

// Check email is not already used in database, else give error
$users = $db->query("SELECT * FROM users WHERE email='$email'");
if ($users->rowCount() > 0) {
    header("Location: ../signupPage.php?error=Account With Email Already Exists!");
    exit();
}

// Hash the password
$password = password_hash($password, PASSWORD_DEFAULT);

// Add user account to database
$db->query(
    "INSERT INTO users (firstName, lastName, email, password, phoneNumber)
     VALUES ('$firstName', '$lastName', '$email', '$password', '$phoneNumber')"
);

// After making account check it exists then redirect to home and sign in
$user = $db->query("SELECT * FROM users WHERE email='$email'");
if ($user->rowCount() == 1) {
    // sign the user in.
    session_start();
    $_SESSION['user'] = $user->fetchObject();
    header("Location: ../index.php?message=Welcome {$_SESSION['user']->firstName}");
    exit();
} else {
    // If the account was not created then there was an error
    header("Location: ../signupPage.php?error=Error Making Account!");
    exit();
}

// Funciton to check the data exists and is not empty, it will also redirect back with an error message.
function checkData($dataName, $errorMessage) {
    if (isset($_POST[$dataName])) {
        $temp = $_POST[$dataName];
        $temp = trim($temp);
        $temp = stripslashes($temp);
        $temp = htmlspecialchars($temp);

        if (!empty($temp)) {
            return $temp;
        }
    }

    header("Location: ../signupPage.php?error=$errorMessage");
    exit();
}