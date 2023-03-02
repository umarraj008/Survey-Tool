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
            <h2>Profile</h2>

            <?php 
                echo "<p>First Name: {$_SESSION["user"]->first_name} </p>";
                echo "<p>Last Name: {$_SESSION["user"]->last_name} </p>";
                echo "<p>Date of Birth: {$_SESSION["user"]->date_of_birth} </p>";
                echo "<p>Email: {$_SESSION["user"]->email} </p>";
            ?>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>