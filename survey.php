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
        <?php include_once("./includes/header.php"); ?>
        
        <!-- Main Content -->
        <main>
            <?php
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

                        // Add survey data to js
                        $surveyID = $survey->survey_ID;
                        $data = "'{$survey->survey_ID}','{$survey->name}','{$survey->code}','{$survey->description}','{$survey->status}'";
                        echo "<script class='deleteScript'>setSurvey({$data});</script>";

                        // Get all questions
                        $questions = $db->query(
                            "SELECT q.* FROM questions AS q INNER JOIN question_order AS qo ON q.question_ID=qo.question_ID AND qo.survey_ID='$surveyID'"
                        );

                        $questions = $questions->fetchAll();

                        // Get all options
                        foreach ($questions as $q) {
                            if ($q["type"] == "MultipleChoice") {
                                $questionID = $q["question_ID"];
                                
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
                                }
                            } else {
                                $data = "'null','TextBox','null'";
                                echo "<script class='deleteScript'>setOption({$data});</script>";
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
                    
                    } else {
                        // If cannot find survey data show error
                        invalidCode();
                    }

                } else {
                    // If survey code is not set then show error
                    invalidCode();
                }

                function invalidCode() {
                    echo("<p id='invalid-message'>Invalid or Incorrect Survey Code.</p>");
                }
            ?>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>