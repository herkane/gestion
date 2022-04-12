<?php
    include 'config.php';
    session_start();
    if (isset($_POST['add'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $CIN = $_POST['CIN'];
        $date = $_POST['date_naissance'];
        $fonction = $_POST['fonction'];
        $salaire = $_POST['salaire'];
        $file_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $folder = 'pics/' . $file_name;
        move_uploaded_file($tmp_name, $folder);
        if ($fonction === 'admin') {
            if (mysqli_num_rows(mysqli_query($con,"SELECT * FROM employes WHERE CIN = '$CIN'")) === 0) {
                function randomPassword() {
                    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                    $pass = array(); //remember to declare $pass as an array
                    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                    for ($i = 0; $i < 8; $i++) {
                        $n = rand(0, $alphaLength);
                        $pass[] = $alphabet[$n];
                    }
                    return implode($pass); //turn the array into a string
                }
                $pass = randomPassword();
                $addUser = "INSERT INTO users VALUES ('','$nom','$pass','$nom','$prenom','$CIN','$date','$salaire','$file_name')";
            } else $_SESSION['add_status'] = false;
        } else {
            if (mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE CIN = '$CIN'")) === 0) {
            $addUser = "INSERT INTO employes VALUES ('','$nom','$prenom','$CIN','$date','$salaire','$file_name')";
            } else $_SESSION['add_status'] = false;
        }
        $_SESSION['add_status'] = mysqli_query($con,$addUser);
        header('Location: addUser.php');
    } else if(isset($_POST['modify'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $CIN = $_POST['CIN'];
        $date = $_POST['date_naissance'];
        $salaire = $_POST['salaire'];
        if (mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE CIN = '$CIN'")) === 1) {
        $modifyUser = "UPDATE employes ('Nom','Prenom','Date naissance','Salaire') VALUES ('$nom','$prenom','$date','$salaire')";
        } else $_SESSION['modify_status'] = false;
        $_SESSION['modify_status'] = mysqli_query($con,$modifyUser);
        header('Location: deleteUser.php');
    }
    
    