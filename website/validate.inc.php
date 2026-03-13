<?php
/* Name: Mahi Patel 
Date: March 12, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
require_once('database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = getDB();

    if ($db) {
        $hashed_password = hash('sha256', $password);
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

            header("Location: index.php");
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
