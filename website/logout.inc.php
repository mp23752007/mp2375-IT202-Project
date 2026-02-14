<?php
/* Name: Mahi Patel 
Date: Feb 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 1
Email: mp2375
*/
session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit();
?>