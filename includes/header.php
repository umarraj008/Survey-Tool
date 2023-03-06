 <header>
    <div id="outer-container">
        <div id="title-container">
            <div id="image-container">
                <img src="./resources/images/placeholder.png" height="70%" />
            </div>
            <h1 id="title">Survey Tool</h1>
        </div>
        <nav>
            <div id="account-button-container">
                <?php 
                    if (isset($_SESSION["user"])) { 
                ?>
                        <a href="./php/logout.php">Logout</a> 
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
</header>