<!-- Header Section -->
<header>
    <div id="outer-container">
        <div id="title-container">
            <div id="image-container">
                <img src="./resources/images/logo.png" height="70%" onclick="location.href='./index.php'" style="cursor:pointer;"/>
            </div>
            <h1 id="title" onclick="location.href='./index.php'" style="cursor:pointer;">Cool Surveys</h1>
        </div>
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