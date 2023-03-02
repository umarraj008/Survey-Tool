 <header>
    <h1>Survey Tool</h1>
    <nav>
        <a href="./index.php">Home</a>
        <a href="./about.php">About</a>
        <a href="./contact.php">Contact</a>
        <a href="./helpGuide.php">Help Guide</a>
        <?php 
            if (isset($_SESSION["user"])) { 
        ?>
                <a href="./profile.php">Profile</a>
                <a href="./dashboard.php">Dashboard</a>
                <a href="./php/logout.php">Logout</a> 
        <?php
            } else { 
        ?>
                <a href="./signup.php">Join Us</a>
                <a href="./login.php">Login</a>
        <?php
            }
        ?>
    </nav>
</header>