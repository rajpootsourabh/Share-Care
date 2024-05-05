


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
   <style>


   
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share & Care</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ce0692ee2e.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="header">
<nav style="display: flex; padding: 2% 6%; justify-content: space-between; align-items: center;">
            <a href="index.html"><img src="Images/Share&Carelogo3.png" alt=""></a>

            <!-- Login/Signup button at the top-right corner -->
          
            <div class="login-signup">
                <a href="login.php">Login</a>
            </div>

            <div class="nav-link" id="navLink">
                <i class="fas fa-times" onclick="hideMenu()"></i>
                <ul>
                <li><a href="index.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                  
                    <li><a href="top_donor.php">TOP DONORS</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </div>
            <i class="fas fa-bars" onclick="showMenu()"></i>
        </nav>
<h1>Contact Us</h1>
<h2 style="color: white;">Welcome to our Contact Us page!</h2> <h3> We value your feedback, inquiries, and are here to assist you in any way we can. Please feel free to reach out to us using the contact information provided below.</h3>

<div class="member-container" style="display: flex; justify-content: center; align-items: center; height: 50vh;">
    <?php
        // Sample data (replace with your actual data)
        $members = [
            ['name' => 'Sourabh Singh', 'email' => 'sourabhsingh@gmail.com', 'contact_number' => '8726454894', 'profile_image' => 'members/sourabh.jpg'],
            ['name' => 'Abhishek', 'email' => 'abhishek@gmail.com', 'contact_number' => '9816677504', 'profile_image' => 'members/abhishek.jpg'],
            ['name' => 'Akshay Thakur', 'email' => 'akshaythakur.com', 'contact_number' => '8580931419', 'profile_image' => 'members/akshay.jpg'],
            ['name' => 'Suraj Bhan', 'email' => 'surajbhan9453@gmail.com', 'contact_number' => '8707885861', 'profile_image' => 'members/suraj.jpg'],// Add more members as needed
        ];

        // Loop through members and display information
        foreach ($members as $member) {
            echo '<div class="member-card">';
            echo '<img src="' . $member['profile_image'] . '" alt="Profile Picture" class="profile-image">';
            echo '<h5>Name: ' . $member['name'] . '</h5>';
            echo '<h6>Email: ' . $member['email'] . '</h6>';
            echo '<h6>Contact Number: ' . $member['contact_number'] . '</h6>';
            echo '</div>';
        }
    ?>
</div>
      
       
    </section>



</body>
</html>
