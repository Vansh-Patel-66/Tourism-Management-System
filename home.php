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
        .main {
            display: flex;
            flex-direction: column;
            background-image: linear-gradient(to bottom ,rgba(255, 255, 255, 0.60),rgba(253, 254, 253, 0.60)), url(image/travel.jpg);
            background-size: cover;
            background-position:center;
            background-repeat: no-repeat;
            
        }
        .footer {
            background-color:rgb(4, 1, 83);
        }
        .welcome-section {
            height: 576px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        
        }

        #wel {
            font-size: 85px;
        }

        #wel span {
            color: green;
        }
        #wel{
            color:rgb(255, 255, 255)
        }

        #wel2 {
            color:rgba(10, 10, 10, 0.75);
            font-size:60px;
            margin:30px;
        }
        .main-content {
            display: flex;
            flex-direction: column;
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
            <li class="homebox"><a href="home.php">Home</a></li>
            <li><a href="tour_packages.php">Tour Packages</a></li>
            <li><a href="about_us.php">About Us</a></li>
	        <li><a href="private.php">Privacy Policy</a></li>
            <li><a href="Contact.php">Contact Us</a></li>
            <li><a href="login.php">Logout</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="bg-image"></div>
        <div class="main-content">
            <div class="welcome-section">
            <p id="wel2">Hello 
            </p>
                <p id="wel"><span>W</span>elcome <span>T</span>o <span>T</span>ourism <span>M</span>anagement <span>S</span>ystem</p>
            </div>
        </div>
    <div class="footer" style="color: white; text-align: center;">
        <p style="margin-top: 10px;">Visit Us At:</p>
        <p style="margin-top: 5px;">Gold Cinema, Anand - V V Nagar road,Gujarat 388001</p>
        <p style="margin-top: 5px;">Phone: +91 1234567890</p>
        <p style="margin-top: 5px;">Email:Flywithjoy@gmail.com</p>
    </div>
    </div>
</body>
</html>