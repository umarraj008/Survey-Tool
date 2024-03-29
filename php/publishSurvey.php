<?php
// Resume session
session_start();

// Import database connection
include_once 'dbConnection.php';

// Check if user is logged in
if (!isset($_SESSION["user"])) {
    header("Location: ../signup.php");
}

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

// Get number of questions
$questions = $_POST["question"];
$numberOfQuestions = count($questions);

//generate survey code
$code = generateCode();

// Add survey to database
$db->query(
    "INSERT INTO surveys (name, code, description, number_of_questions, status) VALUES ('$surveyTitle', '$code','$surveyDescription','$numberOfQuestions', '1')"
);

// Add to survey owner
$surveyID = $db->lastInsertId();
$userID = $_SESSION["user"]->user_ID;
$db->query(
    "INSERT INTO survey_owner (user_ID, survey_ID) VALUES ('$userID', '$surveyID')"
);

// Add each question to database
$index = 1;
foreach ($questions as $q) {
    
    // Check if question options exists -> means that its not open text question
    if (isset($_POST["question" . $index . "option"])) {
        // Add question to database
        $db->query(
            "INSERT INTO questions (type, text) VALUES ('MultipleChoice', '$q')"
        );
        $lastInsertedQuestion = $db->lastInsertId();
        
        // Add to question order
        $db->query(
            "INSERT INTO question_order (survey_ID, question_ID, question_index) VALUES ($surveyID, $lastInsertedQuestion, $index)"
        );

        // Get all options
        $options = $_POST["question" . $index . "option"];
        $optionIndex = 1;
        foreach($options as $o) {
            $db->query(
                "INSERT INTO options (type, text) VALUES ('MultipleChoice', '$o')"
            );

            $lastInsertedOption = $db->lastInsertId();
        
            // Add to option order
            $db->query(
                "INSERT INTO option_order (option_ID, question_ID, option_index) VALUES ($lastInsertedOption, $lastInsertedQuestion, $optionIndex)"
            );

            $optionIndex++;
        }
    } else {   
        // Add question to database
        $db->query(
            "INSERT INTO questions (type, text) VALUES ('TextBox', '$q')"
        );
        $lastInsertedQuestion = $db->lastInsertId();
        
        // Add to question order
        $db->query(
            "INSERT INTO question_order (survey_ID, question_ID, question_index) VALUES ($surveyID, $lastInsertedQuestion, $index)"
        );
    }

    $index++;
}

// Redirect user after uploading all to database
header("Location: ../dashboard.php?notif=Survey Published!");


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

//This function was from stack overflow:
//https://stackoverflow.com/questions/4570980/generating-a-random-code-in-php
function generateCode() {
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    srand((double)microtime()*1000000);
    $i = 0; 
    $string = '' ; 

    while ($i <= 7) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $string = $string . $tmp; 
        $i++; 
    } 

    return $string; 
}

//print_r($_POST);