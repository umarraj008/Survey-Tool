<?php
// Import database connection
include_once 'dbConnection.php';

// Check if data exists and is not empty, else give error
$firstName = checkData('first_name', 'First Name Is Required!');
$lastName = checkData('last_name', 'Last Name Is Required!');
$day = checkData('day', 'Date Of Birth Is Required!');
$month = checkData('month', 'Date Of Birth Is Required!');
$year = checkData('year', 'Date Of Birth Is Required!');
$email = checkData('email', 'Email Is Required!');
$password = checkData('password', 'Password Is Required!');
$passwordConfirm = checkData('confirm_password', 'Confirm Password Is Required!');
$agreeTOS = checkData("agreeTOS", "Please Agree To The Terms!");

// Check the TOS is confirmed
if ($agreeTOS != "true") {
    header("Location: ../signup.php?error=Please Agree To The Terms!");
}

// Check the date of birth is not text
if ($day == "Default" || $month == "Default" || $year == "Default") {
    header("Location: ../signup.php?error=Date Of Birth Is Required!");
} else {
    switch($month) {
        case "January":
            $month = "1";
            break;

        case "February":
            $month = "2";
            break;
        case "March":
            $month = "3";
            break;
            
        case "April":
            $month = "4";
            break;

        case "May":
            $month = "5";
            break;
            
        case "June":
            $month = "6";
            break;
        case "July":
            $month = "7";
            break;
            
        case "August":
            $month = "8";
            break;
        case "September":
            $month = "9";
            break;
            
        case "October":
            $month = "10";
            break;
        case "November":
            $month = "11";
            break;
            
        case "December":
            $month = "12";
            break;
    }
    $dateOfBirth = $year . "-" . $month . "-" . $day;
}

// Check email contains @, else give error
if (!str_contains($email, "@")) {
    header("Location: ../signup.php?error=Incorrect Email Format.");
    exit();
}

// Check if password and password confirmation match, else give error
if ($password !== $passwordConfirm) {
    header("Location: ../signup.php?error=Password Confirmation Does Not Match!");
    exit();
}

// Check all boxes dont exceed character limit, else give error
if (strlen($firstName) > 50) {
    header("Location: ../signup.php?error=First Name is Too Long!");
    exit();
} else if (strlen($lastName) > 50) {
    header("Location: ../signup.php?error=Last Name is Too Long!");
    exit();
} else if (strlen($dateOfBirth) > 11) {
    header("Location: ../signup.php?error=Date of Birth is Too Long!");
    exit();
} else if (strlen($email) > 100) {
    header("Location: ../signup.php?error=Email is Too Long!");
    exit();
} else if (strlen($password) > 100) {
    header("Location: ../signup.php?error=Password is Too Long!");
    exit();
}

// Check email is not already used in database, else give error
$users = $db->query("SELECT * FROM users WHERE email='$email'");
if ($users->rowCount() > 0) {
    header("Location: ../signup.php?error=Account With Email Already Exists!");
    exit();
}

// Hash the password
$password = password_hash($password, PASSWORD_DEFAULT);

// Add user account to database
$db->query(
    "INSERT INTO users (first_name, last_name, date_of_birth, email, password, account_verified)
     VALUES ('$firstName', '$lastName', '$dateOfBirth', '$email', '$password', '0')"
);

// After making account check it exists then redirect to home and sign in
$user = $db->query("SELECT * FROM users WHERE email='$email'");
if ($user->rowCount() == 1) {
    // sign the user in.
    session_start();
    $_SESSION['user'] = $user->fetchObject();
    header("Location: ../dashboard.php?notif=Welcome {$_SESSION['user']->first_name}");
    exit();
} else {
    // If the account was not created then there was an error
    header("Location: ../signup.php?error=Error Making Account!");
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

    header("Location: ../signup.php?error=$errorMessage");
    exit();
}