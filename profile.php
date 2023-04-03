<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/profile.css">
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/header.php"); ?>
        
        <!-- Main Content -->
        <main>
            <h1>My Account</h1>
            
            <div id="main-container">
                <div class="section-container">
                    <h2>My details</h2>
                    <hr>
                    <div id="input-container">
                        <label>First Name</label>
                        <input readonly type="text" value="<?php echo($_SESSION['user']->first_name); ?>" />
                        <label>Last Name</label>
                        <input readonly type="text" value="<?php echo($_SESSION['user']->last_name); ?>" />
                        <label>Date of Birth</label>
                        <input readonly type="text" value="<?php echo($_SESSION['user']->date_of_birth); ?>" />
                        <label>Email</label>    
                        <input readonly type="text" value="<?php echo($_SESSION['user']->email); ?>" />    
                    </div>
                </div>
                <div class="section2-container">
                    <h2>Settings</h2>
                    <hr>
                    <div id="input-container">
                        <input type="button" value="Logout" onclick="location.href='./php/logout.php'" />
                        <input type="button" value="Reset Password" />
                        <input type="button" value="Enable MFA" />
                        <input type="button" value="Delete All Surveys" />
                        <input type="button" value="Delete Account" />
                    </div>
                </div>
            </div>

        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>