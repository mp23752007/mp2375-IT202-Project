<?php
/* Name: Mahi Patel 
Date: Feb 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 1
Email: mp2375
*/

function getDB($echo_mode = false)
{
    // These match your database 2 requirements but use the database 1 style
    $host = 'localhost';
    $port = 3306;
    $dbname = 'chair';
    $username = 'root';
    $password = 'Mahi2007';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $db = new mysqli($host, $username, $password, $dbname, $port);
        error_log("Database connection successful to " . $host);
        if ($echo_mode) echo "Database connection successful to " . $host;
        return $db;
    } catch (mysqli_sql_exception $e) {
        error_log("Database connection failed: " . $e->getMessage());
        if ($echo_mode) echo "Database connection failed: " . $e->getMessage();
        // Returning null helps validate.inc.php know the connection failed
        return null;
    }
}
// getDB(true);
