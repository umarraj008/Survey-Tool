<?php
// Resume session
session_start();
// Unset any data
session_unset();
// Destroy the session
session_destroy();
// Return the user back to the home page.
header("Location: ../index.php?notif=Successfully Logged Out!");
exit();