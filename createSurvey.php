<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/createSurvey.css">
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/header.php"); ?>
        
        <!-- Main Content -->
        <main>
            <!-- Side Menu -->
            <div id="side-menu">
                <ul>
                    <h2>Questions <span>(Drag to add)</span></h2>
                    <br>
                    <li>Text Box</li>
                    <li>Multiple Choice</li>
                    <li>Yes/No Choice</li>
                    <li>Dropdown Selection</li>
                    <li>Date of Birth Entry</li>
                    <li>Rating Scale</li>
                    <li>Linkert Scale</li>
                    <br>
                    <h2>Preset Questions</h2>
                    <br>
                    <li>What is your first name?</li>
                    <li>What is your middle name?</li>
                    <li>What is your last name?</li>
                    <li>What is your email?</li>
                    <li>What is your phone number?</li>
                    <li>What is your age?</li>
                    <li>What is your gender?</li>
                </ul>
            </div>

            <!-- Editor Window -->
            <div id="editor-outer-container">
                <div id="editor-inner-container">
                    
                    <!-- Title and publish survey button -->
                    <div id="publish-survey-button-container">
                        <h1>Create New Survey</h1>
                        <form id="survey" action="#" method="POST">
                        <input type="submit" value="Publish Survey" />
                    </div>

                    <!-- Survey title and description box -->
                    <div id="survey-title-and-description-container">
                        <div style="background-color: red">
                            <label>Survey Title</label><br>
                            <textarea name="survey_title" form="survey" placeholder="Survey title goes here..."></textarea><br>
                        </div>
                        <div style="width: 15px; height: 100%;"></div>
                        <div style="background-color: lime">
                            <label>Survey Description</label><br>
                            <textarea name="survey_description" form="survey" placeholder="Survey description goes here..."></textarea>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <ul id="questions-container">
                        <li>Question 1</li>
                        <li>Question 2</li>
                        <li>Question 3</li>
                        <li>Question 4</li>
                        <li>Question 5</li>
                        <li>Question 6</li>
                        <li>Question 7</li>
                        <li>Question 8</li>
                        <li>Question 9</li>
                        <li>Question 10</li>
                    </ul>
                </div>
            </div>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>