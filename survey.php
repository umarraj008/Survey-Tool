<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
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

                    $surveyID = $_GET["s"];

                    //get survey info
                    $survey = $db->query(
                        "SELECT * FROM surveys WHERE survey_ID='$surveyID'"
                    );

                    if ($survey->rowCount() == 1) {
                        $survey = $survey->fetchObject();
                        echo($survey->name);
                    }

                    //get all questions

                } else {
                    echo "<p>No survey id provided</p>";
                }
            ?>
            
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>