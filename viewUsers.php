<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "password1";
    $dbname = "client_data";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Retrieve all users from the database, ordered by user ID
    $sql = "SELECT id, full_name AS 'Full Name', email FROM users ORDER BY id ASC";
    $result = mysqli_query($conn, $sql);


    // Check if there are any users
    if (mysqli_num_rows($result) == 0) {
        echo "<div id ='success'>No user(s) found.</div>";
    } else {
        // Display all users
        echo "<h2 class='contactH'>User(s) table</h2>";
        echo "<table id='client-table'>";
        echo "<tr><th>ID</th><th>Full Name</th><th>Email</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['Full Name'] . "</td><td>" . $row['email'] . "</td></tr>";
        }
        echo "</table>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>

</html>