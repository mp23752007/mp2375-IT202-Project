<?php
/* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
?>
<h2>Welcome to Chair Inventory Helper</h2>
<h3>Welcome <?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] . " (" . $_SESSION['pronouns'] . ")"; ?></h3>
<p>Logged in as: <?php echo $_SESSION['emailAddress']; ?></p>
<p>Phone: <?php echo $_SESSION['phoneNumber']; ?></p>