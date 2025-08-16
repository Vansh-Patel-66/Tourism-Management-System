<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourism Management Dashboard</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .top-navigation ul {
            display: flex;
            background-color: rgb(4, 1, 83);
            height: 60px;
            font-size: 20px;
            justify-content: space-evenly;
            align-items: center;
        }
        .top-navigation ul li {
            list-style: none;
        }
        .top-navigation ul li a {
            color: white;
            text-decoration: none;
        }
        .top-navigation ul li a:hover {
            text-decoration: underline;
        }
        .dashboard-container {
            max-width: 1500px;
            margin: 20px auto;
            padding: 20px;
            text-align: center;
        }
        .card-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 40px;
            justify-content: center;
            align-items: center;
            margin-left: 300px;
            margin-right: 300px;
        }
        .card {
            border-radius: 10px;
            padding: 20px;
            color: white;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
        }
        .card .number {
            font-size: 50px;
            margin-bottom: 10px;
        }
        .red {
            background-color: #e74c3c;
        }
        .purple {
            background-color: #9b59b6;
        }
        .orange {
            background-color: #f39c12;
        }
        .aqua {
            background-color: #1abc9c;
        }
    </style>
</head>
<body>
    <div class="top-navigation">
        <ul>
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="managepack.php">Manage Packages</a></li>
            <li><a href="user.php">Manage User</a></li>
            <li><a href="booking.php">Manage Booking</a></li>
            <li><a href="admin_login.php">Logout</a></li>
        </ul>
    </div>

    <div class="dashboard-container">
        <h1>Admin Dashboard</h1>
        <div class="card-container">
            <div class="card red">
                <div class="number">8</div>
                Users
            </div>
            <div class="card orange">
                <div class="number">4</div>
                Issues Raised
            </div>
            <div class="card purple">
                <div class="number">9</div>
                Total Packages
            </div>
            <div class="card aqua">
                <div class="number">3</div>
                Packages sell
            </div>
        </div>
    </div>
</body>
</html>
