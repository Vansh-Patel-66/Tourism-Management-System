<html>
<head>
    <title>About Us</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .top-navigation{
            position: fixed;
            width:100%;
            top:0;

        }
        .top-navigation ul{
            display: flex;
            background-color:rgb(4, 1, 83);
            height: 60px;
            font-size: 20px;
            justify-content: space-evenly;
            align-items:center;
            display:relative;
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
        .tour{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top:90px;
            width: 80%;
            margin-left: 110px;
        }
        .space-betw3{
            padding-left:20px;
            line-height: 2;
            font-size: 20px;
            font-family: cascadia code;
        }
        .space-betw{
            padding-left:20px;
            line-height: 2;
            font-size: 20px;
            font-family: cursive;
        }
        .btn2{
            padding:15px;
            background-color:lightgreen ;
            border:transparent;
            border-radius: 5px;
        }
        .btn2:hover{
            cursor:pointer;
            background-color:aqua;
            color:blue;
        }
        span{
            color:blue;
        }
    </style>
</head>
    <div class="top-navigation">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li  class="homebox"><a href="tour_packages.php">Tour Packages</a></li>
            <li><a href="about_us.php">About Us</a></li>
	        <li><a href="private.php">Privacy Policy</a></li>
            <li><a href="Contact.php">Contact Us</a></li>
            <li><a href="login.php">Logout</a></li>
        </ul>
    </div>
    <?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "tour";
$conn = mysqli_connect($host, $user, $pass, $db);
$sql = "SELECT * FROM packs";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    ?>
    <div class="tour">
        <form action="payment.php" method="post">
            <table>
                <tr class="space-betw2">
                    <td><img src="<?php echo $row['photo']; ?>" height="220px" width="250px"></td>
                    <td class="space-betw">
                        <span>Location:</span><?php echo $row['location']; ?><br>
                        <span>Package Type:</span><?php echo $row['type']; ?><br>
                        <span>Detail:</span><?php echo $row['feature']; ?>
                        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                    </td>
                    <td class="space-betw3"><?php echo $row['price']; ?>
                        <br><button class="btn2" type="submit" name="buy">Buy</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
}
?>

    </section>
</body>
</html>