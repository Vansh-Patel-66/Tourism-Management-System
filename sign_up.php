<?php
if (isset($_POST['signup'])) {
    $username = $_POST['username']; 
    $password = $_POST['password'];

    $con = mysqli_connect("localhost", "root", "", "tour");
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $user_name = mysqli_query($con, $sql);

    if (mysqli_num_rows($user_name) > 0) {
        echo "<script>
                alert('username already exists. Please use a different username.');
                window.location.href = 'sign_up.php';
              </script>";
    }
    else 
    {
        $qry1 = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($con, $qry1);

        if ($result) {
            echo "<script>
                alert('signup successfully.');
                window.location.href = 'login.php';
              </script>";
        }
    }
    mysqli_close($con);
}
?>



<html>
<head>
    <title>Sign Up</title>
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
            padding: 30px;
            border-radius: 10px;
            width: 300px;
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
        <form action="sign_up.php" method="post">
            <h2>Sign Up</h2>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="signup">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
