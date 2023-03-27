<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/survey.css">
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/header.php"); ?>
        
        <!-- Main Content -->
        <main>
            <?php
                //check if survey code is provided
                if (isset($_GET["s"])) {
                    include_once './php/dbConnection.php';

                    $surveyCode = $_GET["s"];
                    
                    //get survey info
                    $survey = $db->query(
                        "SELECT * FROM surveys WHERE code='$surveyCode'"
                    );

                    
                    if ($survey->rowCount() == 1) {
                        $survey = $survey->fetchObject();
                        $surveyID = $survey->survey_ID;

                        echo($survey->survey_ID);
                        echo($survey->name);
                        echo($survey->code);
                        echo($survey->description);
                        echo($survey->status);
                    } else {
                        echo "<p>Invalid Survey Code</p>";
                        exit();
                    }

                    //get all questions
                    $questions = $db->query(
                        "SELECT q.* FROM questions AS q INNER JOIN question_order AS qo ON q.question_ID=qo.question_ID AND qo.survey_ID='$surveyID'"
                    );

                    $questions = $questions->fetchAll();
                    print_r($questions);

                } else {
                    echo "<p>No survey id provided</p>";
                }
            ?>
            
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>