<?php 
/* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mahi's Chairs</title>
</head>
<body>

    <?php 
    if (!isset($_SESSION['login'])) { 
    ?>
        <?php include('header.inc.php'); ?>
        
        <main>
            <h2>Please Login</h2>
            <?php if(isset($_GET['error'])) echo "<p style='color:red;'>Sorry, login incorrect</p>"; ?>
            
            <form action="validate.inc.php" method="post">
                Email: <input type="email" name="email" required><br><br>
                Password: <input type="password" name="password" required><br><br>
                <input type="submit" value="Login">
            </form>
        </main>
        
        <?php include('footer.inc.php'); ?>

    <?php 
    } else { 
    ?>
        
        <main>
            <?php 
            if (isset($_GET['content'])) {
                $content = $_GET['content'];
                $file = $content . '.inc.php';
                
                if (file_exists($file)) {
                    include($file);
                } else {
                    echo "<h2>Error: Page not found.</h2>";
                }
            } else {
                include('main.inc.php');
            }
            ?>
        </main>

        <hr>

        <?php include('header.inc.php'); ?>

        <?php include('nav.inc.php'); ?>

        <?php include('footer.inc.php'); ?>

    <?php } ?>

</body>
</html>