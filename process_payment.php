<?php
session_start();

// Database connection
$con = mysqli_connect("localhost", "root", "", "tour");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buy'])) {

    $card_no = trim($_POST['card']);
    $cvv = trim($_POST['cvv']);
    $card_name = trim($_POST['name']);
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
    $price = isset($_SESSION['price']) ? floatval($_SESSION['price']) : 0.00;
    $packname = isset($_SESSION['packname']) ? $_SESSION['packname'] : 'Not available';

    // Validation
    if (empty($card_no) || empty($cvv) || empty($card_name)) {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
        exit();
    }

    if (!ctype_digit($card_no) || strlen($card_no) != 16) {
        echo "<script>alert('Invalid Card Number!'); window.history.back();</script>";
        exit();
    }

    if (!ctype_digit($cvv) || (strlen($cvv) < 3 || strlen($cvv) > 4)) {
        echo "<script>alert('Invalid CVV!'); window.history.back();</script>";
        exit();
    }

    // Insert into database (cardname replaced by packname)
    $sql = "INSERT INTO payment (cardno, cvv, packname, username, amount) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssd", $card_no, $cvv, $packname, $username, $price);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            unset($_SESSION['price'], $_SESSION['packname']); // clear session
            echo "<script>alert('Payment Successful!'); window.location.href = 'home.php';</script>";
        } else {
            echo "<script>alert('Payment Failed! Please try again.'); window.history.back();</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Database Error: Unable to process payment!'); window.history.back();</script>";
    }

    mysqli_close($con);
} else {
    echo "<script>alert('Invalid Request!'); window.history.back();</script>";
}
?>
