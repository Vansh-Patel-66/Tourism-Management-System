<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tour";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Server-side validations
    if (empty($name) || empty($email) || empty($phone) || empty($subject) || empty($message)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); window.history.back();</script>";
        exit();
    }

    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        echo "<script>alert('Phone number should be exactly 10 digits.'); window.history.back();</script>";
        exit();
    }

    $sql = "INSERT INTO contacts_us (name, email, phone, subject, message) VALUES ('$name', '$email', '$phone', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Your message has been submitted successfully!');
                window.location.href='home.php';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Oops! Something went wrong. Please try again.');
                window.history.back();
              </script>";
        exit();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <style>
        * { padding: 0; margin: 0; box-sizing: border-box; }
        .top-navigation { position: fixed; width: 100%; top: 0; z-index: 1000; }
        .top-navigation ul { display: flex; background-color: rgb(4, 1, 83); height: 60px; font-size: 20px; justify-content: space-evenly; align-items: center; list-style: none; }
        .top-navigation ul li a { color: white; text-decoration: none; }
        .top-navigation ul li a:hover { text-decoration: underline; }
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; padding-top: 80px; }
        form { background: white; padding: 40px; max-width: 600px; margin: 20px auto; box-shadow: 0px 0px 20px 0px #00000033; border-radius: 10px; }
        input, select, textarea { width: 100%; padding: 15px; margin: 15px 0; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; }
        button { background-color: #28a745; color: white; padding: 15px 20px; border: none; cursor: pointer; border-radius: 6px; font-size: 18px; }
        button:hover { background-color: #218838; }
        .sel { width: 100%; }
        .homebox { background-color: rgb(0, 42, 255); border-radius: 5px; box-shadow: 0 0 0 10px rgb(0, 42, 255); }
    </style>
    <script>
        function validateForm() {
            var phone = document.forms["contactForm"]["phone"].value;
            var email = document.forms["contactForm"]["email"].value;

            // Phone validation
            if (!/^[0-9]{10}$/.test(phone)) {
                alert("Phone number should be exactly 10 digits.");
                return false;
            }

            // Email validation
            var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="top-navigation">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="tour_packages.php">Tour Packages</a></li>
            <li><a href="about_us.php">About Us</a></li>
            <li><a href="private.php">Privacy Policy</a></li>
            <li class="homebox"><a href="Contact.php">Contact Us</a></li>
            <li><a href="login.php">Logout</a></li>
        </ul>
    </div>

    <form name="contactForm" method="POST" action="" onsubmit="return validateForm()">
        <h2>Contact Us</h2>
        <label>Name:</label>
        <input type="text" name="name" required><br>
        
        <label>Email:</label>
        <input type="email" name="email" required><br>
        
        <label>Phone:</label>
        <input type="text" name="phone" required><br>
        
        <label>Subject:</label>
        <select class="sel" name="subject" required>
            <option value="General Inquiry">General Inquiry</option>
            <option value="Support">Support</option>
            <option value="Feedback">Feedback</option>
            <option value="Other">Other</option>
        </select><br>
        
        <label>Message:</label>
        <textarea name="message" required></textarea><br>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
