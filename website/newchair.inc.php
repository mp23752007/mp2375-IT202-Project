<?php 
/* Name: Mahi Patel 
   Date: April 3, 2026 
   Course: IT-202-004 
   Assignment: Phase 4
   Email: mp2375@njit.edu 
*/
if (!isset($_SESSION['login'])) { exit(); } 
?>
<h2>Add New Chair</h2>
<form id="addChairForm" action="index.php?content=addchair" method="post">
    <p>ID (1-9999): <br>
    <input type="number" name="chair_id" id="chair_id" required></p>
    
    <p>Category Type ID (1-100): <br>
    <input type="number" name="chair_type_id" required></p>

    <p>Code (2-10 chars): <br>
    <input type="text" name="chair_code" required></p>

    <p>Name (3-100 chars): <br>
    <input type="text" name="chair_name" id="chair_name" required></p>

    <p>Description (10-255 chars): <br>
    <textarea name="chair_description" required style="width:300px; height:60px;"></textarea></p>

    <p>Buy Price ($0.01 - $5000.00): <br>
    <input type="number" step="0.01" name="chair_buy_price" required></p>

    <p>Sell Price ($0.01 - $9999.99): <br>
    <input type="number" step="0.01" name="chair_sell_price" required></p>

    <button type="submit" style="background-color: #6E533C; color: #E7D7CF; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">Add Chair</button>
</form>

<script>
document.getElementById('addChairForm').onsubmit = function(e) {
    const chairName = document.getElementById('chair_name').value;
    if (chairName.length < 3) {
        alert("Validation Error: Chair Name must be at least 3 characters long!");
        e.preventDefault();
        return false;
    }
};
</script>