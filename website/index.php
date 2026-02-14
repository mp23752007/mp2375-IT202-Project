<?php /* Name: Mahi Patel 
Date: Feb 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 1
Email: mp2375
*/
session_start(); ?>
<html>
<head><title>Chairs Inventory - Login</title></head>
<body>
    <h2>Please Login to the Chairs Inventory Website</h2>
    <?php if(isset($_GET['error'])) echo "<p style='color:red;'>Sorry, login incorrect for Chairs Inventory</p>"; ?>
    
    <form action="validate.inc.php" method="post">
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>