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
<h2>Add New Chair</h2>
<form action="index.php?content=addchair" method="post">
    <p>ID (1-9999): <br>
    <input type="number" name="chair_id" min="1" max="9999" required></p>
    
    <p>Category Type ID (1-100): <br>
    <input type="number" name="chair_type_id" min="1" max="100" required></p>

    <p>Code (2-10 chars): <br>
    <input type="text" name="chair_code" minlength="2" maxlength="10" required></p>

    <p>Name (3-100 chars): <br>
    <input type="text" name="chair_name" minlength="3" maxlength="100" required></p>

    <p>Description (10-255 chars): <br>
    <textarea name="chair_description" minlength="10" maxlength="255" required style="width:300px; height:60px;"></textarea></p>

    <p>Buy Price ($0.01 - $5000.00): <br>
    <input type="number" step="0.01" name="chair_buy_price" min="0.01" max="5000.00" required></p>

    <p>Sell Price ($0.01 - $9999.99): <br>
    <input type="number" step="0.01" name="chair_sell_price" min="0.01" max="9999.99" required></p>

    <button type="submit">Add Chair</button>
</form>