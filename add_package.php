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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $package_name = mysqli_real_escape_string($conn, $_POST['package_name']);
    $package_photo = mysqli_real_escape_string($conn, $_POST['package_photo']);
    $package_price = mysqli_real_escape_string($conn, $_POST['package_price']);
    $package_type = mysqli_real_escape_string($conn, $_POST['package_type']);
    $package_location = mysqli_real_escape_string($conn, $_POST['package_location']);
    $package_feature = mysqli_real_escape_string($conn, $_POST['package_feature']);

    // Validate price to ensure it is positive and greater than 0
    if (!is_numeric($package_price) || $package_price <= 0) {
        echo "Error: Package price must be a positive number greater than 0.";
        echo "<br><a href='managepack.php'>Back to Manage Packages</a>";
    } else {
        // Insert data into the packs table
        $sql = "INSERT INTO packs (name, photo, price, type, location, feature) 
                VALUES ('$package_name', '$package_photo', '$package_price', '$package_type', '$package_location', '$package_feature')";

        if (mysqli_query($conn, $sql)) {
            echo "New package added successfully.";
            echo "<br><a href='managepack.php'>Back to Manage Packages</a>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
