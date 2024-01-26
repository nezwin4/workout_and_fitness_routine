<!-- strength.php -->
<?php
require("admin.php"); // Include necessary files
require("functions.php");
// Database connection
$con = new mysqli("localhost", "root", "", "workout");
if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
}

// Fetch strength section workout videos from the database
$loseweightVideos = getWorkoutVideos($con, 'loseweight');
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

    <style>
        header{background-color: #333;}

    </style>
  <!-- header section starts  -->
<header>

    <a href="#" class="logo"><span>FIT</span>FINITY</a>
    
    <div id="menu" class="fas fa-bars"></div>
    
    <nav class="navbar">
        <ul>
        <li><a class="active" href="#home">Home</a></li>
        <li><a href="save_display.php">Saved Videos</a></li>
        <li><a href="logout.php">Logout</a></li>

        </ul>
    </nav>
    
    </header>
</head>
<body>
    <h1>Strength Section</h1>

    <?php
    // Display strength section workout videos
    displayWorkoutVideos($loseweightVideos);
    ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- custom js file link  -->
<script src="js/main.js"></script>
<!-- Include necessary scripts -->
</body>
</html>
