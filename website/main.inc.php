<?php
/* Name: Mahi Patel 
Date: Feb 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 1
Email: mp2375
*/
session_start();
if (!isset($_SESSION['login'])) { header("Location: index.php"); exit(); }
?>
<html>
<head><title>Welcome to Chair Inventory Helper</title></head>
<body>
    <h2>Welcome to Chair Inventory Helper</h2>
    <h3>Welcome <?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] . " (" . $_SESSION['pronouns'] . ")"; ?></h3>
    <p>Logged in as: <?php echo $_SESSION['emailAddress']; ?></p>
    <p>Phone: <?php echo $_SESSION['phoneNumber']; ?></p>
    
    <a href="logout.inc.php">Logout</a>
</body>
</html>

