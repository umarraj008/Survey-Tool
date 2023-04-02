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
                        <a href="#">Get Started - It's Free!</a>
                        <a href="#">More Information About Us</a>
                    </div>
                </div>
                <div id="right-container">
                    <img src="./resources/images/placeholder.png" width="100px" height="100px" />
                </div>
            </div>

            <div id="survey-code-container">
                <form action="survey.php" method="GET">
                    <h3>Got a survey code?</h3>
                    <p>Enter here:</p>
                    <div id="input-container">
                        <input type="text" name="id" placeholder="Code goes here...">
                        <input type="submit" value="Go">
                    </div>
                </form>

            </div>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>