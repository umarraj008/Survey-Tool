<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/contact.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/header.php"); ?>
        
        <!-- Main Content -->
        <main>
            <h1>Contact us</h1>
            <div id="main-container">
                <div id="left-container">
                    <p>Use this form or send us an email at <a href="mailto:support@coolsurveys.com">support@coolsurveys.com</a>. We'll get back to you as soon as possible.</p>
                    <img src="./resources/images/surveyGraphic3.png" width="100px" height="100px">
                </div>
                <div id="right-container">
                    <div id="form-container">
                        <form action="" method="POST" onsubmit="notification('Message Sent!')">
                            <label>First Name</label>
                            <br>
                            <input type="text" name="First Name" placeholder="First Name">
                            <br>

                            <label>Last Name</label>
                            <br>
                            <input type="text" name="Last Name" placeholder="Last Name">
                            <br>
                            
                            <label>Email address</label>
                            <br>
                            <input type="text" name="Email address" placeholder="Email address">
                            <br>
                            
                            <label>Your message</label>
                            <br>
                            <textarea type="text" name="message" placeholder="Your message goes here..."></textarea>
                            <br>
                            <div id="button-container"> 
                                <button type="submit" value="Send">
                                    <p><span class="material-symbols-outlined">Send</span>Send</p>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>