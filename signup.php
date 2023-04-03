<!DOCTYPE html>
<html lang="en-UK">
    <head>
        <?php include_once("./includes/headTags.php"); ?>
        <link rel="stylesheet" href="./css/signup.css">
    </head>
    <body>
        <!-- Header Section -->
        <?php include_once("./includes/header.php"); ?>
        
        <?php
            if (isset($_SESSION["user"])) {
                header("Location: ./dashboard.php");
            }
        ?>

        <!-- Main Content -->
        <main>
            <form action="./php/register.php" method="POST">
                <h1>Signup</h1>
                <br>
                
                <label for="first_name">First Name</label>
                <br>
                <input type="text" name="first_name" placeholder="First Name" alt="First Name Textbox">
                <br>
                <br>

                <label for="last_name">Last Name</label>
                <br>
                <input type="text" name="last_name" placeholder="Last Name" alt="Last Name Textbox">
                <br>
                <br>
                
                <label for="date_of_birth">Date of Birth</label>
                <br>
                <div id="dobContainer">                    
                    <select id="day" name="day" placeholder="Day">
                        <option value="Default">Day</option>
                        <?php
                            for($i = 1; $i < 32; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                        ?>
                    </select>

                    <select id="month" name="month">
                        <option value="Default">Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>

                    <select id="year" name="year">
                        <option value="Default">Year</option>
                        <?php
                            $currentYear = date("Y");
                            for ($i = $currentYear; $i > ($currentYear-100); $i--) {
                                echo "<option value='$i'>$i</option>";
                            }
                        ?>
                    </select>
                </div>
                <!-- <input type="date" name="date_of_birth" placeholder="Date of Birth" alt="Date of Birth Textbox"> -->
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
                
                <label for="confirm_password">Confirm Password</label>
                <br>
                <input type="password" name="confirm_password" placeholder="Confirm Password" alt="Confirm Password Textbox">
                <br>
                <br>

                <input type="checkbox" name="agreeTOS" value="true" alt="I agree to the Terms & Conditions and Privacy Policy*">
                <label for="agreeTOS">I agree to the <b><a href="#">Terms & Conditions</a></b> and <b><a href="#">Privacy Policy</a></b>*</label>
                <br>
                <br>
                <br>

                <input type="submit" name="submit" placeholder="Signup" alt="Signup Button" value="Signup">
                <br>
                <br>
                <a id="gotAccountText" href="./login.php">Already got an account? <b>Login</b></a>
            </form>
        </main>
            
        <!-- Footer Section -->
        <?php include_once("./includes/footer.php"); ?>
    </body>
</html>