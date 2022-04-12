<?php
    include 'config.php';
    session_start();
    if (isset($_SESSION['started'])) {
        if ($_SESSION['started']) {
            header('Location: dashboard.php');
        }
    }   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./home.css">
</head>

<body>
<h1>Gestion des employes</h1>
    <form action="home.php" method="POST">
        <label>Welcome</label>
        <input type="text" name="user" id="user" placeholder="Username" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="submit" value="Sign in" name="signin" class="signin">
    </form>
    <?php include 'checkUser.php'; ?>
</body>
</html>