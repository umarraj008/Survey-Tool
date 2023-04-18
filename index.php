<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/index.css">
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/header.php"); ?>
        
        <!-- Main Content -->
        <main>
            <div id="main-container">
                <div id="left-container">
                    <h1>The simplest and fastest way to make surveys</h1>
                    <h2>Create professional looking surveys with our free to use tool, with real-time data analysis, and many more features to make your experience as quick and easy as possible.</h2>
                    <div id="button-container">
                        <?php 
                            if (isset($_SESSION["user"])) {
                        ?>
                                <a href="./dashboard.php">Get Started - It's Free!</a>
                        <?php
                            } else {
                        ?>
                                <a href="./signup.php">Get Started - It's Free!</a>
                        <?php        
                            }
                        ?>
                        <a href="./about.php">More Information About Us</a>
                    </div>
                </div>
                <div id="right-container">
                    <img src="./resources/images/surveyGraphic1.png" width="100px" height="100px" />
                </div>
            </div>

            <hr>

            <div id="survey-code-container">
                <form action="survey.php" method="GET">
                    <h3>Got a survey code?</h3>
                    <p>Enter here:</p>
                    <div id="input-container">
                        <input type="text" name="id" placeholder="Eg. a0bxw5dp">
                        <input type="submit" value="Go">
                    </div>
                </form>
            </div>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>