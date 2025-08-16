<html>
<head>
    <title>Tourism Management</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .top-navigation ul{
            display: flex;
            background-color:rgb(4, 1, 83);
            height: 60px;
            font-size: 20px;
            justify-content: space-evenly;
            align-items:center;
        }
        .top-navigation ul li{
            list-style: none;
        }
        .top-navigation ul li a{
            list-style:none;
            color:white;
            text-decoration: none;
        }
        .top-navigation ul li a:hover{
            text-decoration: underline;
        }
        .homebox{
            background-color:rgb(0, 42, 255);
            border-radius:5px;
            box-shadow: 0 0 0 10px rgb(0,42,255);
        } 
    </style>
</head>

<body>
<div class="top-navigation">
        <ul>
            <li ><a href="admin.php">Dasboard</a></li>
            <li class="homebox"><a href="create.php">Create Packages</a></li>
            <li><a href="delete.php">Delete Packages</a></li>
            <li><a href="user.php">Manage User</a></li>
	        <li><a href="booking.php">Manage Booking</a></li>
            <li><a href="admin_login.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>