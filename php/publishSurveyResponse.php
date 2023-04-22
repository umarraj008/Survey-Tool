<?php
// Resume session
session_start();

// Import database connection
include_once 'dbConnection.php';

// Check if user is logged in
if (!isset($_SESSION["user"])) {
    header("Location: ../signup.php");
}

// Check if survey id is set
if (!isset($_GET["id"]) && !isset($_GET["noq"])) {
    header("Location: ../survey.php?error=Survey ID and number of questions not set");
    exit();
}

// Get survey id
$surveyID = $_GET["id"];


// Get number of questions
$numberOfQuestions = $_GET["noq"];


// Get all question responses
$questions = array();
foreach($_POST as $key=>$value) {
    if (str_contains($key, "question")) {
        $q = new StdClass();
        $qType = explode("#", $key);
        $q->type = $qType[0];
        $q->questionID = $qType[1];
        
        if ($q->type == "MultipleChoice") {
            $q->optionID = $value;
            $q->text = "";
        } else if ($q->type == "TextBox") {
            $q->optionID = "0";
            $q->text = htmlspecialchars($value);
        }

        array_push($questions, $q);
    }
}

// Check the request has all the questions
if (count($questions) != $numberOfQuestions) {
    header("Location: ../survey.php?id={$_GET['code']}&error=Please answer all questions!");
    exit();
}

// Create response record
$db->query("INSERT INTO responses (response_ID) VALUES (null)");
$responseID = $db->lastInsertId();

// Create survey response
$db->query(
    "INSERT INTO survey_response (survey_ID, response_ID) VALUES ('{$surveyID}','{$responseID}')"
);

// Add each answer to database
foreach ($questions as $q) {
    $db->query(
        "INSERT INTO answers (type, text, option_ID) VALUES ('{$q->type}','{$q->text}','{$q->optionID}')"
    );

    // Get last answer id
    $answerID = $db->lastInsertId();

    // Get question id for the answered question
    $questionID = $q->questionID;

    // Link each question to response table
    $db->query(
        "INSERT INTO answer_response (response_ID, answer_ID, question_ID) VALUES ('{$responseID}','{$answerID}','{$questionID}')"
    );
}

// Redirect user to thanks page
header("Location: ../thanks.php");
exit();