<?php /* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
 ?>
<nav>
    <ul class="nav-links">
        <li><a href="index.php"><img src="images/home.png" height="16"> Home</a></li>
        <li><a href="index.php?content=listchairtypes"><img src="images/categories.png" height="16"> List Types</a></li>
        <li><a href="index.php?content=newchairtype"><img src="images/categories.png" height="16"> Add Type</a></li>
        <li><a href="index.php?content=listchairs"><img src="images/items.png" height="16"> List Chairs</a></li>
        <li><a href="index.php?content=newchair"><img src="images/items.png" height="16"> Add Chair</a></li>
    </ul>
    
    <div class="search-row">
        <form action="index.php" method="get" style="display:inline;">
            <input type="hidden" name="content" value="updatechair">
            Chair ID: <input type="text" name="chairID" style="width:40px;" required>
            <button type="submit"><img src="images/realtime.png" height="14"> Search</button>
        </form>

        <form action="index.php" method="get" style="display:inline;">
            <input type="hidden" name="content" value="displaychairtype">
            Type ID: <input type="text" name="typeID" style="width:40px;" required>
            <button type="submit"><img src="images/realtime.png" height="14"> Search</button>
        </form>

        <a href="logout.inc.php" class="logout-btn" style="text-decoration:none;">
            <img src="images/logout.png" height="14"> Logout
        </a>
    </div>
</nav>