<?php
/* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
?>
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?content=listchairtypes">List Chair Types</a></li>
        <li><a href="index.php?content=newchairtype">Add New Chair Type</a></li>
        <li><a href="index.php?content=listchairs">List Chairs</a></li>
        <li><a href="index.php?content=newchair">Add New Chair</a></li>
    </ul>

    <br>

    <form action="index.php" method="get" style="margin-bottom: 15px;">
        <input type="hidden" name="content" value="updatechair">
        <label>Search for Chair:</label>
        <input type="text" name="chairID" required>
        <input type="submit" value="Search">
    </form>

    <form action="index.php" method="get" style="margin-bottom: 25px;">
        <input type="hidden" name="content" value="displaychairtype">
        <label>Search for Chair Type:</label>
        <input type="text" name="typeID" required>
        <input type="submit" value="Search">
    </form>

    <form action="index.php" method="get">
        <input type="hidden" name="content" value="logout">
        <input type="submit" value="Logout">
    </form>
</nav>
<hr>