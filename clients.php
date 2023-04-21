<!DOCTYPE html>
<html>

<head>
    <title>Client Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <h1 class="contactH">Create New Client</h1>
    <div class="form-wrapper">
        <div class="form-row">
            <form action="create_clients.php" method="post">
                <label for="name">Name:</label>
                <input type="text" class="nameblock" name="name" id="name" required>
                <br><br>
                <input class="button" type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>