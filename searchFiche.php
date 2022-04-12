<?php
    include 'config.php';
    session_start();
    if(isset($_POST['searchUser'])){
        $CIN = $_POST['searchByCIN'];
        $result1 = mysqli_query($con,"SELECT * FROM employes WHERE CIN = '$CIN'");
        $result2 = mysqli_query($con,"SELECT * FROM users WHERE CIN = '$CIN'");
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {
                $_SESSION['ficheNom'] = $row['Nom'];
                $_SESSION['fichePrenom'] = $row['Prenom'];
                $_SESSION['ficheCIN'] = $row['CIN'];
                $_SESSION['ficheDate'] = $row['Date naissance'];
                $_SESSION['ficheSalaire'] = $row['Salaire'];
                $_SESSION['ficheFonction'] = 'Fonctionnaire';
                $_SESSION['ficheImage'] = $row['Image'];
                $result3 = mysqli_query($con,"SELECT * FROM sanctions WHERE CINemp = '$CIN'");
                $_SESSION['ficheSanctions'] = mysqli_num_rows($result3);
                $result4 = mysqli_query($con,"SELECT * FROM abscences WHERE CINemp = '$CIN'");
                $_SESSION['ficheAbscence'] = mysqli_num_rows($result4);
            }
            $_SESSION['searchUser_status'] = true;
        } else if(mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                $_SESSION['ficheNom'] = $row['Nom'];
                $_SESSION['fichePrenom'] = $row['Prenom'];
                $_SESSION['ficheCIN'] = $row['CIN'];
                $_SESSION['ficheDate'] = $row['Date naissance'];
                $_SESSION['ficheSalaire'] = $row['Salaire'];
                $_SESSION['ficheFonction'] = 'Administrateur';
                $_SESSION['ficheImage'] = $row['image'];
                $result3 = mysqli_query($con,"SELECT * FROM sanctions WHERE CINadmin = '$CIN'");
                $_SESSION['ficheSanctions'] = mysqli_num_rows($result3);
                $result4 = mysqli_query($con,"SELECT * FROM abscences WHERE CINadmin = '$CIN'");
                $_SESSION['ficheAbscence'] = mysqli_num_rows($result4);
            }
           $_SESSION['searchUser_status'] = true;
        } else $_SESSION['searchUser_status'] = false;
    }
header('Location: fiche.php');