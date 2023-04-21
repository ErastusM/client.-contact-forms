<!DOCTYPE html>
<html>

<head>
    <title>Contact Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="form-wrapper">
        <h2 class="contactH">Create New Contact</h2>
        <form action="create_contacts.php" method="post">
            <div class="form-row">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
                <br><br>
                <label for="surname">Surname:</label>
                <input type="text" name="surname" id="surname" required>
                <br><br>
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" required>
                <br><br>
                <label for="linked_clients">No. of Linked Clients:</label>
                <input type="number" name="linked_clients" id="linked_clients" min="0" max="200" required>
                <br><br>
                <input class="button" type="submit" value="submit">
            </div>
        </form>
    </div>
</body>

</html>