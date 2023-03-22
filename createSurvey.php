<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/createSurvey.css">
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/header.php"); ?>
        
        <!-- Script -->
        <script src="./js/surveyEditor.js"></script>

        <!-- Main Content -->
        <main>
            <!-- Side Menu -->
            <div id="side-menu">
                <ul>
                    <h2>Questions <span>(Drag and drop)</span></h2>
                    <br>
                    <li onclick="addQuestion('TextBox')">Text Box</li>
                    <li onclick="addQuestion('MultipleChoice')">Multiple Choice</li>
                    <li onclick="addQuestion('YesNoChoice')">Yes/No Choice</li>
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
                        <form id="survey" action="./php/publishSurvey.php" method="POST">
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
                    <hr>

                    <!-- Questions Container -->
                    <ul id="questions-container">

                        <!-- <li class="open-ended-question">
                            <div id="top-container">
                                <div id="question-number-container">
                                    <p>Q1</p>
                                </div>
                                <div id="question-type-container">
                                    <p>Text Box Question</p>
                                </div>
                                <div id="delete-question-container">
                                    <a href="">Delete Question</a>
                                </div>
                            </div>
                            <div id="bottom-container">
                                <div id="left-container">
                                    <div class="kabab-menu">
                                        <div class="dot-container">
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="dot-container">
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="dot-container">
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="right-container">
                                    <p>Question Text</p>
                                    <input type="text" name="question1" form="survey" value="" placeholder="Enter your question here...">
                                </div>
                            </div>
                        </li> -->

                        
                    </ul>
                </div>
            </div>
        </main>
            
        <!-- Footer Section -->
        <!-- <?php //include_once("./includes/footer.php"); ?> -->
    </body>
</html>