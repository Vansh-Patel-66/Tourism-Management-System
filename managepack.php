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
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-top: 40px;
            margin-bottom: 20px;
        }
        .main-content {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 20px;
        }
        .form-section, .table-section {
            flex: 1;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        form, table {
            width: 100%;
        }
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
            color: #2c3e50;
        }
        .form-group, .form-groupbox {
            margin: 15px 0;
        }
        .form-group label, .form-groupbox label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-groupbox input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-groupbox input {
            height: 70px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #2980b9;
        }
        .actions button {
            margin: 0 5px;
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
    <h1>Manage Packages</h1>

    <div class="main-content">
        <!-- Add New Package Section -->
        <div class="form-section">
            <h2>Add New Package</h2>
            <form action="add_package.php" method="POST">
                <div class="form-group">
                    <label for="package-name">Package Name:</label>
                    <input type="text" id="package-name" name="package_name" required>
                </div>
                <div class="form-group">
                    <label for="package-photo">Package Photo:</label>
                    <input type="text" id="package-photo" name="package_photo" required>
                </div>
                <div class="form-group">
                    <label for="package-price">Package Price:</label>
                    <input type="number" id="package-price" name="package_price" required>
                </div>
                <div class="form-group">
                    <label for="package-type">Package Type:</label>
                    <input type="text" id="package-type" name="package_type" required>
                </div>
                <div class="form-group">
                    <label for="package-location">Package Location:</label>
                    <input type="text" id="package-location" name="package_location" required>
                </div>
                <div class="form-groupbox">
                    <label for="package-feature">Package Feature:</label>
                    <input type="text" id="package-feature" name="package_feature" required>
                </div>
                <button type="submit" class="button">Add Package</button>
            </form>
        </div>

        <div class="table-section">
            <h2>Existing Packages</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                <?php
                    $host="localhost";
                    $user="root";
                    $pass="";
                    $db="tour";
                    $conn=mysqli_connect($host, $user, $pass, $db);
                    $sql="SELECT * FROM packs";
                    $result=mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>₹<?php echo $row['price']; ?></td>
                    <td class="actions">
                        <form action="edit_package.php" method="POST" style="display:inline;">
                            <input type="hidden" name="package_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="button">Edit</button>
                        </form>
                        <form action="delete_package.php" method="POST" style="display:inline;">
                            <input type="hidden" name="package_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="button" style="background-color: #e74c3c;">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
