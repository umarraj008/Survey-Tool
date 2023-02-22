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
            <h2>Signup</h2>

            <form action="./php/register.php" method="POST">
                <input type="text" name="first_name" placeholder="First Name" alt="First Name Textbox">
                <input type="text" name="last_name" placeholder="Last Name" alt="Last Name Textbox">
                <input type="date" name="date_of_birth" placeholder="Date of Birth" alt="Date of Birth Textbox">
                <input type="email" name="email" placeholder="Email" alt="Email Textbox">
                <input type="password" name="password" placeholder="Password" alt="Password Textbox">
                <input type="password" name="confirm_password" placeholder="Confirm Password" alt="Confirm Password Textbox">
                <input type="submit" name="submit" placeholder="Signup" alt="Signup Button" value="Signup">
            </form>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>