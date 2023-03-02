<?php
// Connect to database
$host = "localhost";
$dbName = "survey_tool_db";
$username = "root";
$password = "";
$db = new PDO("mysql:dbname=$dbName;host=$host", $username, $password) or die("Error Connecting to Database.");