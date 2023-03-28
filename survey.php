<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/survey.css">
        <script src="./js/Survey.js"></script>
        <script src="./js/Question.js"></script>
        <script src="./js/Option.js"></script>
        <script src="./js/surveyViewer.js"></script>
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/surveyHeader.php"); ?>
        
        <!-- Main Content -->
        <main>
            <div id="progress-bar">
                <div id="progress-bar-value"></div>
            </div>

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
                            $data = "'{$survey->survey_ID}','{$survey->name}','{$survey->code}','{$survey->description}','{$survey->status}'";
                            echo "<script class='deleteScript'>setSurvey({$data});</script>";
                            $surveyData->id = $survey->survey_ID;
                            $surveyData->name = $survey->name;
                            $surveyData->description = $survey->description;
                            $surveyData->code = $survey->code;
                            $surveyData->status = $survey->status;

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
                                    
                                    $options = $db->query(
                                        "SELECT o.* FROM options AS o INNER JOIN option_order AS oo ON o.option_ID=oo.option_ID AND oo.question_ID='$questionID'"
                                    );

                                    $options = $options->fetchAll();

                                    foreach ($options as $o) {
                                        $optionID = $o["option_ID"];
                                        $optionType = $o["type"];
                                        $optionText = $o["text"];
                                        $data = "'{$optionID}','{$optionType}','{$optionText}'";
                                        echo "<script class='deleteScript'>setOption({$data});</script>";

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
                                    $data = "'null','TextBox','null'";
                                    echo "<script class='deleteScript'>setOption({$data});</script>";

                                    // Create question object
                                    $question = new StdClass();
                                    $question->id = $q["question_ID"];
                                    $question->type = $q["type"];
                                    $question->text = $q["text"];
                                    $question->options = array();

                                    // Add question to array
                                    array_push($surveyQuestions, $question);
                                }

                                $questionID = $q["question_ID"];
                                $questionType = $q["type"];
                                $questionText = $q["text"];
                                $data = "'{$questionID}','{$questionType}','{$questionText}'";
                                echo "<script class='deleteScript'>setQuestion({$data});</script>";
                                
                                echo "<script class='deleteScript'>addQuestionToSurvey();</script>";
                            }

                            //delete all scripts
                            echo "<script class='deleteScript'>deleteScripts();</script>";

                            ?>
                                <form id="survey" action="./php/publishSurveyResponse.php" method="POST">
                                <div id="survey-start">
                                    <h1><?php echo($survey->name); ?></h1>
                                    <h2><?php echo($survey->description); ?></h2>
                                    <br>
                                    <br>
                                    <p>Your data is anonymous and private.</p>
                                    <p>Please don't share personal information.</p>
                                    <br>
                                    <br>
                                    <a class="button" href="#" onclick="startSurvey()">Start Survey</a>
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
                                                    <input type="radio" form="survey" id="question<?php echo($index . "option1"); ?>" name="question<?php echo($index); ?>" value="<?php echo($q->options[0]->text); ?>">
                                                    <?php echo($q->options[0]->text); ?>
                                                </label>
                                                
                                                <label class="option" for="question<?php echo($index . "option2"); ?>">
                                                    <input type="radio" form="survey" id="question<?php echo($index . "option2"); ?>" name="question<?php echo($index); ?>" value="<?php echo($q->options[1]->text); ?>">
                                                    <?php echo($q->options[1]->text); ?>
                                                </label>

                                                <label class="option" for="question<?php echo($index . "option3"); ?>">
                                                    <input type="radio" form="survey" id="question<?php echo($index . "option3"); ?>" name="question<?php echo($index); ?>" value="<?php echo($q->options[2]->text); ?>">
                                                    <?php echo($q->options[2]->text); ?>
                                                </label>

                                                <label class="option" for="question<?php echo($index . "option4"); ?>">
                                                    <input type="radio" form="survey" id="question<?php echo($index . "option4"); ?>" name="question<?php echo($index); ?>" value="<?php echo($q->options[3]->text); ?>">
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
                                                <textarea id="text-box" type="text" form="survey" name="question<?php echo($index); ?>" placeholder="Answer goes here..."></textarea>
                                            </div>
                                        </div>
                                    <?php
                                }

                                $index++;
                            }
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