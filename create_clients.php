<!DOCTYPE html>
<html>

<head>
    <title>Client List</title>
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

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the client name from the form
        $name = $_POST['name'];

        // Create the client code
        $sql = "SELECT COUNT(*) FROM clients";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $num_clients = $row[0] + 1;
        $alpha_part = strtoupper(substr(str_replace(' ', '', $name), 0, 3));
        if (strlen($alpha_part) < 3) {
            $alpha_part .= str_repeat('A', 3 - strlen($alpha_part));
        }
        $num_part = str_pad($num_clients, 3, '0', STR_PAD_LEFT);
        $client_code = $alpha_part . $num_part;

        // Insert the new client into the database
        $sql = "INSERT INTO clients (name, client_code) VALUES ('$name', '$client_code')";
        if (mysqli_query($conn, $sql)) {
            echo "<div id='success'>New client created successfully!</div>";
        } else {
            echo "<div id='error'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</div>";
        }
    }

    // Retrieve all clients from the database, ordered by client code
    $sql = "SELECT * FROM clients ORDER BY SUBSTRING(client_code, 4) + 0 ASC";
    $result = mysqli_query($conn, $sql);

    // Check if there are any clients
    if (mysqli_num_rows($result) == 0) {
        echo "<div id ='noClients'>No client(s) found.</div>";
    } else {
        // Display all clients
        echo "<table id='client-table'>";
        echo "<tr><th>Name</th><th>Client Code</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['name'] . "</td><td>" . $row['client_code'] . "</td></tr>";
        }
        echo "</table>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>

</html>