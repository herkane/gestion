<?php
    include 'config.php';
    session_start();
    if (isset($_POST['yes'])) {
        $CIN = $_SESSION['modifyCIN'];
        $result1 = mysqli_query($con,"SELECT * FROM employes WHERE CIN = '$CIN'");
        $result2 = mysqli_query($con,"SELECT * FROM users WHERE CIN = '$CIN'");

        // Delete user
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {
                $_SESSION['deleteNom'] = $row['Nom'];
                $_SESSION['deletePrenom'] = $row['Prenom'];
                $_SESSION['deleteCIN'] = $row['CIN'];
                $_SESSION['deleteDate'] = $row['Date naissance'];
                $_SESSION['deleteSalaire'] = $row['Salaire'];
            }
                $delete = "DELETE FROM employes WHERE CIN = '$CIN'";
        } else if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                $_SESSION['deleteNom'] = $row['Nom'];
                $_SESSION['deletePrenom'] = $row['Prenom'];
                $_SESSION['deleteCIN'] = $row['CIN'];
                $_SESSION['deleteDate'] = $row['Date naissance'];
                $_SESSION['deleteSalaire'] = $row['Salaire'];
            }
            $delete = "DELETE FROM users WHERE CIN = '$CIN'";
        }
        $_SESSION['delete_status'] = mysqli_query($con,$delete);

        // Search user
    } else if (isset($_POST['searchUserToModify'])) {
        $CIN = $_POST['search'];
        $result1 = mysqli_query($con,"SELECT * FROM employes WHERE CIN = '$CIN'");
        $result2 = mysqli_query($con,"SELECT * FROM users WHERE CIN = '$CIN'");
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {
                $_SESSION['modifyNom'] = $row['Nom'];
                $_SESSION['modifyPrenom'] = $row['Prenom'];
                $_SESSION['modifyCIN'] = $row['CIN'];
                $_SESSION['modifyDate'] = $row['Date naissance'];
                $_SESSION['modifySalaire'] = $row['Salaire'];
            }
           $_SESSION['search_status'] = true;
        } else if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {

            $_SESSION['modifyNom'] = $row['Nom'];
                $_SESSION['modifyPrenom'] = $row['Prenom'];
                $_SESSION['modifyCIN'] = $row['CIN'];
                $_SESSION['modifyDate'] = $row['Date naissance'];
                $_SESSION['modifySalaire'] = $row['Salaire'];
            }
            $_SESSION['search_status'] = true;
        } else $_SESSION['search_status'] = false;

        // Modify user
    } else if(isset($_POST['searchUserToDelete'])){
        $CIN = $_POST['search'];
        $result1 = mysqli_query($con,"SELECT * FROM employes WHERE CIN = '$CIN'");
        $result2 = mysqli_query($con,"SELECT * FROM users WHERE CIN = '$CIN'");
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {
                $_SESSION['modifyNom'] = $row['Nom'];
                $_SESSION['modifyPrenom'] = $row['Prenom'];
                $_SESSION['modifyCIN'] = $row['CIN'];
                $_SESSION['modifyDate'] = $row['Date naissance'];
                $_SESSION['modifySalaire'] = $row['Salaire'];
            }
           $_SESSION['searchUserToDelete_status'] = true;
        } else if(mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                $_SESSION['modifyNom'] = $row['Nom'];
                $_SESSION['modifyPrenom'] = $row['Prenom'];
                $_SESSION['modifyCIN'] = $row['CIN'];
                $_SESSION['modifyDate'] = $row['Date naissance'];
                $_SESSION['modifySalaire'] = $row['Salaire'];
            }
           $_SESSION['searchUserToDelete_status'] = true;
        } else $_SESSION['searchUserToDelete_status'] = false;
    } else if (isset($_POST['modify'])) {
        $CIN = $_SESSION['modifyCIN'];
        $nom = $_SESSION['modifyNom'] = $_POST['nom'];
        $prenom = $_SESSION['modifyPrenom'] = $_POST['prenom'];
        $date = $_SESSION['modifyDate'] = $_POST['date_naissance'];
        $salaire = $_SESSION['modifySalaire'] = $_POST['salaire'];
        $result2 = mysqli_query($con,"UPDATE employes SET `Nom` = '$nom', `Prenom` = '$prenom', `Date naissance` = '$date', `Salaire` = '$salaire' WHERE `CIN` = '$CIN'");
        $result2 = mysqli_query($con,"UPDATE users SET `Nom` = '$nom', `Prenom` = '$prenom', `Date naissance` = '$date', `Salaire` = '$salaire' WHERE `CIN` = '$CIN'");
        if (!$result2) {
            echo mysqli_error($con);
        }
        $_SESSION['modify_status'] = $result2;
    }
    header('Location: deleteUser.php');