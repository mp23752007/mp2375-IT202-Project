<?php
/* Name: Mahi Patel 
Date: Feb 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 1
Email: mp2375
*/
require_once('database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Note: index.php uses name="email" and name="password"
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Call the function from database.php
    $db = getDB();

    if ($db) {
        // Hash the input password to match the SHA2(?, 256) in the database
        $hashed_password = hash('sha256', $password);

        // MySQLi prepared statement
        $stmt = $db->prepare("SELECT email_address, first_name, last_name, pronouns, phone_number FROM chair_users WHERE email_address = ? AND password = ?");
        $stmt->bind_param("ss", $email, $hashed_password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            $_SESSION['login'] = true;
            $_SESSION['emailAddress'] = $user['email_address'];
            $_SESSION['pronouns'] = $user['pronouns'];
            $_SESSION['firstName'] = $user['first_name'];
            $_SESSION['lastName'] = $user['last_name'];
            $_SESSION['phoneNumber'] = $user['phone_number'];
            
            $stmt->close();
            $db->close();
            header("Location: main.inc.php");
            exit();
        } else {
            $stmt->close();
            $db->close();
            header("Location: index.php?error=1");
            exit();
        }
    } else {
        die("Database connection failed.");
    }
}
?>