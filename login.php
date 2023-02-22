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
            <h2>Login</h2>
            <form action="./php/loginAuth.php" method="POST">
                <input type="email" name="email" placeholder="Email" alt="Email Textbox">
                <input type="password" name="password" placeholder="Password" alt="Password Textbox">
                <input type="submit" name="submit" placeholder="Signup" alt="Login Button" value="Login">
            </form>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>