<?php 
/* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
if (!isset($_SESSION['login'])) { echo "<h2>Error: You must be logged in.</h2>"; return; } ?>
<h2>Add New Chair</h2>
<form action="index.php?content=addchair" method="post">
    <table>
        <tr><td><label>chair_id</label></td><td><input type="number" name="chair_id" required></td></tr>
        <tr><td><label>chair_code</label></td><td><input type="text" name="chair_code" required></td></tr>
        <tr><td><label>chair_name</label></td><td><input type="text" name="chair_name" required></td></tr>
        <tr><td><label>chair_description</label></td><td><textarea name="chair_description" required></textarea></td></tr>
        <tr><td><label>chair_material</label></td><td><input type="text" name="chair_material" required></td></tr>
        <tr><td><label>chair_style</label></td><td><input type="text" name="chair_style" required></td></tr>
        <tr><td><label>chair_type_id</label></td><td><input type="number" name="chair_type_id" required></td></tr>
        <tr><td><label>chair_buy_price</label></td><td><input type="number" step="0.01" name="chair_buy_price" required></td></tr>
        <tr><td><label>chair_sell_price</label></td><td><input type="number" step="0.01" name="chair_sell_price" required></td></tr>
    </table>
    <input type="submit" value="Submit">
</form>