<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/dashboard.css">
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
            <h1>Dashboard</h1>
            <br>

            <div id="create-survey-button-container">
                <a href="./createSurvey.php">Create New Survey</a>
            </div>
            <br>

            <ul class="survey-item-container">
                <h2>Active Surveys</h2>
                
                <?php
                    // Database connection
                    include_once("./php/dbConnection.php");

                    // Get user id
                    $userID = $_SESSION["user"]->user_ID;

                    // Get all user created surveys that are active
                    $getAllUserSurveysSQL = "SELECT s.* FROM surveys AS s INNER JOIN survey_owner AS so ON s.survey_ID=so.survey_ID AND so.user_ID='$userID' AND s.status='1'";
                    $surveys = $db->query($getAllUserSurveysSQL);

                    // Print each survey as a list item
                    if ($surveys->rowCount() > 0) {
                        $surveys = $surveys->fetchAll();

                        foreach($surveys as $survey) {
                            ?>
                            <li class="survey-item" onclick="openSurveyResults(<?php echo($survey['survey_ID'])?>)">
                                <p id="survey-item-title"><?php echo $survey["name"]; ?></p>
                                <p id="survey-item-questions">0 Questions</p>
                                <p id="survey-item-participants">0 Participants</p>
                                <div id="survey-item-kabab-menu">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </li> 
                            <?php
                        }
                    }

                ?>

            </ul>
            <hr>
            <br>

            <ul class="survey-item-container">
                <h2>Closed Surveys</h2>
                
                <?php
                    // Get all user created surveys that are not active
                    $getAllUserSurveysSQL = "SELECT s.* FROM surveys AS s INNER JOIN survey_owner AS so ON s.survey_ID=so.survey_ID AND so.user_ID='$userID' AND s.status='0'";
                    $surveys = $db->query($getAllUserSurveysSQL);

                    // Print each survey as a list item
                    if ($surveys->rowCount() > 0) {
                        $surveys = $surveys->fetchAll();

                        foreach($surveys as $survey) {
                            ?>
                            <li class="survey-item">
                                <p id="survey-item-title"><?php echo $survey["name"]; ?></p>
                                <p id="survey-item-questions">0 Questions</p>
                                <p id="survey-item-participants">0 Participants</p>
                                <div id="survey-item-kabab-menu">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </li> 
                            <?php
                        }
                    }

                ?>
            
            </ul>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>