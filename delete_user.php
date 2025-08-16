<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "tour";

    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['username'])) {
            $username = $_POST['username'];

            $sql = "DELETE FROM user WHERE username = '$username'";
            $stmt = mysqli_query($conn, $sql);

            if ($stmt) {
                echo "User deleted successfully.";
            } else {
                echo "Error deleting user: " . mysqli_error($conn);
            }

        }
    }

    mysqli_close($conn);
    header("Location: user.php");
    exit();
?>
