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
$db->query(
    "INSERT INTO survey_owner (user_ID, survey_ID) VALUES ('$userID', '$surveyID')"
);

//get all questions
$questions = $_POST["question"];
$index = 1;
foreach ($questions as $q) {
    
    // Add question to database
    $db->query(
        "INSERT INTO questions (type, text) VALUES ('TextBox', '$q')"
    );
    $lastInsertedQuestion = $db->lastInsertId();
    
    // Add to question order
    $db->query(
        "INSERT INTO question_order (survey_ID, question_ID, question_index) VALUES ($surveyID, $lastInsertedQuestion, $index)"
    );

    $index++;
}

// Redirect user after uploading all to database
header("Location: ../dashboard.php");


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