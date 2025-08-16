# Tourism Management System

*A Tourism Management System built with PHP, MySQL, HTML, and CSS, allowing users to browse tour packages, make payments, contact support, and for admin to manage users, packages, and bookings.*

 # Project Structure
1. Main Pages
```
├── index.php / home.php          # Home page

├── tour_packages.php             # Display all tour packages

├── about_us.php                  # About Us page

├── private.php                   # Privacy Policy page

├── Contact.php / submit.php      # Contact Us page and form handler

├── payment.php                   # Payment form page

├── login.php                     # User login page

└── sign_up.php                   # User signup page
```
2. Admin Pages
```
├── admin/

├── admin.php                 # Admin dashboard

├── managepack.php            # Manage tour packages

├── user.php                   # Manage users

├── booking.php               # Manage bookings

└── delete_user.php           # Delete user handler
```
3. Image File
```
├── images/

└── *.webp, *.jpg, *.png      # Image assets for packages & UI
```
4. DataBase
```
├── database/

└── tour.sql                  # SQL script to create tables
```

# Features

User Features:

- Browse tour packages with images, location, type, price, and details.

- Buy a package using the payment form (package name, price stored).

- Contact support via the Contact Us form with validations.

- Sign up & Login functionality.

- Smooth navigation with a fixed top menu.

Admin Features:

- Dashboard to view overall system data.

- Manage Packages – Add, Edit, Update, Delete packages.

- Manage Users – View and delete users.

- Manage Bookings – Track and manage user bookings.

Validation & Security:

- Server-side and client-side validations:

- Phone number must be 10 digits.

- Email format validation.

- Required fields validation.

- SQL injection prevention using mysqli_real_escape_string and prepared statements where necessary.

# Database Structure

- Database Name: tour

- Tables:

1.user

CREATE TABLE user (

    id INT AUTO_INCREMENT PRIMARY KEY,
    
    username VARCHAR(50) UNIQUE NOT NULL,
    
    password VARCHAR(255) NOT NULL
    
);


2.packs

CREATE TABLE packs (

    id INT AUTO_INCREMENT PRIMARY KEY,
    
    name VARCHAR(100) NOT NULL,
    
    photo VARCHAR(255),
    
    price DECIMAL(10,2),
    
    type VARCHAR(50),
    
    location VARCHAR(100),
    
    feature TEXT
    
);


3.payment

CREATE TABLE payment (

    id INT AUTO_INCREMENT PRIMARY KEY,
    
    cardno VARCHAR(16),
    
    packname VARCHAR(100),
    
    username VARCHAR(50),
    
    amount DECIMAL(10,2)
    
);


4.contacts_us

CREATE TABLE contacts_us (

    id INT AUTO_INCREMENT PRIMARY KEY,
    
    name VARCHAR(100),
    
    email VARCHAR(100),
    
    phone VARCHAR(10),
    
    subject VARCHAR(100),
    
    message TEXT
    
);

# Setup Instructions

>Install XAMPP or WAMP (with PHP and MySQL support).<br>
>Start Apache and MySQL services.

- Create Database:

>Open phpMyAdmin → Create a database tour.<br>
>Import tour.sql file, or create tables manually using the SQL above.

- Project Files:

>Copy all project files into the htdocs folder (for XAMPP) or the equivalent web root.

- Configure Database Connection:

>Open each PHP file using mysqli_connect() and ensure host, username, password, and database name are correct.

- Run the Project:

Open your browser → http://localhost/tourism-management/home.php.

- Admin Panel Access:

>username-admin     Password-12345<br>
>(It is given in admin.php by default you can change if you need)

- Optional:

>Update images in the images folder.<br>
>Customize CSS in style.css.

# Contact

If you'd like to connect or collaborate, feel free to reach out:

**Email: vansh2966.patel@gmail.com**

**LinkedIn: Your LinkedIn

GitHub: your-username
