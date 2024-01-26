<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// save_video.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save_video"])) {
    // Database connection (use your actual credentials)
    $con = new mysqli("localhost", "root", "", "workout");
    if ($con->connect_error) {
        die("Failed to connect: " . $con->connect_error);
    }

    // Get the video link from the form submission
    $videoLink = $_POST["video_link"];

    // Insert the video link into the saved_videos table
    $insertSql = "INSERT INTO saved_videos (video_link) VALUES ('$videoLink')";
    if ($con->query($insertSql) === TRUE) {
        echo "Video saved successfully";
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit(); 
    } else {
        echo "Error: " . $insertSql . "<br>" . $con->error;
    }

    // Close the database connection
    $con->close();
}
?>
