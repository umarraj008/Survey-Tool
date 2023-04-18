<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/profile.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/header.php"); ?>
        
        <?php
            if (!isset($_SESSION["user"])) {
                header("Location: ./signup.php");
            }
        ?>

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
                        <button type="button" value="Logout" onclick="location.href='./php/logout.php'">
                            <p><span class="material-symbols-outlined">logout</span>Logout</p>
                        </button>

                        <button type="button" value="Reset Password">
                            <p><span class="material-symbols-outlined">lock_reset</span>Reset Password</p>
                        </button>

                        <button type="button" value="Enable MFA">
                            <p><span class="material-symbols-outlined">shield_lock</span>Enable MFA</p>
                        </button>

                        <button type="button" value="Delete All Surveys">
                            <p><span class="material-symbols-outlined">delete</span>Delete All Surveys</p>
                        </button>

                        <button type="button" value="Delete Account">
                            <p><span class="material-symbols-outlined">delete</span>Delete Account</p>
                        </button>

                    </div>
                </div>
            </div>

        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>