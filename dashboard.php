<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/dashboard.css">
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/header.php"); ?>
        
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

                <li class="survey-item">
                    <p id="survey-item-title">Survey Title</p>
                    <p id="survey-item-questions">0 Questions</p>
                    <p id="survey-item-participants">0 Participants</p>
                    <div id="survey-item-kabab-menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </li>

                <li class="survey-item">
                    <p id="survey-item-title">Survey Title</p>
                    <p id="survey-item-questions">0 Questions</p>
                    <p id="survey-item-participants">0 Participants</p>
                    <div id="survey-item-kabab-menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </li>

                <li class="survey-item">
                    <p id="survey-item-title">Survey Title</p>
                    <p id="survey-item-questions">0 Questions</p>
                    <p id="survey-item-participants">0 Participants</p>
                    <div id="survey-item-kabab-menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </li>

                <li class="survey-item">
                    <p id="survey-item-title">Survey Title</p>
                    <p id="survey-item-questions">0 Questions</p>
                    <p id="survey-item-participants">0 Participants</p>
                    <div id="survey-item-kabab-menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </li>
            </ul>
            <hr>
            <br>

            <ul class="survey-item-container">
                <h2>Closed Surveys</h2>
                
                <li class="survey-item">
                    <p id="survey-item-title">Survey Title</p>
                    <p id="survey-item-questions">0 Questions</p>
                    <p id="survey-item-participants">0 Participants</p>
                    <div id="survey-item-kabab-menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </li>

                <li class="survey-item">
                    <p id="survey-item-title">Survey Title</p>
                    <p id="survey-item-questions">0 Questions</p>
                    <p id="survey-item-participants">0 Participants</p>
                    <div id="survey-item-kabab-menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </li>

                <li class="survey-item">
                    <p id="survey-item-title">Survey Title</p>
                    <p id="survey-item-questions">0 Questions</p>
                    <p id="survey-item-participants">0 Participants</p>
                    <div id="survey-item-kabab-menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </li>

                <li class="survey-item">
                    <p id="survey-item-title">Survey Title</p>
                    <p id="survey-item-questions">0 Questions</p>
                    <p id="survey-item-participants">0 Participants</p>
                    <div id="survey-item-kabab-menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </li>
            </ul>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>