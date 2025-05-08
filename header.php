<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<header>
    <div class="header-container">
        <div class="logo">
            <div class="logo">
            <img src="logo-APADE.2x.webp" alt="" style="height: 60px; margin-right: 75px; ">
                <h1><a href="index.php">Apade School Uniform </a></h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php" <?php echo ($current_page == 'index.php') ? 'class="active"' : ''; ?>>
                    <i class="fas fa-home"></i> Home
                </a></li>
                <li><a href="inventory.php" <?php echo ($current_page == 'inventory.php') ? 'class="active"' : ''; ?>>
                    <i class="fas fa-tshirt"></i> Inventory
                </a></li>
                
                
                <li><a href="orders.php" <?php echo ($current_page == 'orders.php') ? 'class="active"' : ''; ?>>
                    <i class="fas fa-shopping-cart"></i> Orders
                </a></li>
                
                <li><a href="suppliers.php" <?php echo ($current_page == 'suppliers.php') ? 'class="active"' : ''; ?>>
                    <i class="fas fa-truck"></i> Suppliers
                </a></li>
                <li><a href="about.php" <?php echo ($current_page == 'about.php') ? 'class="active"' : ''; ?>>
                    About
                </a></li>
            </ul>
            <div class="search-container">
    <form method="get" action="search.php" class="search-box">
        <i class="fas fa-search"></i>
        <input type="text" name="search" placeholder="Search by name, ID or class..." required>
        <button type="submit">Search</button>
    </form>
</div>
        </div>
        </nav>
    </div>
</header>