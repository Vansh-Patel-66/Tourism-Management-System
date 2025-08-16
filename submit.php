<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour";

$con = mysqli_connect($servername, $username, $password, $dbname);

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$subject = $_POST["subject"];
$message = $_POST["message"];

$sql = "INSERT INTO contacts_us (name,email,phone,subject,message) VALUES ('$name', '$email', '$phone', '$subject', '$message')";

if (mysqli_query($con, $sql))
{
    header("Location: home.php");
    exit();
} 
else 
{
    echo "<p>Oops! Something went wrong. Please try again later.</p>";
}
?>