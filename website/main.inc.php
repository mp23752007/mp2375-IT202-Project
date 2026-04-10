<?php /* Name: Mahi Patel | IT-202-004 | Phase 5 */ ?>
<div style="display: flex; gap: 20px; align-items: flex-start;">
    <div style="flex: 3;">
        <h2>Welcome to Inventory Helper, <?php echo isset($_SESSION['firstName']) ? $_SESSION['firstName'] : 'Mahi'; ?></h2>
        <p>This program tracks chair category and item inventory.</p>
        <p>Please use the links in the navigation bar above.</p>
        <p style="color: #A56258; font-weight: bold;">Please DO NOT use the browser navigation buttons!</p>
    </div>

    <aside id="ajax-sidebar" style="flex: 1; background: #6E533C; color: #E7D7CF; padding: 15px; border: 2px solid #1E1309; border-radius: 5px;">
        <h3 style="border-bottom: 1px solid #E7D7CF; padding-bottom: 5px;">Real-time Inventory</h3>
        <p>Category Count: <span id="type-count" style="color: #F5ADB6; font-weight: bold;">...</span></p>
        <p>Item Count: <span id="item-count" style="color: #F5ADB6; font-weight: bold;">...</span></p>
        <p>Buy Price Total: $<span id="buy-total" style="color: #F5ADB6; font-weight: bold;">0.00</span></p>
        <p>Sell Price Total: $<span id="sell-total" style="color: #F5ADB6; font-weight: bold;">0.00</span></p>
        <button onclick="updateStats()" style="font-size: 11px; margin-top: 10px; width: 100%;">Refresh Stats</button>
    </aside>
</div>

<script>
function updateStats() {
    document.getElementById('type-count').innerText = "Loading...";
    
    fetch('inventory_stats.php')
        .then(res => res.json())
        .then(data => {
            document.getElementById('type-count').innerText = data.typeCount;
            document.getElementById('item-count').innerText = data.itemCount;
            document.getElementById('buy-total').innerText = data.buyTotal;
            document.getElementById('sell-total').innerText = data.sellTotal;
        })
        .catch(err => {
            console.error("AJAX Error: ", err);
            document.getElementById('type-count').innerText = "Error";
        });
}
window.onload = updateStats;
</script>