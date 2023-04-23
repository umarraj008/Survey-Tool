<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <script src="./js/dashboard.js"></script>
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/header.php"); ?>

        <?php
            // check if user is logged in
            if (!isset($_SESSION["user"])) {
                header("Location: ./signup.php");
            }
        ?>

        <!-- Main Content -->
        <main>
            <h1>Dashboard</h1>
            <br>

            <div id="create-survey-button-container">
                <a href="./createSurvey.php"><p><span class="material-symbols-outlined">add</span>Create New Survey</p></a>
            </div>
            <br>

            <ul class="survey-item-container">
                <h2>Active Surveys</h2>
                <hr>
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

                            // Get total response count
                            $surveyID = $survey["survey_ID"];

                            $totalParticipants = $db->query(
                                "SELECT survey_ID, count(*) as 'count' FROM survey_response WHERE survey_ID='$surveyID'"
                            );
                            
                            $totalParticipants = $totalParticipants->fetchObject();
                            $totalParticipants = $totalParticipants->count;

                            $codeString = "'" . $survey['code'] . "'";
                            ?>
                            <li class="survey-item">
                                <div id="left-container" onclick="openSurveyResults(<?php echo($codeString); ?>)">
                                    <p id="survey-item-title"><?php echo($survey["name"]. " | Code: " . $survey["code"]); ?></p>
                                    <p id="survey-item-questions"><?php echo($survey["number_of_questions"] . " Questions"); ?></p>
                                    <p id="survey-item-participants"><?php echo($totalParticipants . " Participants"); ?></p>
                                </div>
                                <div id="right-container" onclick="copyLink(<?php echo($codeString); ?>)">
                                    <a id="survey-item-copy-link-button"><p><span class="material-symbols-outlined">content_copy</span>Copy Survey Link</p></a>
                                </div>
                            </li> 
                            <?php
                        }
                    }

                ?>

            </ul>

            <ul class="survey-item-container">
                <h2>Closed Surveys</h2>
                <hr>
                <?php
                    // Get all user created surveys that are not active
                    $getAllUserSurveysSQL = "SELECT s.* FROM surveys AS s INNER JOIN survey_owner AS so ON s.survey_ID=so.survey_ID AND so.user_ID='$userID' AND s.status='0'";
                    $surveys = $db->query($getAllUserSurveysSQL);

                    // Print each survey as a list item
                    if ($surveys->rowCount() > 0) {
                        $surveys = $surveys->fetchAll();

                        foreach($surveys as $survey) {

                            // Get total response count
                            $surveyID = $survey["survey_ID"];

                            $totalParticipants = $db->query(
                                "SELECT survey_ID, count(*) as 'count' FROM survey_response WHERE survey_ID='$surveyID'"
                            );
                            
                            $totalParticipants = $totalParticipants->fetchObject();
                            $totalParticipants = $totalParticipants->count;

                            $codeString = "'" . $survey['code'] . "'";
                            ?>
                            <li class="survey-item">
                                <div id="left-container" onclick="openSurveyResults(<?php echo($codeString); ?>)">
                                    <p id="survey-item-title"><?php echo($survey["name"]. " | Code: " . $survey["code"]); ?></p>
                                    <p id="survey-item-questions"><?php echo($survey["number_of_questions"] . " Questions"); ?></p>
                                    <p id="survey-item-participants"><?php echo($totalParticipants . " Participants"); ?></p>
                                </div>
                                <div id="right-container" onclick="copyLink(<?php echo($codeString); ?>)">
                                    <a id="survey-item-copy-link-button"><p><span class="material-symbols-outlined">content_copy</span>Copy Survey Link</p></a>
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