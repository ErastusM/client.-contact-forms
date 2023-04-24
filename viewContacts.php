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

    // Check if the form was submitted and the required fields are set
    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['linked_clients'])) {
        // Get the form data
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $linked_clients = $_POST['linked_clients'];

        // Prepare the SQL query
        $sql = "INSERT INTO contacts (name, surname, email, linked_clients) VALUES ('$name', '$surname', '$email', '$linked_clients')";
        // Execute the query
        if (mysqli_query($conn, $sql)) {
            echo "<div id ='success'>New contact created successfully</div>";
        } else {
            echo "<div id='error'>Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Check if there are any contacts
    $sql = "SELECT contacts.contact_id, contacts.name, contacts.surname, contacts.email, contacts.linked_clients, clients.name AS client_name, clients.client_code AS client_code FROM contacts LEFT JOIN clients ON contacts.client_code = clients.client_code";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) == 0) {
        echo "<div id = 'noContacts'>No contact(s) found.</div>";
    } else {
        // Display all contacts
        echo "<h2 class='contactH'>Contact(s) table</h2>";
        echo "<table id='client-table'>";
        echo "<tr><th>ID</th><th>Name</th><th>Surname</th><th>Email</th><th>Linked Clients</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['contact_id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['email'] . "</td><td>" . $row['client_name'] . " (" . $row['client_code'] . ")</td></tr>";
        }
        echo "</table>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>

</html>