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

    // Check if there are any contacts
    $sql = "SELECT DISTINCT contacts.*, clients.name AS client_name, clients.client_code AS client_code FROM contacts LEFT JOIN clients ON contacts.client_code = clients.client_code";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "<div id = 'noContacts'>No contact(s) found.</div>";
    } else {
        // Display all contacts
        echo "<table>";
        echo "<tr><th>Name</th><th>Surname</th><th>Email</th><th>Linked Clients</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['email'] . "</td><td>" . $row['client_name'] . " (" . $row['client_code'] . ")</td></tr>";
        }
        echo "</table>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>

</html>