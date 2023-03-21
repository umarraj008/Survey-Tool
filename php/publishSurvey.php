<?php
// Resume session
session_start();

// Import database connection
include_once 'dbConnection.php';

// check if survey title and description exist
if (isset($_POST["survey_title"]) && isset($_POST["survey_description"])) {
    $surveyTitle = formatData($_POST["survey_title"]);
    $surveyDescription = formatData($_POST["survey_description"]);
}

// Check for empty data
if (empty($surveyTitle)) {
    redirectWithError("Survey Title is Required!");
}

if (empty($surveyDescription)) {
    redirectWithError("Survey Description is Required!");
}

// Add survey to database
$db->query(
    "INSERT INTO surveys (name, description, status) VALUES ('$surveyTitle', '$surveyDescription', '1')"
);

// Add to survey owner
$surveyID = $db->lastInsertId();
$userID = $_SESSION["user"]->user_ID;
if ($db->query(
    "INSERT INTO survey_owner (user_ID, survey_ID) VALUES ('$userID', '$surveyID')"
)) {
    header("Location: ../dashboard.php");
}

// function to format data correctly
function formatData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function redirectWithError($err) {
    header("Location: ../createSurvey.php?error={$err}");
    exit();
}