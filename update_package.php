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
    $package_id = mysqli_real_escape_string($conn, $_POST['package_id']);
    $package_name = mysqli_real_escape_string($conn, $_POST['package_name']);
    $package_photo = mysqli_real_escape_string($conn, $_POST['package_photo']);
    $package_price = mysqli_real_escape_string($conn, $_POST['package_price']);
    $package_type = mysqli_real_escape_string($conn, $_POST['package_type']);
    $package_location = mysqli_real_escape_string($conn, $_POST['package_location']);
    $package_feature = mysqli_real_escape_string($conn, $_POST['package_feature']);

    // Update the package in the database
    $sql = "UPDATE packs SET 
            name = '$package_name', 
            photo = '$package_photo', 
            price = '$package_price', 
            type = '$package_type', 
            location = '$package_location', 
            feature = '$package_feature' 
            WHERE id = '$package_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Package updated successfully.";
        echo "<br><a href='managepack.php'>Back to Manage Packages</a>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>
