<?php
session_start(); // Start session to store logged-in user info
$ec=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hostname = "localhost:8111";
    $username = "root";
    $password = "";
    $database = "donationdb";

    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
   

    // Validate login credentials
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        $first_name= $row['first_name'];
        $last_name= $row['last_name'];
        $user_type= $row['user_type'];
        // Verify the password using password_verify
        if (password_verify($password, $hashed_password)) {
            // Password is correct, log in the user
            session_start();
            $_SESSION['userid'] = $row['email'];
            $_SESSION['role'] = $row['user_type'];
            $_SESSION['name'] = $row['first_name'] . ' ' . $row['last_name'];
            
            // Determine user type and redirect accordingly
            if ($row['user_type'] === 'donor') {
                header("Location: donor");
            } elseif ($row['user_type'] === 'recipient') {
                header("Location: recipient");
            } elseif ($row['user_type'] === 'admin') {
                header("Location: admin");
            } else{
                // Handle other user types or invalid scenarios
                echo "Invalid user type!";
                // Redirect to an error page or take appropriate action
            }
            exit();
        } else {
            $ec=1;
        }
    } else {
        $ec=1;
    }

    $conn->close();
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
   <style>
   
    form {
    
    max-width: 400px;
    background: #fff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);

    /* Center the form in the middle of the page */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share & Care</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ce0692ee2e.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="header">
<nav style="display: flex; padding: 0% 6%; justify-content: space-between; align-items: center;">
            <a href="index.html"><img src="Images/Share&Carelogo3.png" alt=""></a>

            <!-- Login/Signup button at the top-right corner -->
          


            <div class="nav-link" id="navLink">
                <i class="fas fa-times" onclick="hideMenu()"></i>
                <ul>
                <li><a href="index.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                  
                    <li><a href="top_donor.php">TOP DONORS</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </div>
        </nav>
      
        <div class="login-container">
   

        

        
    <form action="/project/login.php" method="post">
    <?php if($ec==1){
        echo "<h1 style='color: #000000c9; text-align: center;'>Invalid Email or Password...</h1>";
    }
    

    ?>    
    <h2 style="color: black;">Login</h2>


            <label for="user_id">User ID:</label>
         
            <input type="text" id="email" name="email" required=""><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required=""><br><br>

            <input class="btn" type="submit" value="Login">
            <!-- Add the "Create a new account" button here -->
        <p>Don't have an account? <a href="signup.php">Create a new account</a></p>
        </form>
        </div>
        
    </section>



</body>
</html>
