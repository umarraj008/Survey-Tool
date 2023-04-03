<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/viewResults.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="./js/TextBoxQuestion.js"></script>
        <script src="./js/surveyResults.js"></script>
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/header.php"); ?>
        
        <?php
            if (!isset($_SESSION["user"])) {
                header("Location: ./signup.php");
            }
        ?>

        <!-- Scripts -->
        <script>
            function openSurveyResults(id) { location.href = "viewResults.php?sid=" + id; }
        </script>
        <!-- Main Content -->
        <main>
            <?php
                // Database connection
                include_once("./php/dbConnection.php");

                // Check if survey code is provided
                if (!isset($_GET["sid"])) {
                    header("Location: ./dashboard.php");
                    exit();
                }
                $surveyCode = $_GET["sid"];

                // Get survey from database
                $survey = $db->query(
                    "SELECT * FROM surveys WHERE code='{$surveyCode}'"
                );

                if ($survey->rowCount() == 1) {
                    $survey = $survey->fetchObject();
                } else {
                    header("Location: ./dashboard.php");
                    exit();
                }

                // Get survey id
                $surveyID = $survey->survey_ID;

                // Get user id
                $userID = $_SESSION["user"]->user_ID;

                // Check if user owns survey
                $result = $db->query(
                    "SELECT * FROM survey_owner WHERE user_ID='{$userID}' AND survey_ID='{$surveyID}'"
                );

                // If user does not own survey then redirect back
                if ($result->rowCount() != 1) {
                    header("Location: ./dashboard.php?you do not own the survey");
                    exit();
                }

                // Get total response count
                $totalParticipants = $db->query(
                    "SELECT survey_ID, count(*) as 'count' FROM survey_response WHERE survey_ID='$surveyID'"
                );

                $totalParticipants = $totalParticipants->fetchObject();
                $totalParticipants = $totalParticipants->count;

                // Create list to store survey questions
                $surveyQuestions = array();

                // Get all questions
                $questions = $db->query(
                    "SELECT q.* FROM questions AS q INNER JOIN question_order AS qo ON q.question_ID=qo.question_ID AND qo.survey_ID='$surveyID'"
                );

                $questions = $questions->fetchAll();

                // Get all options
                foreach ($questions as $q) {
                    if ($q["type"] == "MultipleChoice") {
                        $questionID = $q["question_ID"];
                        
                        // Create question object
                        $question = new StdClass();
                        $question->id = $q["question_ID"];
                        $question->type = $q["type"];
                        $question->text = $q["text"];
                        $question->options = array();
                        
                        // Get all options
                        $options = $db->query(
                            "SELECT o.* FROM options AS o INNER JOIN option_order AS oo ON o.option_ID=oo.option_ID AND oo.question_ID='$questionID'"
                        );

                        $options = $options->fetchAll();

                        // Create option object
                        foreach ($options as $o) {

                            // Create option object
                            $option = new StdClass();
                            $option->id = $o["option_ID"];
                            $option->type = $o["type"];
                            $option->text = $o["text"];

                            // Add option object to question
                            array_push($question->options, $option);
                        }

                        // Add question to array
                        array_push($surveyQuestions, $question);

                    } else {

                        // Create question object
                        $question = new StdClass();
                        $question->id = $q["question_ID"];
                        $question->type = $q["type"];
                        $question->text = $q["text"];
                        $question->options = array();

                        // Add question to array
                        array_push($surveyQuestions, $question);
                    }
                }
            ?>

            <h1 id="page-title">Results</h1>

            <!-- Survey info and button group -->
            <div id="survey-info-container">
                <div id="title-and-description-container">
                    <h2><?php echo($survey->name); ?></h2>
                    <h3><?php echo($survey->description); ?></h3>
                    <h3><?php echo("Total Participants: " . $totalParticipants); ?></h3>
                </div>
                <div id="survey-button-group-container">
                    <div id="top-container">
                        <a>Edit Survey</a>
                        <?php
                            if ($survey->status == "0") {
                        ?>
                            <a onclick="location.href='./php/updateSurvey.php?userID=<?php echo($userID); ?>&surveyID=<?php echo($surveyID); ?>&status=open'">Activate Survey</a>
                        <?php
                            } else if ($survey->status == "1") {
                        ?>        
                            <a onclick="location.href='./php/updateSurvey.php?userID=<?php echo($userID); ?>&surveyID=<?php echo($surveyID); ?>&status=close'">Close Survey</a>
                        <?php
                            }
                        ?>
                    </div>
                    <div id="bottom-container">
                        <a>Download Data</a>
                        <a onclick="location.href='./php/deleteSurvey.php?userID=<?php echo($userID); ?>&surveyID=<?php echo($surveyID); ?>'">Delete Survey</a>
                    </div>
                </div>
            </div>

            <hr>

            <!-- List of questions results -->
            <div id="question-result-container">
            <?php
                $index = 1;
                foreach ($surveyQuestions as $q) {
                    if ($q->type == "TextBox") {
            ?>
                        <div class="question-result">
                            <div id="question-text" class="inner-question-container">
                                <p><?php echo("Question " . $index); ?></p>
                                <h2><?php echo($q->text); ?></h2>
                            </div>
                            <div id="text-box-answer-viewer-container" >
                                <div id="text-box-answer-button-container">
                                    <a onclick="previousTextBoxAnswer('TextBoxAnswer<?php echo($index); ?>','<?php echo($index); ?>')">Previous</a>
                                    <p id="TextBoxTotal<?php echo($index)?>">0 / 0</p>
                                    <a onclick="nextTextBoxAnswer('TextBoxAnswer<?php echo($index); ?>','<?php echo($index); ?>')">Next</a>
                                </div>
                                <div id="text-box-answer">
                                    <p id="TextBoxAnswer<?php echo($index); ?>">answer</p>
                                </div>
                            </div>
                        </div>
            <?php

                        // Get all responses for this question
                        $answers = $db->query(
                            "SELECT a.* FROM answers AS a INNER JOIN answer_response AS ar ON a.answer_ID=ar.answer_ID AND ar.question_ID='$q->id'"
                        );

                        // Fetch all answers
                        $answers = $answers->fetchAll();

                        // Convert question answers to string
                        $answerString = "'";
                        foreach ($answers as $a) {
                            $answerString = $answerString . $a["text"] . "#@#";
                        }

                        // Remove last comma
                        $answerString = rtrim($answerString, "#@#") . "'";

                        echo("<script>setTextBoxData('TextBoxAnswer" . $index . "', " . $index . ", " . $answerString . ");</script>");

                    } else if ($q->type == "MultipleChoice") {
            ?>
                        <div class="question-result">
                            <div id="question-text" class="inner-question-container">
                                <p><?php echo("Question " . $index); ?></p>
                                <h2><?php echo($q->text); ?></h2>
                            </div>
                            <div id="pie-chart" class="chart-container">
                                <canvas id="<?php echo("pieChartQuestion" . $index); ?>"></canvas>
                            </div>
                            <div id="bar-chart" class="chart-container">
                                <canvas id="<?php echo("barChartQuestion" . $index); ?>"></canvas>
                            </div>
                        </div>

            <?php
                        // Convert options to string
                        $labels = "'";
                        $options = $q->options;
                        foreach($options as $o) {
                            $labels = $labels . $o->text . ",";
                        }
                        
                        // Remove last comma
                        $labels = rtrim($labels, ",") . "'";

                        // Get all responses for this question
                        $answers = $db->query(
                            "SELECT a.* FROM answers AS a INNER JOIN answer_response AS ar ON a.answer_ID=ar.answer_ID AND ar.question_ID='$q->id'"
                        );

                        // Fetch all answers
                        $answers = $answers->fetchAll();

                        // Create array to store count for each option
                        $count = array(0, 0, 0, 0);

                        foreach($answers as $a) {
                            if ($a["option_ID"] == $options[0]->id) {
                                $count[0]++;

                            } else if ($a["option_ID"] == $options[1]->id) {
                                $count[1]++;

                            } else if ($a["option_ID"] == $options[2]->id) {
                                $count[2]++;

                            } else if ($a["option_ID"] == $options[3]->id) {
                                $count[3]++;

                            }
                        }
                        
                        // Convert count to string
                        $data = "'";
                        foreach($count as $c) {
                            $data = $data . $c . ",";
                        }

                        // Remove last comma
                        $data = rtrim($data, ",") . "'";
                        
                        echo("<script>setChartData('pieChartQuestion" . $index . "', 'barChartQuestion" . $index . "', ". $labels . ", " . $data .");</script>");
                    }
                    $index++;
                }

                //echo("<script>addData(" . $data . ");</script>");
            ?>
            </div>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>