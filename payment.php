<?php
session_start();

// Redirect to login if session expired
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Session expired. Please log in again.'); window.location.href = 'login.php';</script>";
    exit();
}

// Capture package details from POST request and store in session
if (isset($_POST['price']) && isset($_POST['name'])) {
    $_SESSION['price'] = $_POST['price'];
    $_SESSION['packname'] = $_POST['name']; // store selected pack name
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pay by Debit Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        .input-group input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        input[type="submit"], input[type="reset"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            margin-top: 10px;
        }
        input[type="submit"] { background-color: #28a745; }
        input[type="reset"] { background-color: #dc3545; }
        input[type="submit"]:hover { background-color: #218838; }
        input[type="reset"]:hover { background-color: #c82333; }
        .btn-home {
            display: block;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 15px;
            width: 95%;
            text-align: center;
        }
        .btn-home:hover { background-color: #0056b3; }
        h2 { color: #333; margin-bottom: 10px; }
    </style>
</head>
<body>
    <form action="process_payment.php" method="post">
        <div id="DebitCard" class="pay">
            <h3>Pay by Debit Card</h3>
            <div class="input-group">
                <label for="card">Card Number</label>
                <input type="text" id="card" name="card" placeholder="Enter Card Number" required>
            </div>
            <div class="input-group">
                <label for="cvv">CVV/CVC</label>
                <input type="text" id="cvv" name="cvv" placeholder="Enter CVV/CVC" required>
            </div>
            <div class="input-group">
                <label for="name">Card Holder Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Card Holder Name" required>
            </div>
            <div class="input-group">
                <h2>Bill Amount: ₹<?php echo isset($_SESSION['price']) ? $_SESSION['price'] : 'Not available'; ?></h2>
            </div>
            <div class="input-group">
                <h2>Pack Name: <?php echo isset($_SESSION['packname']) ? $_SESSION['packname'] : 'Not available'; ?></h2>
            </div>
            <div class="input-group">
                <input type="submit" value="Buy" name="buy" id="buy">
                <input type="reset" value="Reset">
            </div>
            <a href="home.php" class="btn-home">Go to Home</a>
        </div>
    </form>

    <script>
        document.getElementById('buy').addEventListener('click', function() {
            alert("Processing payment...");
        });
    </script>
</body>
</html>
