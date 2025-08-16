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
    // Retrieve the package ID from the form
    $package_id = $_POST['package_id'];

    // Delete the package from the database
    $sql = "DELETE FROM payment WHERE username = '$package_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Payment deleted successfully.";
        header("Location: booking.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
