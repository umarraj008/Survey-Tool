<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/thanks.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/surveyHeader.php"); ?>
        
        <!-- Main Content -->
        <main>
            <div id="main-container">
                <div id="text-container">
                    <img src="./resources/images/surveyGraphic4.png" width="100px" height="100px" />
                    <h1>Thanks for completing this survey!</h1>
                    <h2>Your response has been saved.</h2>
                    <div id="button-container">
                        <a href="./index.php">
                            <div>
                                <p><span class="material-symbols-outlined">home</span>Home</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>