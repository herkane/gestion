<?php
    include 'config.php';
    // session_start();
    // if(isset($_POST['searchUser'])){
        $result1 = mysqli_query($con,"SELECT * FROM employes ORDER BY id DESC");
        $result2 = mysqli_query($con,"SELECT * FROM users ORDER BY id DESC");
            $row1 = mysqli_fetch_all($result1) ;
                /* $_SESSION['ficheNom'] = $row['Nom'];
                $_SESSION['fichePrenom'] = $row['Prenom'];
                $_SESSION['ficheCIN'] = $row['CIN'];
                $_SESSION['ficheDate'] = $row['Date naissance'];
                $_SESSION['ficheSalaire'] = $row['Salaire'];
                $_SESSION['ficheFonction'] = 'Fonctionnaire'; */
                $_SESSION['listeFonctionnaires'] = $row1;
            
        //    $_SESSION['searchUser_status'] = true;
            $row2 = mysqli_fetch_all($result2);
                /* $_SESSION['ficheNom'] = $row['Nom'];
                $_SESSION['fichePrenom'] = $row['Prenom'];
                $_SESSION['ficheCIN'] = $row['CIN'];
                $_SESSION['ficheDate'] = $row['Date naissance'];
                $_SESSION['ficheSalaire'] = $row['Salaire'];
                $_SESSION['ficheFonction'] = 'Administrateur'; */
                $_SESSION['listeAdmins'] = $row2;
            
    // }
// header('Location: fiche.php');