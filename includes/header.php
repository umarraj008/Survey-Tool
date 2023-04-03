 <header>
    <div id="outer-container">
        <div id="title-container">
            <div id="image-container">
                <img src="./resources/images/placeholder.png" height="70%" onclick="location.href='./index.php'" style="cursor:pointer;"/>
            </div>
            <h1 id="title" onclick="location.href='./index.php'" style="cursor:pointer;">Cool Surveys</h1>
        </div>
        <nav>
            <div id="account-button-container">
                <?php 
                    if (isset($_SESSION["user"])) { 
                ?>
                        <a href="./profile.php">Account</a> 
                        <a href="./dashboard.php">Dashboard</a>
                <?php
                    } else { 
                ?>
                        <a href="./signup.php">Sign Up</a>
                        <a href="./login.php">Login</a>
                <?php
                    }
                ?>
            </div>
            <a href="./helpGuide.php">Learn</a>
            <a href="./contact.php">Contact</a>
            <a href="./about.php">About</a>
            <a href="./index.php">Home</a>
            
        </nav>
    </div>
    <?php
        if (isset($_GET["notif"])) {
            $message = $_GET["notif"];
            echo("<script>notification('$message')</script>");
        }

        if (isset($_GET["error"])) {
            $message = $_GET["error"];
            echo("<script>notification('$message')</script>");
        }
    ?>
</header>