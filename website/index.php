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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mahi's Chairs - Inventory Management</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/png" href="images/logo.png">
    <style>
        * {
            font-family: Verdana, sans-serif !important;
        }

        input,
        select,
        textarea {
            background-color: #FDF5F6 !important;
            color: #1E1309 !important;
            border: 1px solid #1E1309 !important;
            -webkit-appearance: none;
            appearance: none;
        }

        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px #FDF5F6 inset !important;
        }

        .error-msg {
            color: #A56258;
            font-weight: bold;
            background-color: #FDF5F6;
            padding: 10px;
            border: 1px solid #A56258;
            margin-bottom: 15px;
            display: inline-block;
        }

        header {
            text-align: center !important;
            display: block !important;
            padding: 20px 0 !important;
        }

        header img {
            display: block;
            margin: 0 auto 5px auto;
            height: 70px;
        }

        header h1 {
            margin: 0;
            color: #E7D7CF;
        }

        header p {
            margin: 5px 0 0 0 !important;
            font-size: 14px !important;
            color: #E7D7CF !important;
            font-style: italic;
            display: block !important;
        }

        nav {
            text-align: center;
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin: 0 0 15px 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #1E1309;
            font-weight: bold;
        }

        .search-row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }

        .search-input {
            width: 45px !important;
        }
    </style>
</head>

<body>
    <?php if (!isset($_SESSION['login'])) : ?>
        <?php include('header.inc.php'); ?>
        <main>
            <h2>Please Login</h2>

            <?php if (isset($_GET['error'])): ?>
                <div class="error-msg">
                    Sorry, login incorrect. Please try again.
                </div>
            <?php endif; ?>

            <form action="validate.inc.php" method="post">
                Email: <input type="email" name="email" required><br><br>
                Password: <input type="password" name="password" required><br><br>
                <input type="submit" value="Login">
            </form>
        </main>
        <?php include('footer.inc.php'); ?>
    <?php else : ?>
        <?php include('header.inc.php'); ?>
        <?php include('nav.inc.php'); ?>
        <main>
            <?php
            if (isset($_GET['content'])) {
                $file = $_GET['content'] . '.inc.php';
                if (file_exists($file)) include($file);
                else echo "<h2>Page not found.</h2>";
            } else include('main.inc.php');
            ?>
        </main>
        <?php include('footer.inc.php'); ?>
    <?php endif; ?>
</body>

</html>