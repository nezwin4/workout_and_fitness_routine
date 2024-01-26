<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            background-color: #000; /* Black background color */
            color: #fff; /* White text color */
            text-align: center; /* Center align the content */
        }
        table {
            margin: 0 auto; /* Center the table horizontally */
        }
    </style>
</head>
<body>
    <h1>Dashboard</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Phone no</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // PHP code to retrieve and display data
            $con = mysqli_connect("localhost", "root", "", "workout");

            if ($con) {
                $query = "SELECT * FROM registration";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['u_id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['phno'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                }

                mysqli_close($con);
            } else {
                echo "Failed to connect to the database.";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
