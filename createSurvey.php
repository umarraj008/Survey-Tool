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
            <div id="side-menu">
                <ul>
                    <h2>Questions <span>(Drag to add)</span></h2>
                    <li>Text Box</li>
                    <li>Multiple Choice</li>
                    <li>Yes/No Choice</li>
                    <li>Age Dropdown</li>
                    <li>Custom Dropdown</li>
                    <li>Date of Birth Entry</li>
                    <li>Rating Scale</li>
                    <li>Linkert Scale</li>
                </ul>
            </div>
            <div id="editor-outer-container">
                <div id="editor-inner-container">
                    <h1>Create New Survey</h1>
                    <?php
                        for ($i = 0; $i <1000; $i++) {
                            echo "<p>test</p>";
                        }
                    ?>
                </div>
            </div>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>