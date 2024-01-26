<?php
  $name= $_POST['name'];
  $username= $_POST['username'];
  $email= $_POST['email'];
  $phno= $_POST['phno'];
  $password= $_POST['password'];
  $weight= $_POST['weight'];

  $conn = new mysqli('localhost', 'root', ' ', 'workout');
  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  } else {
    $stmnt = $conn->prepare("INSERT INTO registration (name, username, email, phno, password, weight) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmnt === false) {
      die('Prepare failed: ' . $conn->error);
    }
    $stmnt->bind_param("sssisi", $name, $username, $email, $phno, $password, $weight);
    if ($stmnt->execute()) {
      echo "REGISTRATION SUCCESSFUL";
      header("Location: login1.html");
      exit;
    } else {
      echo "Error: " . $stmnt->error;
    }
    $stmnt->close();
    $conn->close();
  }
?>