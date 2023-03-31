<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/survey.css">
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/surveyHeader.php"); ?>
        
        <!-- Main Content -->
        <main>
            <?php
                // Array to store the survey questions
                $surveyData = new StdClass();
                $surveyQuestions = array();

                // Check if survey code is provided
                if (isset($_GET["id"])) {
                    include_once './php/dbConnection.php';

                    $surveyCode = $_GET["id"];
                    
                    // Get survey data from database
                    $survey = $db->query(
                        "SELECT * FROM surveys WHERE code='$surveyCode'"
                    );

                    // If there is data then process
                    if ($survey->rowCount() == 1) {

                        // Fetch data
                        $survey = $survey->fetchObject();

                        // Check survey status
                        if ($survey->status == "1") {

                            // Add survey data to js
                            $surveyID = $survey->survey_ID;

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
                                <form id="survey" action="./php/publishSurveyResponse.php?<?php echo("id=" . $survey->survey_ID . "&noq=" . $survey->number_of_questions . "&code=" . $survey->code); ?>" method="POST">
                                <div id="survey-start">
                                    <h1><?php echo($survey->name); ?></h1>
                                    <h2><?php echo($survey->description); ?></h2>
                                    <br>
                                    <br>
                                    <p>Your data is anonymous and private.</p>
                                    <p>Please don't share personal information.</p>
                                    <br>
                                </div>

                            <?php
                            // print_r($surveyQuestions);
                            // $jsonView = json_encode($surveyQuestions);
                            // echo $jsonView;

                            $index = 1;
                            foreach ($surveyQuestions as $q) {
                                if ($q->type == "MultipleChoice") {
                                    ?>
                                        <div class="question-container">
                                            <div id="top-container">

                                                <div id="left-container">
                                                    <p><?php echo("Question " . $index); ?></p>
                                                    <h2><?php echo($q->text); ?></h2>
                                                </div>

                                                <div id="right-container">
                                                    <img src="./resources/images/placeholder.png" width="50px" height="50px" />
                                                </div>

                                            </div>
                                            <div id="bottom-container">

                                                <label class="option" for="question<?php echo($index . "option1"); ?>">
                                                    <input type="radio" form="survey" id="question<?php echo($index . "option1"); ?>" name="MultipleChoice#<?php echo($q->id); ?>#question<?php echo($index); ?>" value="<?php echo($q->options[0]->id); ?>">
                                                    <?php echo($q->options[0]->text); ?>
                                                </label>
                                                
                                                <label class="option" for="question<?php echo($index . "option2"); ?>">
                                                    <input type="radio" form="survey" id="question<?php echo($index . "option2"); ?>" name="MultipleChoice#<?php echo($q->id); ?>#question<?php echo($index); ?>" value="<?php echo($q->options[1]->id); ?>">
                                                    <?php echo($q->options[1]->text); ?>
                                                </label>

                                                <label class="option" for="question<?php echo($index . "option3"); ?>">
                                                    <input type="radio" form="survey" id="question<?php echo($index . "option3"); ?>" name="MultipleChoice#<?php echo($q->id); ?>#question<?php echo($index); ?>" value="<?php echo($q->options[2]->id); ?>">
                                                    <?php echo($q->options[2]->text); ?>
                                                </label>

                                                <label class="option" for="question<?php echo($index . "option4"); ?>">
                                                    <input type="radio" form="survey" id="question<?php echo($index . "option4"); ?>" name="MultipleChoice#<?php echo($q->id); ?>#question<?php echo($index); ?>" value="<?php echo($q->options[3]->id); ?>">
                                                    <?php echo($q->options[3]->text); ?>
                                                </label>

                                            </div>
                                        </div>
                                    <?php
                                } else {
                                    ?>
                                        <div class="question-container">
                                            <div id="top-container">

                                                <div id="left-container">
                                                    <p><?php echo("Question " . $index); ?></p>
                                                    <h2><?php echo($q->text); ?></h2>
                                                </div>

                                                <div id="right-container">
                                                    <img src="./resources/images/placeholder.png" width="50px" height="50px" />
                                                </div>

                                            </div>
                                            <div id="bottom-container">
                                                <textarea id="text-box" type="text" form="survey" name="TextBox#<?php echo($q->id); ?>#question<?php echo($index); ?>" placeholder="Answer goes here..."></textarea>
                                            </div>
                                        </div>
                                    <?php
                                }

                                $index++;
                            }

                            //publish survey button
                            ?>
                                <div id="send-response-container">
                                    <input class="button" name="submit" value="Send Resonse" type="submit" form="survey" />
                                </div>

                            <?php

                        } else {
                            // If cannot find survey data show error
                            echo("<p id='invalid-message'>Survey is Closed.</p>");  
                        }
                    
                    } else {
                        // If cannot find survey data show error
                        echo("<p id='invalid-message'>Invalid or Incorrect Survey Code.</p>");
                    }

                } else {
                    // If survey code is not set then show error
                    echo("<p id='invalid-message'>Invalid or Incorrect Survey Code.</p>");
                }
            ?>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>