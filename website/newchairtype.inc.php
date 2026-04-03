<?php
/* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
if (!isset($_SESSION['login'])) { exit(); } 
?>
<h2>Add New Chair Category</h2>
<form action="index.php?content=addchairtype" method="post">
    <p>Type ID (1-999): <br>
    <input type="number" name="chair_type_id" min="1" max="999" required></p>
    
    <p>Code (2-10 chars): <br>
    <input type="text" name="chair_type_code" minlength="2" maxlength="10" required></p>
    
    <p>Name (2-100 chars): <br>
    <input type="text" name="chair_type_name" minlength="2" maxlength="100" required></p>
    
    <p>Aisle Number (1-100): <br>
    <input type="number" name="chair_aisle_number" min="1" max="100" required></p>
    
    <button type="submit">Submit</button>
</form>