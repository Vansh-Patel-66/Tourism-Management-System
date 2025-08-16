<html>
<head>
    <title>Tourism Management</title>
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
        /* Main content section */
        .main-content {
            width: 80%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #0044cc;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        /* Button styling */
        .button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .button:hover {
            opacity: 0.8;
        }

        .button[style*='background-color: #e74c3c'] {
            background-color: #e74c3c;
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
    <div class="main-content">
    <div class="table-section">
            <table>
                <tr>
                    <th>Username</th>
                    <th>price</th>
                    <th>Cardno</th>
                    <th>Pack name</th>
                    <th>Actions</th>
                </tr>
                <?php
                    $host="localhost";
                    $user="root";
                    $pass="";
                    $db="tour";
                    $conn=mysqli_connect($host, $user, $pass, $db);
                    $sql="SELECT * FROM payment";
                    $result=mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['cardno']; ?></td>
                    <td><?php echo $row['packname']; ?></td>
                    <td class="actions">
                    <form action="delete_sellpack.php" method="POST" style="display:inline;">
                        <input type="hidden" name="package_id" value="<?php echo $row['username']; ?>">
                        <button type="submit" class="button" style="background-color: #e74c3c;">Delete</button>
                    </form>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    </div>
</body>
</html>