<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style>
        body {
            background-color: black;
            color: white;
          
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px;
    }

    th, td {
        border: 1px solid white;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #333;
        color: white;
    }

        h2 {
            text-align: center;
        }

        .add-workout-form {
            display: none;
            margin-top: 20px;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
        }
       

        label {
            display: block;
            margin-bottom: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        .add-workout-btn {
        cursor: pointer;
        color: #fff;
        font-weight: bold;
        margin-top: 20px; /* Adjust the margin as needed */
        }
    </style>
</head>
<body>
<h1>ADMIN DASHBOARD</h1>
<?php
session_start(); // Start the session to access session variables

// Check if the admin is logged in
if (!isset($_SESSION['AdminLoginId'])) {
    // Redirect to the admin login page if not logged in
    header("Location: admin_login.php");
    exit();
}

// Database connection
$con = new mysqli("localhost", "root", "", "workout");
if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
}

// Fetch user details from the database
$sql = "SELECT * FROM registration";
$result = $con->query($sql);

// Check if there are registered users
if ($result->num_rows > 0) {
    // Display user details in a table
    echo "<h2>User Details</h2>";
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['u_id'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['email'] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<h2>No registered users found</h2>";
}


// Check if the add workout form is submitted
if (isset($_POST['addWorkout'])) {
    // Process and save the workout details (you can customize this part)
    $section = $_POST['section'];
    $videoLink = $_POST['videoLink'];


    // Example: Save to the database or perform other actions
     $sqlInsert = "INSERT INTO workouts (section, video_link) VALUES ('$section', '$videoLink')";
     $con->query($sqlInsert);
    // ...

    echo "<script>alert('Workout added successfully');</script>";
}
?>


<div class="add-workout-form">
    <h2>Add Workout</h2>
    <form method="POST">
        <label for="section">Section:</label>
        <select id="section" name="section">
            <option value="strength">Strength</option>
            <option value="flexibility">Flexibility</option>
            <option value="tone">Tone</option>
            <option value="gain">Gain Muscle</option>
            <option value="loseweight">Lose Weight</option>
            <!-- Add more options as needed -->
        </select>

        <label for="videoLink">Video Link:</label>
        <input type="text" id="videoLink" name="videoLink" placeholder="Enter video link" required>

        <input type="submit" name="addWorkout" value="Add">
    </form>
</div>

<!-- Add Workout Button/Link -->
<div class="add-workout-btn" onclick="toggleAddWorkoutForm()">Add Workout</div>

<script>
    function toggleAddWorkoutForm() {
        var form = document.querySelector('.add-workout-form');
        form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    }
</script>

</body>
</html>