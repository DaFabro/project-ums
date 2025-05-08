<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APADE Uniform Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f5f5f5;
        }
        header {
            background-color: #1e4620;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .logo H1 A {
            height: h40px;
            margin-right: 10px;
            text-decoration: none;
            color:#fff;
        }
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 15px;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        nav ul li a:hover {
            background-color: #2e6b31;
        }
        
        nav ul li a.active {
            background-color: #4CAF50;
        }
        
        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .welcome-box {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .welcome-text h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .welcome-text p {
            font-size: 16px;
            opacity: 0.9;
        }
        
        .date-display {
            font-size: 14px;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 10px;
            border-radius: 4px;
        }
        
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background-color: #4CAF50;
        }
        
        .card h2 {
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
        }
        
        .card p {
            color: #666;
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            background-color: #e9f5e9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .card-icon i {
            font-size: 24px;
            color: #4CAF50;
        }
        
        .card-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
        }
        
        .btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #45a049;
        }
        
        .stats {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .stat-item {
            flex: 1;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
        }
        
        .stat-item:nth-child(1)::before {
            background-color: #4CAF50;
        }
        
        .stat-item:nth-child(2)::before {
            background-color: #2196F3;
        }
        
        .stat-item:nth-child(3)::before {
            background-color: #FFC107;
        }
        
        .stat-item:nth-child(4)::before {
            background-color: #FF5722;
        }
        
        .stat-icon {
            font-size: 32px;
            margin-bottom: 15px;
        }
        
        .stat-item:nth-child(1) .stat-icon {
            color: #4CAF50;
        }
        
        .stat-item:nth-child(2) .stat-icon {
            color: #2196F3;
        }
        
        .stat-item:nth-child(3) .stat-icon {
            color: #FFC107;
        }
        
        .stat-item:nth-child(4) .stat-icon {
            color: #FF5722;
        }
        
        .stat-value {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 14px;
            color: #666;
        }
        
        .recent-activity {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 25px;
        }
        
        .recent-activity h2 {
            margin-bottom: 15px;
            color: #333;
        }
        
        .activity-list {
            list-style: none;
        }
        
        .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }
        
        .activity-icon {
            width: 36px;
            height: 36px;
            background-color: #e9f5e9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .activity-icon i {
            color: #4CAF50;
            font-size: 16px;
        }
        
        .activity-details {
            flex: 1;
        }
        
        .activity-title {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        
        .activity-time {
            font-size: 12px;
            color: #999;
        }
        
        .activity-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            text-transform: uppercase;
        }
        
        .status-completed {
            background-color: #e8f5e9;
            color: #4CAF50;
        }
        
        .status-pending {
            background-color: #fff8e1;
            color: #FFC107;
        }
        
        .status-cancelled {
            background-color: #ffebee;
            color: #f44336;
        }
        
        .site-footer {
    background-color: #1e4620;
    color: #fff;
    padding: 30px 20px;
    margin-top: 40px;
    text-align: center;
    font-size: 14px;
    border-top: 4px solid #4CAF50;
    box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
}

.site-footer .footer-content p {
    margin: 8px 0;
    line-height: 1.6;
}

.site-footer a {
    color: #4CAF50;
    text-decoration: none;
    transition: color 0.3s ease;
}

.site-footer a:hover {
    color: #ffffff;
}

        
        @media (max-width: 768px) {
            .stats {
                flex-direction: column;
            }
            
            .dashboard {
                grid-template-columns: 1fr;
            }
            
            .welcome-box {
                flex-direction: column;
                text-align: center;
            }
            
            .date-display {
                margin-top: 15px;
            }
            
            nav ul {
                flex-wrap: wrap;
            }
            
            nav ul li {
                margin-bottom: 5px;
            }
        }
    </style>
     <link rel="icon" href="logo-APADE.2x.png" type="x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo">
        <img src="logo-APADE.2x.webp" alt="" style="height: 60px; margin-left: 60px; ">
        <h1><a href="index.php">Apade School Uniform </a></h1>
        </div>
        <nav>
            <ul>
                <li><a href="inventory.php">Inventory</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="suppliers.php">Suppliers</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="welcome-box">
            <div class="welcome-text">
                <h1>Welcome to APADE Uniform Management System</h1>
                <p>Track, manage, and distribute school uniforms efficiently</p>
            </div>
        </div>
        <div class="stats">
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-tshirt"></i>
                </div>
                <div class="stat-value">2,584</div>
                <div class="stat-label">Total Uniforms</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-value">1,250</div>
                <div class="stat-label">Students Assigned</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="stat-value">86</div>
                <div class="stat-label">Pending Orders</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-value">14</div>
                <div class="stat-label">Low Stock Items</div>
            </div>
        </div>
        
        <div class="recent-activity">
            <h2>Recent Activity</h2>
            <ul class="activity-list">
                <li class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="activity-details">
                        <div class="activity-title">New Uniform Stock Added</div>
                        <div class="activity-time">Today, 10:30 AM - 200 units of Shirts (Size M) were added to inventory</div>
                    </div>
                    <span class="activity-status status-completed">Completed</span>
                </li>
                <li class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <div class="activity-details">
                        <div class="activity-title">Uniform Distribution</div>
                        <div class="activity-time">Yesterday, 2:15 PM - 45 uniforms distributed to Grade 10 students</div>
                    </div>
                    <span class="activity-status status-completed">Completed</span>
                </li>
                <li class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="activity-details">
                        <div class="activity-title">Order Placed with Supplier</div>
                        <div class="activity-time">May 05, 2025 - Order #UMS-2025-057 placed with TextilePro Inc.</div>
                    </div>
                    <span class="activity-status status-pending">Pending</span>
                </li>
                <li class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="activity-details">
                        <div class="activity-title">Order Cancellation</div>
                        <div class="activity-time">May 03, 2025 - Order #UMS-2025-054 cancelled due to quality issues</div>
                    </div>
                    <span class="activity-status status-cancelled">Cancelled</span>
                </li>
            </ul>
        </div>
        
        <div class="dashboard">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-box-open"></i>
                </div>
                <h2>Inventory Management</h2>
                <p>Manage uniform stock levels, categories, sizes, and check inventory status.</p>
                <div class="card-footer">
                    <a href="inventory.php" class="btn">Manage Inventory</a>
                </div>
            </div>
            
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h2>Student Assignment</h2>
                <p>Assign uniforms to students, track distribution, and manage returns.</p>
                <div class="card-footer">
                    <a href="students.php" class="btn">Manage Students</a>
                </div>
            </div>
            
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <h2>Supplier Management</h2>
                <p>Manage uniform suppliers, track orders, and maintain supplier relationships.</p>
                <div class="card-footer">
                    <a href="suppliers.php" class="btn">Manage Suppliers</a>
                </div>
            </div>
            
          
            
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <h2>Order Management</h2>
                <p>Create and manage uniform orders, track deliveries, and handle returns.</p>
                <div class="card-footer">
                    <a href="orders.php" class="btn">Manage Orders</a>
                </div>
            </div>
            
            
            
    </div>
    <footer class="site-footer">
    <div class="footer-content">
        <p>&copy; 2025 APADE Uniform Management System. All rights reserved.</p>
        <p>Designed with ❤️ by the APADE Tech Team</p>
    </div>
</footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('current-date').textContent = today.toLocaleDateString('en-US', options);
            console.log('APADE Uniform Management System loaded successfully!');
        });
    </script>
</body>
</html>