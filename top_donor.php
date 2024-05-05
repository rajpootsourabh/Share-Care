
<?php
// Database connection


$hostname = "localhost:8111";
$username = "root";
$password = "";
$database = "donationdb";


$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch pending donations from the database
$sql = "SELECT * FROM users WHERE user_type='donor'";

$result = $conn->query($sql);


// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share & Care</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ce0692ee2e.js" crossorigin="anonymous"></script>

    <style>
        /* Style for the pending donations container */
        .pending-donations-container {
            margin: 20px 0;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Style for the pending donations table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Style for table headers */
        th {
            background-color: #f2f2f2;
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        /* Style for table cells */
        td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        /* Style for alternating row colors */
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Style for the "No pending donations found" message */
        p {
            margin-top: 20px;
            font-weight: bold;
            color: #555;
        }
    </style>


</head>

<body>
    <section class="header">
        <nav>
            <a href="index.html"><img src="Images/Share&Carelogo3.png" alt=""></a>

            <!-- Login/Signup button at the top-right corner -->
            <div class="login-signup">
                <a href="login.php">Login</a>
            </div>


            <div class="nav-link" id="navLink">
                <ul>
                <li><a href="index.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                  
                    <li><a href="top_donor.php">TOP DONORS</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </div>
            
</nav>
        
          
  
<div class="pending-donations-container">
           

    <?php
            
         $conn1 = new mysqli($hostname, $username, $password, $database);


         if ($conn1->connect_error) {
                die("Connection failed: " . $conn1->connect_error);
             }
$sql1 = "SELECT users.first_name, users.last_name, users.email, COUNT(*) AS donation_count
FROM users
LEFT JOIN donations ON users.email = donations.donor AND donations.status = 'collected'
WHERE users.user_type = 'donor'
GROUP BY users.email
ORDER BY donation_count DESC";

$result1 = $conn1->query($sql1);

if ($result1->num_rows > 0) {
    echo "<div class='pending-donations-container'>";
    echo "<h2>Top Donors</h2>";
    echo "<table>";
    echo "<thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Number of Donations</th>
            </tr>
        </thead>";
    echo "<tbody>";

    while ($row = $result1->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['first_name']} {$row['last_name']}</td>";
        echo "<td>{$row['email']}</td>";
        $email=$row['email'];
        echo "<td>{$row['donation_count']}</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "<p>No top donors found.</p>";
}




            ?> 
        </div>
        </section>
        

        

    <!-- Your JavaScript for Toggle Menu -->

</body>

</html>


</body>

</html>
