<?php 
/* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
if (!isset($_SESSION['login'])) { echo "<h2>Error: You must be logged in.</h2>"; return; } ?>
<h2>Add New Chair Category</h2>
<form action="index.php?content=addchairtype" method="post">
    <table>
        <tr><td><label>chair_type_id</label></td><td><input type="number" name="chair_type_id" required></td></tr>
        <tr><td><label>chair_type_code</label></td><td><input type="text" name="chair_type_code" required></td></tr>
        <tr><td><label>chair_type_name</label></td><td><input type="text" name="chair_type_name" required></td></tr>
        <tr><td><label>chair_aisle_number</label></td><td><input type="number" name="chair_aisle_number" required></td></tr>
    </table>
    <input type="submit" value="Submit">
</form>