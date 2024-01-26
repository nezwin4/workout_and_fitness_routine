<?php
session_start();
require("admin.php");

if(isset($_POST['Signin'])) {
    $adminName = $_POST['AdminName'];
    $adminPassword = $_POST['AdminPassword'];

    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM adminlogin WHERE Admin_Name = ? AND Admin_Password = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $adminName, $adminPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['AdminLoginId'] = $adminName;
        header("location: admindash.php");
        exit();
    } else {
        echo "<script>alert('Incorrect Password')</script>";
    }

    $stmt->close();
}
?>

<!-- The rest of your HTML remains unchanged -->

<html>
<head>
	<title>login Page</title>
	<link rel="stylesheet" type="text/css" href="login1.css">
</head>
<body>
	<div class="container vh-100">
		<div class="row justify-content-center h-100">
			<div class="card w-25 my-auto shadow">
				<div class="card-header text-center bg-primary text-white">
					<h2>Login</h2>
				</div>
				<div class="card-body">
					<form  method="POST">
						<div class="form-group">
							<label for="email">Admin Name</label>
							<input type="text" id="email" class="form-control" name="AdminName" />
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" class="form-control" name="AdminPassword" />
						</div>
						<input type="submit" name="Signin" class="btn btn-primary w-100" value="Login" >
					</form>
				</div>
			</div>
		</div>
	</div>


</body>
</html>
