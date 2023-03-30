<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/viewResults.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/header.php"); ?>
        
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
            ?>

            <h1 id="page-title">Results</h1>

            <!-- Survey info and button group -->
            <div id="survey-info-container">
                <div id="title-and-description-container">
                    <h2><?php echo($survey->name); ?></h2>
                    <h3><?php echo($survey->description); ?></h3>
                </div>
                <div id="survey-button-group-container">
                    <div id="top-container">
                        <a href="#" onclick="">Edit Survey</a>
                        <a href="#" onclick="">Close Survey</a>
                    </div>
                    <div id="bottom-container">
                        <a href="#" onclick="">Download Data</a>
                        <a href="#" onclick="">Delete Survey</a>
                    </div>
                </div>
            </div>

            <hr>

            <!-- List of questions results -->
            <div class="question-result-container">
                <div class="question-result">
                
                </div>
            </div>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>