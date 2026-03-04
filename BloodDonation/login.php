<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <form action="includes/login.inc.php" method="post">
            <h2>Login</h2>
            <label for="username">Enter Username:</label>
            <input type="text" placeholder="Username" id="username" name="username">

            <label for="password">Enter Password:</label>
            <input type="password" placeholder="Password" id="password" name="password">

            <button type="submit">Login</button>
        </form>

        <?php
        check_login_errors();
        ?>
    </div>
</body>
</html>