<?php
// Secure database connection
$con = mysqli_connect("localhost", "root", "", "tour");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form data is set before accessing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Use prepared statement to prevent SQL Injection
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Secure password verification
            if ($password == $user['password']) {  // Plaintext password comparison (Not Recommended)
                session_start();
                $_SESSION['username'] = $username;
                header("Location: home.php");
                exit();
            } else {
                echo '<script>alert("Incorrect password! Please try again."); window.history.back();</script>';
            }
        } else {
            echo '<script>alert("Username not found! Please Sign Up First."); window.location.href="sign_up.php";</script>';
        }
    }
} 

// Close connection
mysqli_close($con);
?>


<html>
<head>
    <title>Login</title>
	<style>
        body {
			background-image: url('image/tour.webp');
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height:700px;
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
        }
        h2:hover{
            cursor:default;
        }

        .con {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            height:340px;
            text-align: center;
			margin-left: 60px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }

        label {
            margin-bottom: 8px;
            color: #666;
			margin-right:220px;
        }

        input {
            padding: 8px;
            margin-bottom: 12px;
            width: 100%;
            border-top:none;
			border-right:none;
			border-left:none;
			outline:none;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            width:300px;
            border-radius: 5px;
            cursor: pointer;
        }
        p {
            margin-top: 15px;
        }
        p:hover{
            cursor:default;
        }
    </style>
</head>
<body>
    <div class="con">
        <form action="login.php" method="post">
            <h2>Login</h2>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <p>Don't have an account?<a href="sign_up.php">Sign up</a></p>
        <p>Admin Login?<a href="admin_login.php">Login</a></p>
    </div>
</body>
</html>