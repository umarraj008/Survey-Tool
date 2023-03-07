<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/login.css">
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/header.php"); ?>
        
        <!-- Main Content -->
        <main>
            <form action="./php/loginAuth.php" method="POST">
                <h1>Login</h1>
                <br>
                
                <label for="email">Email address</label>
                <br>
                <input type="email" name="email" placeholder="Email" alt="Email Textbox">
                <br>
                <br>
                
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" placeholder="Password" alt="Password Textbox">
                <br>
                <br>
                
                <div>
                    <input type="checkbox" name="remember_me" value="Remember me" alt="Remember me checkbox">
                    <label for="remember_me">Remember me</label>

                    <a href="#">Forgot password</a>
                </div>
                <br>
                <br>
                <br>

                <input type="submit" name="submit" placeholder="Signup" alt="Login Button" value="Login">
                <br>
                <br>
                <a href="./signup.php">Don't have an account?</a>
            </form>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>