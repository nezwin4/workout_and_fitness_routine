<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// saved_videos.php

// Database connection (use your actual credentials)
$con = new mysqli("localhost", "root", "", "workout");
if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
}

// Fetch all saved videos from the saved_videos table
$sql = "SELECT * FROM saved_videos";
$result = $con->query($sql);

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitfinity</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<!-- header section starts  -->

<header style="background-color:black">

<a href="#" class="logo"><span>FIT</span>FINITY</a>

<div id="menu" class="fas fa-bars"></div>

<nav class="navbar">
    <ul>
        <li><a class="active" href="index.php">Home</a></li>
        
        <li><a href="logout.php">Logout</a></li>

    </ul>
</nav>

</header>



    <?php
    // Display saved videos
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="centered-iframe">
                    <iframe width="560" height="315" src="' . $row['video_link'] . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>';
        }
    } else {
        echo '<p>No videos saved yet.</p>';
    }
    ?>
    
    </body>
</html>