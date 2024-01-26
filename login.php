

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
            echo "<h2>Login successful</h2>";
        } else {
            echo "<h2>Invalid email or password</h2>";
        }
    } else {
        echo "<h2>Invalid email or password</h2>";
    }
}



?>


