<?php
    include 'config.php';
    if (isset($_POST['signin'])) {
        $username = $_POST['user'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE Username = '$username'";
        $result = mysqli_query($con,$sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['Password'] === $password) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['name'] = $row['Prenom'];
                $_SESSION['started'] = true;
                header('Location: dashboard.php');
                exit();
            } else echo '<h2>Mot de passe incorrecte</h2>';
        } else echo '<h2>Utilisateur non trouvée</h2>';
    }
