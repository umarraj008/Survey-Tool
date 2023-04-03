<?php
// Resume session
session_start();

// Import database connection
include_once 'dbConnection.php';

// Check if user is logged in
if (!isset($_SESSION["user"])) {
    header("Location: ../signup.php");
    exit();
}

// Check if userID is set
if (!isset($_GET["userID"])) {
    header("Location: ../dashboard.php");
    exit();
} else {
    $userID = $_GET["userID"];
}

// Check if surveyID is set
if (!isset($_GET["surveyID"])) {
    header("Location: ../dashboard.php");
    exit();
} else {
    $surveyID = $_GET["surveyID"];
}

// Check if user owns survey
$result = $db->query(
    "SELECT * FROM survey_owner WHERE user_ID='{$userID}' AND survey_ID='{$surveyID}'"
);

// If user does not own survey then redirect back
if ($result->rowCount() != 1) {
    header("Location: ../dashboard.php?e3");
    exit();
}

// Delete survey
$db->query(
    "DELETE FROM surveys WHERE survey_ID=$surveyID"
);

header("Location: ../dashboard.php?notif=Survey Deleted!");
exit();