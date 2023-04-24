<!DOCTYPE html>
<html>

<head>
    <title>Create User</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-wrapper">
        <h1>Create User</h1>
        <form action="create_user.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required><br><br>
            <input class="button" type="submit" value="Create User">
        </form>
    </div>
</body>

</html>