<?php

    // Set up connection creds

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $user = "jszfcemy_Roy";
    //$pass = ""; // For WAMP
    $pass = "roy92003407"; // For MAMP
    $url = "localhost";
    // Change the database name for each site
    $db = "jszfcemy_db_RoyFip";

    // Connect to db
    $link = mysqli_connect($url, $user, $pass, $db, "8888"); //Mac
    //$link = mysqli_connect($url, $user, $pass, $db); //PC

    // Check our connection
    if(!$link) {
        error_log("Connection error: " . mysqli_connect_error());
    }


?>