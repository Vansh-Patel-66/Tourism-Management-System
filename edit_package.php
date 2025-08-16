<?php
// Database connection parameters
$host = "localhost";
$user = "root";
$pass = "";
$db = "tour";

// Create a connection
$conn = mysqli_connect($host, $user, $pass, $db);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the package details based on ID
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['package_id'])) {
    $package_id = mysqli_real_escape_string($conn, $_POST['package_id']);

    // Fetch package details
    $sql = "SELECT * FROM packs WHERE id = '$package_id'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        // Display the edit form with current package details
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Package</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    padding: 20px;
                    background-color: #f9f9f9;
                }
                .form-section {
                    background: #ffffff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                .form-group {
                    margin-bottom: 15px;
                }
                .form-group label {
                    display: block;
                    margin-bottom: 5px;
                }
                .form-group input {
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ddd;
                    border-radius: 4px;
                }
                .button {
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
            </style>
        </head>
        <body>
            <div class="form-section">
                <h2>Edit Package</h2>
                <form action="update_package.php" method="POST">
                    <input type="hidden" name="package_id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="package-name">Package Name:</label>
                        <input type="text" id="package-name" name="package_name" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="package-photo">Package Photo:</label>
                        <input type="text" id="package-photo" name="package_photo" value="<?php echo $row['photo']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="package-price">Package Price:</label>
                        <input type="number" id="package-price" name="package_price" value="<?php echo $row['price']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="package-type">Package Type:</label>
                        <input type="text" id="package-type" name="package_type" value="<?php echo $row['type']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="package-location">Package Location:</label>
                        <input type="text" id="package-location" name="package_location" value="<?php echo $row['location']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="package-feature">Package Feature:</label>
                        <input type="text" id="package-feature" name="package_feature" value="<?php echo $row['feature']; ?>" required>
                    </div>
                    <button type="submit" class="button">Update Package</button>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Package not found.";
    }
}

// Close the connection
mysqli_close($conn);
?>
