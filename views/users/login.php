<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form class="box" action="login_proses.php" method="post">
        <input type="text" name="username" placeholder="Username" autocomplete="off" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" class="submit" name="submit" value="LOGIN">
    </form>
</body>
</html>
