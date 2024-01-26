<?php
$email = $_POST['email'];
$password = $_POST['password'];

$con = new mysqli("localhost", "root", "", "workout");
if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
} else {
    $stmt = $con->prepare("select * from registration where email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        $dbPassword = $data['password']; // Access the 'password' column

        if ($dbPassword == $password) {
            // Start a session to store user data
            session_start();
            $_SESSION['username'] = $data['username']; // Assuming 'username' is a column in your table
            // Redirect to index.html
            header("Location: index.php");
            exit();
        } else {
            echo "<h2>Invalid email or password</h2>";
        }
    } else {
        echo "<h2>Invalid email or password</h2>";
    }
}
?>
